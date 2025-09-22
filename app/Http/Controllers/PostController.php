<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\forcedelete;
//use App\Http\Controllers\str_slug;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')

        ->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->count() == 0)
        {

            return redirect()->back();

        }
        return view('admin.posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

                'title' => 'required',

                'content' => 'required',
                'featured' => 'required|image',
                'category_id' => 'required'


        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([

            'title'       => $request->title,
            'content'        => $request->content,
            'category_id' => $request->category_id,
            'featured'    => 'uploads/posts' . $featured_new_name,
            'slug' => Str::slug($request->title)

        ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post = Post::find($id);

        return view('admin.posts.edit')
        ->with('posts', $post)
        ->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [

            'title' => 'required',
            'content' => 'required',

            'category_id' => 'required'
        ]);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;

            $featured_new_name =  time() . $featured->getClientOriginalName();

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->back();
    }

    public function trashed()

    {

         $posts = Post::onlyTrashed()->get();

         return view('admin.posts.trashed')->with('posts', $posts);

    }


    public function kill($id)

    {

         $post = Post::withTrashed()->where('id', $id)->first();

         $post->forceDelete();

         return redirect()->back();

    }

    public function restore($id)

    {

         $post = Post::withTrashed()->where('id', $id)->first();

         $post->restore();

         return redirect()->route('posts');

    }
}
