@extends('layout')
@section('title', 'Edit Game')
@section('content')
<div class="container mt-5">
    <div class="col-7" >
        <form method="post" action="{{ route('games.update', $game->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">						
                <h4>Edit Game</h4>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            @if ($errors -> any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="modal-body">					
                <div class="form-group mb-2">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $game->name }}">
                </div>
                <div class="form-group mb-2">
                    <label>Release Year</label>
                    <input type="number" class="form-control" name="release_year" min="1800" max="2050" value="{{ $game->release_year }}">
                </div>
                <div class="form-group">
                    <label>Genre</label>
                    <select class="form-control" name="genre_name">
                        @foreach($genres as $genre)
                        <option value="{{ $genre->name }}" {{ $game->genre->name === $genre->name ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label>Producer</label>
                    <input type="text" class="form-control" name="producer_name" value="{{ $game->producer->name }}">
                </div>
                <div class="form-group mb-2">
                    <label>Year of Creation</label>
                    <input type="number" class="form-control" name="producer_year" min="1800" max="2050" value="{{ $game->producer->year_of_creation }}">
                </div>	
                <div class="form-group mb-2">
                    <div><label>Image</label></div>
                    <div style="margin-top: 10px">
                        <img width="100px" src="{{ !is_null($game->image) ? asset('storage/' . $game->image->image_path) : ''}}" id="file-preview"/>
                        <input type="file" name="image" accept="image/*" value="{{ !is_null($game->image) ? asset('storage/' . $game->image->image_path) : '' }}" onchange="showFile(event)">
                    </div>
                </div>	
            </div>
            <div class="modal-footer mt-2">
                <div style="margin-right: 10px"><a href="{{ route('games.index') }}" class="btn btn-dark">Cancel</a></div>
                <button type="submit" class="btn btn-warning">Save</button>
            </div>
        </form>
    </div>
</div>
<script>
    function showFile(event){
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var output = document.getElementById('file-preview');
            output.src = dataURL;
        }
        reader.readAsDataURL(input.files[0]);
    }
</script>
@endsection