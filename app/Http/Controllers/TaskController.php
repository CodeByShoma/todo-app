<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $tasks = Task::select('id','title', 'due_date')->get();

        //タスクが未完了のタスクのみ取得
        $tasks = Task::where('is_done', false)->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'due_date' => ['nullable','date'],
        ]);

        // 新規登録
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 指定されたIDのタスクを取得（なければ404）
        $task = Task::findOrFail($id);

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // バリデーション
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'due_date' => ['nullable','date'],
        ]);

        // 更新処理
        $task = Task::findOrFail($id);
        $task->update([
            'title' => $request -> title,
            'description' => $request -> description,
            'due_date' => $request -> due_date,
        ]);

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 指定されたIDのタスクを取得（なければ404）
        $task = Task::findOrFail($id);

        $task -> delete();

        return redirect()->route('tasks.index');
    }

    public function complete(string $id)
    {
        // 指定されたIDのタスクを取得（なければ404）
        $task = Task::findOrFail($id);
        $task -> is_done = true;
        $task -> save();

        return redirect()->route('tasks.index');
    }

    public function completed()
    {
        //完了のタスクのみ取得
        $tasks = Task::where('is_done', true)->get();

        return view('tasks.completed', compact('tasks'));
    }


}
