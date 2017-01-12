<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class OnStageController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('onstage.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $likes = [];
        $clips = [];
        
        foreach($post->Likes as $like){
            array_push($likes,$like->register);
        }
        
        foreach($post->Clips as $clip){
            array_push($clips,$clip->register);
        }
        
        if(request()->ajax()){
            
            $show = view('onstage.raise',
            [
                'post' => $post,
                'likes'=>$likes,
                'clips'=>$clips
            ])->render();
            
            return response()->json([
                'status'=>'success',
                'error'=>null,
                'data' => $show,
                'message'=>'데이터 전송 성공!'
            ], 200);
        }else{
            return view('onstage.detail',
            [
                'post' => $post,
                'likes'=>$likes,
                'clips'=>$clips
            ]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
