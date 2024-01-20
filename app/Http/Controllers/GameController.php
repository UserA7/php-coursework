<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Image;
use App\Models\Producer;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request){
        $query = Game::with(['producer', 'genre'])->orderBy('created_at');

        //checking if search parameter is provided
        if ($request->has('search')) {
            $searchTerm = $request->input('search');

            //adding conditions to the query based on the search term
            $query->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('release_year', 'like', '%' . $searchTerm . '%')
                ->orWhereHas('producer', function ($subquery) use ($searchTerm) {
                    $subquery->where('name', 'like', '%' . $searchTerm . '%');
                });
        }
        $games = $query->paginate(5);

        return view('games.index', ['games' => $games]);
    }

    public function create(){
        $genres = Genre::all();
        $producers = Producer::all();
        return view('games.create', compact('genres', 'producers'));
    }

    public function store(Request $request){
        
    $validatedData = $request->validate([
        'name' => 'required|string',
        'release_year' => 'required|integer|min:1800|max:2050',
        'genre_name' => 'required|string',
        'producer_name' => 'required|string',
        'producer_year' => 'required|integer|min:1800|max:2050',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    //checking if genre exists
    $genre = Genre::firstOrCreate(['name' => $validatedData['genre_name']]);

    //checking if producer exists
    $producer = Producer::firstOrCreate([
        'name' => $validatedData['producer_name'],
        'year_of_creation' => $validatedData['producer_year'],
    ]);

    $game = new Game;
    $game->name = $validatedData['name'];
    $game->release_year = $validatedData['release_year'];
    $game->genre_id = $genre->id;
    $game->producer_id = $producer->id;
    $game->save();

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads', 'public');
    
        $gameImage = new Image([    
            'game_id' => $game->id,
            'image_path' => $imagePath,
        ]);
    
        $gameImage->save();
    }

    return redirect()->route('games.index')->with('success', 'Game added successfully!');
    }

    public function edit($id){
        $game = Game::findOrFail($id);
        $genres = Genre::all();
        $producers = Producer::all();

        return view('games.edit', compact('game', 'genres', 'producers'));
    }

    public function update(Request $request, $id){
        $game = Game::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'release_year' => 'required|integer|min:1800|max:2050',
            'genre_name' => 'required|string',
            'producer_name' => 'required|string',
            'producer_year' => 'required|integer|min:1800|max:2050',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $genre = Genre::firstOrCreate(['name' => $validatedData['genre_name']]);
        $producer = Producer::firstOrCreate([
            'name' => $validatedData['producer_name'],
            'year_of_creation' => $validatedData['producer_year'],
        ]);

        $game->name = $validatedData['name'];
        $game->release_year = $validatedData['release_year'];
        $game->genre_id = $genre->id;
        $game->producer_id = $producer->id;
        $game->save();


        //save the image path in the db
        if ($request->hasFile('image')) {
            //new image is uploaded
            $imagePath = $request->file('image')->store('uploads', 'public');
        
            if (!is_null($game->image)) {
                //removing existing image
                unlink(storage_path('app/public/'.$game->image->image_path));
                $game->image->image_path = $imagePath;
                $game->image->save();
            } else {
                //if no existing image, create a new one
                $gameImage = new Image([
                    'game_id' => $game->id,
                    'image_path' => $imagePath,
                ]);
                $gameImage->save();
            }
        } else {
            //if no new image is uploaded
            if (!is_null($game->image)) {
                //remove existing image
                unlink(storage_path('app/public/'.$game->image->image_path));
                $game->image->delete(); //remove the image from the database
            }
        }

        return redirect()->route('games.index')->with('success', 'Game updated successfully!');
    }

    public function destroy($id){
        $game = Game::findOrFail($id);
        if(!is_null($game->image)){
            unlink(storage_path('app/public/'.$game->image->image_path));
        }
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game deleted successfully!');
    }

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
}
