<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Post;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        //$posts = $post->all();
        $posts = $post->where('user_id', auth()->user()->id)->get();
        return view('home', compact('posts'));
    }

    public function show($id){

        $post = Post::find($id);

        //INTERROMPE A EXECUÇÃO QUANDO NÃO FOR PERMITIDO
        //$this->authorize('show-post', $post);

        //FAZ REDIRECIONAMENTO OU OUTRA COISA QUALQUER
        //INTERROMPE A EXECUÇÃO TAMBÉM
        if(Gate::denies('showPost', $post))
            return "POST NÃO AUTORIZADO PARA VISUALIZAÇÃO";

        return view('show', compact('post'));


    }
}
