<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Guzzle\Http\Client;

class PostController extends Controller
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

    public function index()
    {
        $response = $this->client->get("/posts")->send();
        return response()->json($response->json(), 200);
    }

    public function show($postId)
    {
        $response = $this->client->get("/posts/{$postId}")->send();
        return response()->json($response->json(), 200);
    }

    public function postComments($postId)
    {
        $response = $this->client->get("/comments?postId={$postId}")->send();
        return response()->json($response->json(), 200);
    }
}
