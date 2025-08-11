<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\session\SessionManager;
use Illuminate\Support\Facades\Session;



class TodoController extends Controller
{
    //
    public function index(Request $request){
        $todos = Todo::all();
        return view("todos.index",['todos'=> $todos] );

    }

    public function create(){




        return view("todos.create");
}
     public function edit($id){

          $todo = Todo::find($id);
    // if(($todo)){
    //     return to_route('todos.index')->withErrors(['Unable to locate the Todos']);
    //  if(!($todo)){
    //      request()->session()->flash('error','Unable to locate the Todos');

    //     return to_route('todos.index')->withErrors(['Unable to locate the Todos']);


// }

return view('todos.edit', compact('todo'));


}

  public function store(TodoRequest $request){


     $todo = Todo::create([
            'title' => $request->title,
            'description'=>$request->description,
            'is_complete' =>0,
        ]);
        // return response()->json($todo, 201);
        $request->session()->flash('success','Todo created successfully');

        return redirect()->route('todos.index');


        // //validate and create a new student
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required|string|min:5|max:500',
        //     'is_complete' => 'required|string|max:255',
        //     'created_at' => 'nullable|date',
        //     'updated_at' => 'nullable|date',
        // ]);



        // // ---saving ---
        // $todos = new Todo();
        // $todos->title = $request->title;
        // $todos->description = $request->description;
        // $todos->is_complete = 0;
        // $todos->created_at = now();
        // $todos->updated_at = now();
        // $todos->save();

        // return redirect()->route('todos.index')
        //                  ->with('success', 'todos added successfully.');

}
public function show($id){
    $todo = Todo::find($id);
    // if(($todo)){
    //     return to_route('todos.index')->withErrors(['Unable to locate the Todos']);
    //  if(!($todo)){
    //      request()->session()->flash('error','Unable to locate the Todos');

    //     return to_route('todos.index')->withErrors(['Unable to locate the Todos']);


// }

return view('todos.show', compact('todo'));

}
public function update(TodoRequest $request){
 $todo = Todo::find($request->todo_id);

 if(!($todo)){
        request()->session()->flash('error','Unable to locate the Todos');
         return to_route('todos.index')->withErrors(['Unable to locate the Todos']);


}

// return $request;

$todo->update([
    'title'=> $request->title,
    'description'=> $request->description,
    'is_complete'=> $request->is_complete
]);
$request->session()->flash('info','Todo updated successfully');

return redirect()->route('todos.index');

}
public function destroy(Request $request){
    $todo = Todo::find($request->todo_id);


 if(!($todo)){
        request()->session()->flash('error','Unable to locate the Todos');
         return to_route('todos.index')->withErrors(['Unable to locate the Todos']);




}



 $todo->delete();

        return redirect()->route('todos.index')
                        ->with('success', 'todo deleted successfully');
}
}
