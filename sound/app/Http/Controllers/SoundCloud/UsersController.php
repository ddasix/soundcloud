<?php

namespace App\Http\Controllers\SoundCloud;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Response;
use Auth;
use App\OauthIdentities;

use GuzzleHttp\Client;
use Psy\Util\Json;


class UsersController extends Controller
{
    private $authuser;
    private $user;
    
    public function __construct(){
        
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
        $client = new Client();
        $response = null;

        try {

            $response = $client->request('GET','https://api.soundcloud.com/users/'.$this->user->provider_user_id, [
                'query' => ['client_id' => config('eloquent-oauth.providers.soundcloud.client_id')]
            ]);
            
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        return Response::json($response->getBody()->getContents());
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
    
    public function complate(){
        return view('user.login.complate');
    }
    public function email($id){
        return view('user.login.email');
    }
    public function login(){
        return view('user.login.login');
    }
    
    public function tracks(){
        
        $client = new Client();
        $response = null;

        try {

            $response = $client->request('GET','https://api.soundcloud.com/users/'.$this->user->provider_user_id.'/tracks', [
                'query' => ['client_id' => config('eloquent-oauth.providers.soundcloud.client_id')]
            ]);
            
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        return Response::json($response->getBody()->getContents());
    }
    public function playlists(){
        
        $client = new Client();
        $response = null;

        try {

            $response = $client->request('GET','https://api.soundcloud.com/users/'.$this->user->provider_user_id.'/playlists', [
                'query' => ['client_id' => config('eloquent-oauth.providers.soundcloud.client_id')]
            ]);
            
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        return Response::json($response->getBody()->getContents());
    }
    public function followingsList(){
        
        
        $client = new Client();
        $response = null;

        try {

            $response = $client->request('GET','https://api.soundcloud.com/users/'.$this->user->provider_user_id.'/followings', [
                'query' => ['client_id' => config('eloquent-oauth.providers.soundcloud.client_id')]
            ]);
            
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        return Response::json($response->getBody()->getContents());
    }
    public function followings($id){
        
        
        $client = new Client();
        $response = null;


        if (Request::isMethod('get')){
            try {
    
                $response = $client->request('GET','https://api.soundcloud.com/users/'.$this->user->provider_user_id.'/tracks/'.$id, [
                    'query' => ['client_id' => config('eloquent-oauth.providers.soundcloud.client_id')]
                ]);
                
            } catch (RequestException $e) {
                echo Psr7\str($e->getRequest());
                if ($e->hasResponse()) {
                    echo Psr7\str($e->getResponse());
                }
            }
    
            return Response::json($response->getBody()->getContents());
            
        }else if(Request::isMethod('put')){
            
        }else if(Request::isMethod('delete')){
            
        }
    }
    public function followersList(){
        
        
        $client = new Client();
        $response = null;

        try {

            $response = $client->request('GET','https://api.soundcloud.com/users/'.$this->user->provider_user_id.'/followers', [
                'query' => ['client_id' => config('eloquent-oauth.providers.soundcloud.client_id')]
            ]);
            
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        return Response::json($response->getBody()->getContents());
    }
    public function followers($id){
        
        
        $client = new Client();
        $response = null;


        if (Request::isMethod('get')){
            try {
    
                $response = $client->request('GET','https://api.soundcloud.com/users/'.$this->user->provider_user_id.'/followers/'.$id, [
                    'query' => ['client_id' => config('eloquent-oauth.providers.soundcloud.client_id')]
                ]);
                
            } catch (RequestException $e) {
                echo Psr7\str($e->getRequest());
                if ($e->hasResponse()) {
                    echo Psr7\str($e->getResponse());
                }
            }
    
            return Response::json($response->getBody()->getContents());
            
        }else if(Request::isMethod('put')){
            
        }else if(Request::isMethod('delete')){
            
        }
    }
    public function comments(){
        
        
        $client = new Client();
        $response = null;

        try {

            $response = $client->request('GET','https://api.soundcloud.com/users/'.$this->user->provider_user_id.'/comments', [
                'query' => ['client_id' => config('eloquent-oauth.providers.soundcloud.client_id')]
            ]);
            
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        return Response::json($response->getBody()->getContents());
    }
    public function favoritesList(){
        
        
        $client = new Client();
        $response = null;

        try {

            $response = $client->request('GET','https://api.soundcloud.com/users/'.$this->user->provider_user_id.'/favorites', [
                'query' => ['client_id' => config('eloquent-oauth.providers.soundcloud.client_id')]
            ]);
            
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        return Response::json($response->getBody()->getContents());
    }
    public function favorites($id){
        
        
        $client = new Client();
        $response = null;

        if (Request::isMethod('get')){
            
            try {
    
                $response = $client->request('GET','https://api.soundcloud.com/users/'.$this->user->provider_user_id.'/favorites/'.$id, [
                    'query' => ['client_id' => config('eloquent-oauth.providers.soundcloud.client_id')]
                ]);
                
            } catch (RequestException $e) {
                echo Psr7\str($e->getRequest());
                if ($e->hasResponse()) {
                    echo Psr7\str($e->getResponse());
                }
            }
    
            return Response::json($response->getBody()->getContents());
        }else if(Request::isMethod('put')){
            
        }else if(Request::isMethod('delete')){
            
        }
    }
    public function webProfiles($id){
        
        
        $client = new Client();
        $response = null;


        if (Request::isMethod('get')){
            try {
    
                $response = $client->request('GET','https://api.soundcloud.com/users/'.$this->user->provider_user_id.'/web-profiles'.$id, [
                    'query' => ['client_id' => config('eloquent-oauth.providers.soundcloud.client_id')]
                ]);
                
            } catch (RequestException $e) {
                echo Psr7\str($e->getRequest());
                if ($e->hasResponse()) {
                    echo Psr7\str($e->getResponse());
                }
            }
    
            return Response::json($response->getBody()->getContents());
            
        }else if(Request::isMethod('put')){
            
        }else if(Request::isMethod('delete')){
            
        }
    }
}
