<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    public function index() {
        $todo = Todo::all();
        return response()->json($todo);
    }
    /**
     * ToDo作成.
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request) {
        $todo = Todo::create($request->all());

        return response()->json($todo);
    }
    /**
     * ToDo取得.
     *
     * @param Request $request
     * @return void
     */
    public function fetch(Request $request) {
        $todo = Todo::find($request->id);
        return response()->json($todo);
    }
    /**
     * ToDo更新.
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request) {
        $todo = Todo::find($request->id);
        $todo->update([
            'id' => $request->id,
            'text' => $request->text,
        ]);
        return response()->json($todo);
    }
    /**
     * ToDo削除.
     *
     * @param Request $request
     * @return void
     */
    public function delete(Request $request) {
        $todo = Todo::find($request->id);
        $todo->delete();
        return response()->json();
    }
}
