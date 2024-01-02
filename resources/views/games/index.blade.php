@extends('layout')
@section('title', 'Home Games')
@section('content')
<div class="container mt-5">
    <div class="table-wrapper">
        <div class="table-title mb-3">
            <div class="row">
                <div class="col-sm-5">
                  <form method="GET" action="{{ route('games.index') }}" accept-charset="UTF-8" role="search">
                  <div class="input-group">
                      <input class="form-control" type="search" placeholder="Search Game..." value="{{ request('search') }}" name="search">
                      <button class="btn btn-secondary" type="submit">Search Game</button>
                  </div>
                </form>
                </div>
                <div class="col-sm-7">
                    <a href="{{ route('games.create') }}" class="btn btn-success" style="float: right;">Add Product</a>				
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <script type="text/javascript">
            const Toast = Swal.mixin({
                  toast: true,
                  position: "top-end",
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                  }
                });
                Toast.fire({
                  icon: "success",
                  title: "{{ $message }}"
                });
            </script>
        @endif
        <table class="table table-hover">
            <thead>
                <tr class="table-active">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Release Year</th>
                    <th>Genre</th>
                    <th>Producer</th>
                    <th>Producer Creation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($games)>0)
                    @foreach ($games as $game)
                    <tr class="table-dark">
                        <td>{{ $game->id }}</td>
                        <td>{{ $game->name }}</td>
                        <td>{{ $game->release_year }}</td>
                        <td>{{ $game->genre->name }}</td>
                        <td>{{ $game->producer->name }}</td>
                        <td>{{ $game->producer->year_of_creation }}</td>
                        <td style="display: flex">
                            <a href="{{ route('games.edit', $game->id) }}" style="margin-right: 10px"><button class="btn btn-success"><i class="bi bi-pen" style="color: white;"></i></button></a>
                            <form id="deleteForm_{{ $game->id }}" method="POST" action="{{ route('games.destroy', $game->id) }}">
                              @method('delete')
                              @csrf
                              <button class="btn btn-danger" onclick="deleteConfirm(event, {{ $game->id }})">
                                  <i class="bi bi-trash"></i>
                              </button>
                          </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <p>Game not Found.</p>
                @endif
            </tbody>
        </table>
        @include('including.pagination', ['games' => $games])
    </div>
</div>
<script>
  window.deleteConfirm = function (e, gameId) {
    e.preventDefault();
    var form = document.getElementById('deleteForm_' + gameId);

    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
      }
    });
  }
</script>
@endsection