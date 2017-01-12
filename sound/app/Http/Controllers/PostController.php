<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use Auth;
use Validator;
use DB;
use App\OauthIdentities;

use GuzzleHttp\Client;
use Psy\Util\Json;

use App\Post;
use App\Hashtag;
use App\Linkedtag;

class PostController extends Controller
{
    private $client;
    private $authuser;
    private $user;
    
    public function __construct(){
        $this->client = new Client();
        $this->authuser = Auth::user();
        $this->user = OauthIdentities::find($this->authuser->id);
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = null;

        try {

            $response = $this->client->request('GET','https://api.soundcloud.com/users/'.$this->user->provider_user_id.'/tracks', [
                'query' => ['client_id' => config('eloquent-oauth.providers.soundcloud.client_id')]
            ]);
            
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        $tracks = json_decode($response->getBody()->getContents());
        return view('post.select',['tracks'=>$tracks]);
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
        
        $validator = Validator::make($request->all(),[
            'track_id'  => 'required|max:255|maxpost:10',
            'track_title'  => 'required|max:255',
            'artwork_url'  => 'required|max:255',
            'track_artist'  => 'required|max:255',
            'post_title'  => 'required|max:255',
            'post_desc'  => 'required',
            'post_subs'  => 'required',
            'post_tag'  => ''
        ]);
        $validator->setAttributeNames([
            'track_id'  => '트랙번호',
            'track_title'  => '트랙제목',
            'artwork_url'  => '아트워크',
            'track_artist'  => '아티스트',
            'post_title'  => '제목',
            'post_desc'  => '게시글',
            'post_subs'  => '가사',
            'post_tag'  => '해시태그'
        ]);
        
        if ($validator->fails()) {
            return response()->json(['status'=>'errors','error'=>401, 'data'=>null, 'message'=>$validator->errors()], 401);
        }
        
        try{
                
            DB::beginTransaction();
            
            
            if(auth()->user()->grade == 1){
                $stage = 1;
            }else{
                $stage = 2;
            }
            
            $post = new Post;
            
            $post->track_id         = $request->track_id;
            $post->track_title      = $request->track_title;
            $post->artwork_url      = $request->artwork_url;
            $post->track_artist     = $request->track_artist;
            $post->post_title       = $request->post_title;
            $post->post_desc        = $request->post_desc;
            $post->post_subs        = $request->post_subs;
            $post->stage            = $stage;
            $post->register         = auth()->user()->id;
            
            if($post->save()){
                
                $tags = explode(",",$request->post_tag);
                
                foreach($tags as $t){
                    $hashid = 0;
                    if($hashtag = Hashtag::where('tag',trim($t))->first()){
                        $hashid = $hashtag->id;
                    }else{
                        $hash = new Hashtag;
                        $hash->tag = trim($t);
                        $hash->save();
                        $hashid = $hash->id;
                    }
                    $linkTag = new Linkedtag;
                    $linkTag->tagid = $hashid;
                    $linkTag->postid = $post->id;
                    $linkTag->save();
                }
                
            }
            
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            abort(403, $e->getMessage().",".$e->getLine());
        }catch(\InvalidArgumentException $e){
            DB::rollback();
            abort(403, $e->getMessage());
        }
        if(auth()->user()->grade == 1){
            $return_url = "/openmic/".$post->id;
        }else{
            $return_url = "/onstage/".$post->id;
        }
        
        return response()->json([
            'status'=>'success',
            'error'=>null,
            'data' => $post,
            'return_url' => $return_url,
            'message'=>'데이터 전송 성공!'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    
    public function posting($id){
        $response = null;

        try {

            $response = $this->client->request('GET','http://api.soundcloud.com/tracks/'.$id, [
                'query' => ['client_id' => config('eloquent-oauth.providers.soundcloud.client_id')]
            ]);
            
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        $track = json_decode($response->getBody()->getContents());
        return view('post.post',['track'=>$track]);
    }
}
