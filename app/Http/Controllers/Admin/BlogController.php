<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BlogController extends Controller
{
    public function index()
    {
        $blog_categories = BlogCategory::orderBy('id', 'desc')->get();
        return view('admin.blog.category.index', compact('blog_categories'));
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'  => 'required|max:100',
                'order_number'  => 'required',
                'status' => 'required'
            ]);

            $blog_category = new BlogCategory();

            $blog_category->name = $request->name;

            $blog_category->slug = Str::slug($request->name);
            $blog_category->order_number = $request->order_number;
            $blog_category->status = $request->status;
            $blog_category->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Post Category not Created !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.blog.category.index');
        }
        DB::commit();
        Toastr::success(trans('Post Category Successfully!'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.blog.category.index');
    }
    public function edit($id)
    {
        // dd($id);
        $blog_category = BlogCategory::find($id);
        $html = view('admin.blog.category.edit', compact('blog_category'))->render();
        return response()->json($html);
    }

    public function update(Request $request, $id)
    {

        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'  => 'required|max:100',
                'order_number'  => 'required',
                'status' => 'required'
            ]);

            $blog_category = BlogCategory::find($id);

            $blog_category->name = $request->name;
            $blog_category->slug = Str::slug($request->name);
            $blog_category->order_number = $request->order_number;
            $blog_category->status = $request->status;
            $blog_category->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Post Category not Updated !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.blog.category.index');
        }
        DB::commit();
        Toastr::success(trans('Post Updated Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.blog.category.index');
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $blog_category = BlogCategory::find($id);
            $blog_category->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Post Category not Deleted !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.blog.category.index');
        }
        DB::commit();
        Toastr::success(trans('Post Category Deleted Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.blog.category.index');
    }

}
