@extends('layouts.app')
@section('styles')
#outer
{
    width:100%;
    text-align: center;
}
.inner
{
    display: inline-block;
}



@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: aqua ">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body" style="background-color: yellowgreen">
                             {{-- Success flash message --}}
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                                   {{-- Success flash message --}}
                    @if (session()->has('info'))
                        <div class="alert alert-info" role="alert">
                            {{ session('info') }}
                        </div>
                    @endif


                                {{-- Success flash message --}}
                    @if (session()->has('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('danger') }}
                        </div>
                    @endif






                          <div class="d-grid gap
-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ route('todos.create') }}"><i class="fa fa-plus"></i> Add Todos</a>
            </div>






    @if (count($todos)>0)
                <table class="table">
  <thead>
    <tr>
      <th> Tittle</th>
      <th>Description</th>
      <th>Completed</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($todos as $todo)
   <tr>
    <td>{{$todo->title}}</td>
    <td>{{$todo->description}}</td>
    <td>
@if ($todo->is_complete)
                                                <a class="inner btn btn-success" href="#">Completed</a>
                                            @else
                                                <a class="inner btn btn-danger" href="#">Incomplete</a>
                                            @endif

    </td>
    <td id="inner">
       <a class="inner btn btn-success"href="{{route('todos.show',$todo->id)}}">View</a>
        <a class="inner btn btn-info"href="{{route('todos.edit',$todo->id)}}">Edit</a>

        <form  method="POST"              action="{{route('todos.destroy') }}"class="inner btn btn-danger">
            @csrf
            @method('DELETE')
            <input type="hidden" name="todo_id" value="{{$todo->id }}">
            <input type="submit" class="btn btn-sm btn-danger" value="delete">

   </tr>

   @endforeach

  </tbody>
</table>

@else
<h4> No todos created yet</h4>

    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
