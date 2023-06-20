<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todos;

class TodoController extends Controller
{
    //
    public function list() {
        $data = [
            'todo1' => 'Vue tanulás',
            'todo2' => 'Composer megismerése',
            'todo3' => 'Laravel tanulása',
            'todo4' => 'Linux'
        ];
 
        return view('list', [
          'todos' => $data
        ]);
    }

    function getTodos() {
        $data = Todos::all();
        return view('list', ['todos' => $data]);
      }

    function deleteTodo($id) {
       $data = Todos::find($id);
       $data->delete();
       return redirect('list');
     }

    function showTodo($id) {
       $data = Todos::find($id);
       return view('edit', ['data' => $data]);
    }

    function update(Request $req) {
        $data = Todos::find($req->id);
        $data->task = $req->task;
        $data->save();
        return redirect('list');
      }
    
    function addTodo(Request $req) {
       $todo = new Todos;
       $todo->task = $req->task;
       $todo->done = 0;
       $todo->save();
       return redirect('list');
    }
    
}
