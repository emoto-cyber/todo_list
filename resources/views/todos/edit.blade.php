@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todos App</div>

                <div class="card-body" style="background-color: yellowgreen">
                <h4>Edit</h4>
                <form method="post" action="{{route('todos.update')}}">

                    @csrf

                    @method('PUT')
                    <input type="hidden" name="todo_id" value="{{$todo->id}}">

                                                                  <div class="d-grid gap
-2 d-md-flex justify-content-md-end">
                    <a button type="submit" class="btn btn-primary" href="{{route("todos.index")}}">Back</a>
                                              </div>
  <div class="mb-3">
    <label  class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="{{$todo->title}}" >

  </div>
  <div class="mb-3">
    <label  class="form-label">Description</label>
   <textarea name="description" class="form-control"cols="5"  rows="5" >{{$todo->description}}</textarea>

  </div>

  <div class="mb-3">
    <label for="">status</label>
    <select name="is_complete" class="form-control">
    <option disabled selected>select option</option>

    <option value="1">completed</option>
    <option value="0">incomplete</option>
    </select>

  </div>

  <button type="submit" class="btn btn-primary">Update</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection








