<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class BlogPostController extends Controller
{
    public function index()
    {
        $blog_posts = Blog::with('category')->orderBy('id', 'desc')->get();
        return view('admin.blog.post.index', compact('blog_posts'));
    }

    public function create()
    {
        $bog_category = BlogCategory::orderBy('id', 'desc')->get();

        return view('admin.blog.post.create', compact('bog_category'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $this->validate($request, [
                'title'         => 'required|max:150',
                'tags'          => 'required',
                'category_id'   => 'required',
                'status'        => 'required',
                'details'       => 'nullable',
                'image'         => 'nullable'

            ]);
            if ($request->hasFile('image')) {
                $image = Image::make($request->file('image'));

                $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
                $destinationPath = public_path('assets/images/blog/');
                $image->save($destinationPath . $imageName);

                $destinationPathThumbnail = public_path('assets/images/blog/');
                if ($request->file('thumbnail')) {
                    uploadImage($request->thumbnail, 'assets/images/blog/', 250, 200);
                }
                if ($request->file('banner_image')) {
                    uploadImage($request->banner_image, 'assets/images/blog/', 850, 400);
                }
                $image->save($destinationPathThumbnail . $imageName);
            }
            $blog_post = new Blog();
            $blog_post->user_id = Auth::id();
            $blog_post->title = $request->title;
            $blog_post->slug = Str::slug($request->title);
            $blog_post->category_id = $request->category_id;
            $blog_post->image = $imageName;
            $blog_post->status = $request->status;
            $blog_post->tags = json_encode($request->tags,true);
            $blog_post->details = $request->details;
            $blog_post->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Post not Created !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.blog.post.create');
        }
        DB::commit();
        Toastr::success(trans('Post Created Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.blog.post.index');
    }

    public function edit($id)
    {
        $blog_post = Blog::find($id);
        $bog_category = BlogCategory::orderBy('id', 'desc')->get();
        return view('admin.blog.post.edit', compact('blog_post', 'bog_category'));
    }

    public function update(Request $request, $id){
       
        DB::beginTransaction();
        try {

            $this->validate($request, [
                'title'         => 'required|max:150',
                'tags'          => 'required',
                'category_id'   => 'required',
                'status'        => 'required',
                'details'       => 'nullable',
                'image'         => 'nullable'

            ]);
       
            $blog_post =  Blog::find($id);
            $blog_post->user_id = Auth::id();
            $blog_post->title = $request->title;
            $blog_post->slug = Str::slug($request->title);
            $blog_post->category_id = $request->category_id;
            $blog_post->status = $request->status;
            $blog_post->tags = json_encode($request->tags, true);
            $blog_post->details = $request->details;

        if ($request->hasFile('image')) {
            $image = Image::make($request->file('image'));

            $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $destinationPath = public_path('assets/images/blog/');
            $image->save($destinationPath . $imageName);

            $destinationPathThumbnail = public_path('assets/images/blog/');
            if ($request->file('thumbnail')) {
                uploadImage($request->thumbnail, 'assets/images/blog/', 250, 200);
            }
            if ($request->file('banner_image')) {
                uploadImage($request->banner_image, 'assets/images/blog/', 850, 400);
            }
            $image->save($destinationPathThumbnail . $imageName);
            $blog_post->image = $imageName;
        }
            $blog_post->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Post not Updated !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->back();
        }
        DB::commit();
        Toastr::success(trans('Post Updated Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.blog.post.index');
    }

    public function view($id){
        $blog_post = Blog::find($id);
        $bog_category = BlogCategory::orderBy('id', 'desc')->get();
        return view('admin.blog.post.view', compact('blog_post', 'bog_category'));
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $blog_post = Blog::find($id);
            if (File::exists('assets/images/blog/' . $blog_post->image)) {
                File::delete('assets/images/blog/' . $blog_post->image);
            }
            $blog_post->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Post not Deleted !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.blog.post.index');
        }
        DB::commit();
        Toastr::success(trans('Post Deleted Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.blog.post.index');
    }
}
