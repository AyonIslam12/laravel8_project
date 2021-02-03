<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Exception;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->simplePaginate(5);
        return view('admin.post.manage', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*Category::where('status','active')->get();*/
        $categories = Category::all();
        return view('admin.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
           'category' => 'required',
           'title' => 'required|string|min:10|max:225|unique:posts',
           'image' => 'required|image',
           'desc' => 'required|string|min:20',
           'status' => 'required|string',
       ]);


        try {
            $image = $request->file('image');
            $file_name = rand(11111,99999).date('ymdhis.'). $image->getClientOriginalExtension();
            Post::create([
                'user_id' => auth()->id( ),
                'category_id' => $request->category,
                'title' => $request->title,
                'image' => $file_name,
                'slug' => strtolower(str_replace(' ','-',$request->title)),
                'desc' => $request->desc,
                'status' => $request->status,
            ]);
            if ($image->isValid()){
                $image->storeAs('post',$file_name);
            }

            session()->flash('type','success');
            session()->flash('message','Post create success!');
        }catch (Exception $exception){
            session()->flash('type','danger');
            session()->flash('message',$exception->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.post.view', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.post.edit', compact('post','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) return redirect()->back();
        $request->validate([
            'category' => 'required',
            'title' => 'required|string|min:10|max:225|unique:posts,id,'.$id,
            'desc' => 'required|string|min:20',
            'status' => 'required|string',


        ]);


        try {
            if($request->file('image')){
                $image = $request->file('image');
                $file_name = rand(11111,99999).date('ymdhis.'). $image->getClientOriginalExtension();
                 if ($image->isValid()){
                $image->storeAs('post',$file_name);
                }
                if (file_exists(public_path('uploads/post/'.$post->image))) unlink(public_path('uploads/post/'.$post->image));
            }else{
                $file_name = $post->image;
            }
            $post->update([
                'user_id' => auth()->id( ),
                'category_id' => $request->category,
                'title' => $request->title,
                'image' => $file_name,
                'slug' => strtolower(str_replace(' ','-',$request->title)),
                'desc' => $request->desc,
                'status' => $request->status,
            ]);


            session()->flash('type','success');
            session()->flash('message','Post upadte success!');
        }catch (Exception $exception){
            session()->flash('type','danger');
            session()->flash('message',$exception->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = Post::find($id);

                if (file_exists(public_path('uploads/post/'.$post->image))) unlink(public_path('uploads/post/'.$post->image));

                    $post->delete();
                    session()->flash('type','success');
                    session()->flash('message','Post delete success!');


        }catch (Exception $exception ){
            session()->flash('type','danger');
            session()->flash('message',$exception->getMessage());
        }
        return redirect()->back();
    }
}
