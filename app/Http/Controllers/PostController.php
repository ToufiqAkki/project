<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index','create']]);
    }

    public function index()
    {
        $posts = Post::get();
        return view('post.display-all', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.post-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['title'=>'required',
                            'body'=>'required',
                            'user_id'=>'required',]);

        // // dd($request->all());
        // $input = $request->all();
        // $input['post-image'] = $_FILES['file'];
        // dd($request);

        $input = $request->all();

        if($file = $request->file('file')){
            $name = $file->getClientOriginalName();
            $file->move('images',$name);
            $input['post_image']=$name;
        }
        
        // dd($input);
        Post::create($input);
        Session::flash('message', 'Created successfully');
        Session::flash('action', 'create');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {  
        $post = Post::find($post->id);
        // dd($post);
        return view('blog-post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::findOrFail($id);
         $post->delete();

        Session::flash('message', 'Deleted successfully');
        Session::flash('action', 'delete');

        return redirect(route('posts.index'));
        // return "working";

    }
}
