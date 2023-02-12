<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    protected $category;
    public $user;

    public function __construct(Category $category)
    {
        $this->category     = $category;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the categories.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('admin.category.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = 'Category';
        $data['rows'] = Category::oldest('order')->get();
        return view('admin.category.index', compact('data'));
    }




}
