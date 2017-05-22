<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){

    	$posts = Post::all();

    	return view('posts.index')->with(['posts'=> $posts]);
    }

    public function show(Post $post){

    	return view('posts.show')->with(['post'=> $post]);
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
