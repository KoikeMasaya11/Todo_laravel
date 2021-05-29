<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Task;
use App\Repositories\Task\Respository;

class TaskController extends Controller
{
    /**
     * 新しいコントローラーインスタンスの生成
     * 
     * @return void
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * タスク所有ユーザの取得
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * ユーザーの全タスクをリスト表示
     * 
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('task.index');
    }

    /**
     * 新タスク作成
     * 
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        //タスクの処理作成
        $request->user()->tasks()->create([
            'name' => $request->$name,
        ]);

        return redirect('/tasks');
    }

}
