<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        #メモ一覧を取得する
        $user = \Auth::user();
        $memos = Memo::where('user_id', $user->id)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        return view('home', compact('user','memos'));
    }
    public function create()
    {
        $user = \Auth::user();
        $memos = Memo::where('status', 1)->where('user_id', $user['id'])->get();
        return view('create', compact('user','memos'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        dd($data);
        $memo_id = Memo::insertGetId([
            'content' => $data['content'],
            'user_id' => $data['user_id'],
            //'tag' => $data['tag'],
            'status' => 1
        ]);
        /*
        $memo = new Memo;
        $memo->user_id = $request->user_id;
        $memo->content = $request->content;
        //$memo->tag = $request->tag;
        $memo->status = 1;
        $memo->save();
        */
        return redirect('/')->with('success', 'メモを作成しました');
    }
    public function edit($id){
        $user = \Auth::user();
        $memo  = Memo::where('status', 1)->where('id', $id)->where('user_id', $user['id'])->first();
        $memos = Memo::where('status', 1)->where('user_id', $user['id'])->get();
        return view('edit', compact('memos','memo', 'user'));
    }
    public function update(Request $request, $id){
        $user = \Auth::user();

        $inputs = $request->all();
        Memo::where('id', $id)->update(['content' => $inputs['content']]);
        return redirect()->route('home');
    }    
}
