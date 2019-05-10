<?php

namespace App\Http\Controllers;

use Guzzle\Http\Client;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $response = $this->client->get('/users')->send();
        return response()->json($response->json(), 200);
    }

    public function show($userId)
    {
        $response = $this->client->get("/users/{$userId}")->send();
        return response()->json($response->json(), 200);
    }

    public function userPosts($userId)
    {
        $response = $this->client->get("/posts?userId={$userId}")->send();
        return response()->json($response->json(), 200);
    }
}
