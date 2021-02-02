<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Exception;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','desc')->simplepaginate(5);


       return view('admin.category.manage',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
           'name' => 'required|string|unique:categories',
           'status' => 'required|string:',
        ]);
        try {
            /*$category = new Category();
            $category->user_id = auth()->id();
            $category->name = $request->name;
            $category->slug = strtolower(str_replace(' ','-',$request->name));
            $category->status = $request->status;
            $category->save();*/

            Category::create([
            'user_id'  => auth()->id(),
            'name'     => $request->name,
            'slug'     => strtolower(str_replace(' ','-',$request->name)),
            'status'   => $request->status,

            ]);
            session()->flash('type','success');
            session()->flash('message','Category save success!');
        }catch (Exception $exception ){
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
       $category = Category::find($id);
        return view('admin.category.view', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if ($category)
        return view('admin.category.edit', compact('category'));
        else
            return redirect()->back();
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
        $request->validate([
            'name' => 'required|string|min:4|max:16|unique:categories,id,'.$id,
            'status' => 'required|string:',
        ]);
        try {
            $category = Category::find($id);
            $category->user_id = auth()->id();
            $category->name = $request->name;
            $category->slug = strtolower(str_replace(' ','-',$request->name));
            $category->status = $request->status;
            $category->update();

            /*Category::update([
                'user_id'  => auth()->id(),
                'name'     => $request->name,
                'slug'     => strtolower(str_replace(' ','-',$request->name)),
                'status'   => $request->status,

            ]);*/
            session()->flash('type','success');
            session()->flash('message','Category upadate success!');
        }catch (Exception $exception ){
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
            $cat = Category::find($id);
            $cat->delete();
            session()->flash('type','success');
            session()->flash('message','Category delete success!');
        }catch (Exception $exception ){
            session()->flash('type','danger');
            session()->flash('message','Category not deleted successfully!');
        }
       return redirect()->back();
    }
}
