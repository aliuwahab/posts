<?php

namespace App\Http\Controllers;

use Guzzle\Http\Client;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->client->setBaseUrl(env('API_URL'));
    }

    public function index(){
        $response = $this->client->get("/comments")->send();
        return response()->json($response->json(), 200);
    }

    public function show($id){
        $response = $this->client->get("/comments/{$id}")->send();
        return response()->json($response->json(), 200);
    }
}
