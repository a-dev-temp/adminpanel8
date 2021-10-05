<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CategoryGroup;

class CategoryGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publish = CategoryGroup::where(['status' => '1'])->get();
        $draft = CategoryGroup::where(['status' => '0'])->get();

        $publish_count = $publish->count();
        $draft_count = $draft->count();
        return view('admin.category-group.index')->with(compact('publish', 'draft', 'publish_count', 'draft_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category-group.create');
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
        CategoryGroup::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'url' => $url,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'order' => $request->order,
            'status' => $request->status
        ]);
        return redirect()->route('category-group.index')->with('msg', '<h5><i class="icon fas fa-check"></i> Success!</h5> Group Category Saved Successfully.');
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
        $group = CategoryGroup::find($id);
        return view('admin.category-group.edit')->with(compact('group'));
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
        $url = Str::slug($request->title, '-');

        $category_group = CategoryGroup::find($id);

        $category_group->title = $request->title;
        $category_group->url = $url;
        $category_group->short_description = $request->short_description;
        $category_group->description = $request->description;
        $category_group->order = $request->order;
        $category_group->status = $request->status;

        $category_group->save();
        return redirect()->route('category-group.index')->with('msg', '<h5><i class="icon fas fa-check"></i> Success!</h5> Group Category Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_group = CategoryGroup::find($id);
        $category_group->delete();
        return redirect()->route('category-group.index')->with('msg', '<h5><i class="icon fas fa-check"></i> Success!</h5> Group Category Deleted Successfully.');
    }
}
