<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostTransactionRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostTransactionController extends Controller
{
    public function __construct(){

    }

    public function store(StorePostTransactionRequest $request){
        dd(Post::findOrFail($request->post_id));
    }
}
