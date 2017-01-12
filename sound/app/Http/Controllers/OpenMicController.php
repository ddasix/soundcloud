<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use Auth;
use App\OauthIdentities;

use GuzzleHttp\Client;
use Psy\Util\Json;

class OpenMicController extends Controller
{
    private $client;
    private $authuser;
    private $user;

    public function __construct(){
    
        $this->middleware('auth')->except('show');
        $this->client = new Client();
        $this->authuser = Auth::user();
        $this->user = OauthIdentities::find($this->authuser->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('openmic.list');
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

        $tracks = $response->getBody()->getContents();
        return view('openmic.detail',['tracks' => $tracks]);
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
