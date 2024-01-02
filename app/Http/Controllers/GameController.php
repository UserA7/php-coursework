<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Genre;
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
        'release_year' => 'required|integer',
        'genre_name' => 'required|string',
        'producer_name' => 'required|string',
        'producer_year' => 'required|integer',
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
            'release_year' => 'required|integer',
            'genre_name' => 'required|string',
            'producer_name' => 'required|string',
            'producer_year' => 'required|integer',
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

        return redirect()->route('games.index')->with('success', 'Game updated successfully!');
    }

    public function destroy($id){
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game deleted successfully!');
    }
}
