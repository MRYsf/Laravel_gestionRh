@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List </h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('biodata.create') }}">Create New one</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table table-hover table-sm">
      <tr>
        
        <th width = "300px">Nom</th>
        <th>Prenom</th>
        <th>Fonction</th>
        
        <th width = "180px">Action</th>
      </tr>

      @foreach ($biodatas as $biodata)
        <tr>
          
          <td>{{$biodata->nom}}</td>
          <td>{{$biodata->prenom}}</td>
          <td>{{$biodata->fonction}}</td>
          
          <td>
            <form action="{{ route('biodata.destroy', $biodata->id) }}" method="post">
              <a class="btn btn-sm btn-success" href="{{route('biodata.show',$biodata->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('biodata.edit',$biodata->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $biodatas->links() !!}
  </div>
@endsection
