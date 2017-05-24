<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){

        // Muestra toda la data
    	//$posts = Post::all();

        // Muestra toda la data segun cierto orden
        //$posts = Post::orderBy('id','desc')->get();

        // Muestra toda la data paginada
        $posts = Post::orderBy('id','desc')->paginate(10);

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

    public function create(){

        $post = new Post;

        return view('posts.create')->with(['post'=>$post]);
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

        // Tipo flash, una vez que es leida es eliminada
        session()->flash('message', 'Post Created!');

        return redirect()->route('posts_path');
    }

    public function edit(Post $post){

        return view('posts.edit')->with(['post'=>$post]);
    }

    public function update(Post $post, UpdatePostRequest $request){

        /*
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->url = $request->get('url');
        $post->save();
        */
        
        // Recibe una rreglo asociativo
        $post->update(

            $request->only('title','description','url')
        );

        session()->flash('message', 'Post Updated!');

        return redirect()->route('post_path',['post' => $post->id]);
    }

    public function delete(Post $post){

        $post->delete();

        session()->flash('message', 'Post Deleted!');

        return redirect()->route('posts_path');
    }

}
