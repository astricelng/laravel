<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){

    	//$posts = Post::all();

        $posts = Post::orderBy('id','desc')->get();

    	return view('posts.index')->with(['posts'=> $posts]);
    }

    public function show(Post $post){

    	return view('posts.show')->with(['post'=> $post]);
    }

    public function create(){

        return view('posts.create');
    }

    public function store(CreatePostRequest $request){

        //$request->get('title');
        //$request->title;

        /*$post = new Post;
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->url = $request->get('url');
        $post->save();
*/
        $post = Post::create($request->only('title', 'description', 'url'));

        return redirect()->route('posts_path');
    }

    // Cuando no se coloca la variable de entrada como tipo Post
    // para que lo maneje laravel directamente
/*
    public function show($postId){

    	$post = Post::find($postId);

    	if( is_null($post)){
    		abort(404);
    	}


    	return view('posts.show')->with(['post'=> $post]);
    }*/
}
