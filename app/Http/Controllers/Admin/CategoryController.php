<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\CategoryGroup;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publish = Category::where(['status' => '1'])->get();
        $draft = Category::where(['status' => '0'])->get();

        $publish_count = $publish->count();
        $draft_count = $draft->count();
        return view('admin.category.index')->with(compact('publish', 'draft', 'publish_count', 'draft_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = CategoryGroup::where(['status' => '1'])->get();
        return view('admin.category.create')->with(compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = Str::slug($request->title, '-');
        Category::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'url' => $url,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'group_id' => $request->group_id,
            'order' => $request->order,
            'status' => $request->status
        ]);
        return redirect()->route('category.index')->with('msg', '<h5><i class="icon fas fa-check"></i> Success!</h5> Category Saved Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = CategoryGroup::where(['status' => '1'])->get();
        $category = Category::find($id);
        return view('admin.category.edit')->with(compact('category', 'group'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
