<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    protected $subcategory;
    public $user;

    public function __construct(SubCategory $subcategory)
    {
        $this->subcategory     = $subcategory;
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
        if (is_null($this->user) || !$this->user->can('admin.subcategory.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = 'Sub Category';
        $data['rows'] = SubCategory::oldest('order')->get();
        return view('admin.subcategory.index', compact('data'));
    }


}
