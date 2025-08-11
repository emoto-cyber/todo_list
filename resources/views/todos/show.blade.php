@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body" style="background-color: yellowgreen">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                                                                  <div class="d-grid gap
-2 d-md-flex justify-content-md-end">
                    <a button type="submit" class="btn btn-primary" href="{{route("todos.index")}}">Back</a>
                                              </div>

                   <b>your Todo Title is: </b> {{$todo->title}} <br>
                   <b>your Todo Description is: </b> {{$todo->description}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
