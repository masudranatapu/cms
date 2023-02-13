<?php


namespace App\Http\Controllers\Admin;

use DB;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    protected $customer;
    public $user;

    public function __construct(User $customer)
    {
        $this->customer     = $customer;
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
        if (is_null($this->user) || !$this->user->can('admin.customer.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $data['title'] = 'Customer';
        $data['rows'] = User::oldest('id')->get();
        return view('admin.customer.index', compact('data'));
    }


    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('admin.customer.store')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'          => 'required|max:100',
                'order_number'  => 'required',
                'status'        => 'required'
            ]);

            $slug = Str::slug($request->name);
            $check_slug = User::where('slug',$slug)->first();
            if($check_slug){
                $slug = $slug.'_'.uniqid();
            }

            $category = new Category();
            $category->name         = $request->name;
            $category->slug         = $slug;
            $category->order_number = $request->order_number;
            $category->status       = $request->status;
            $category->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Category not Created !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.customer.index');
        }
        DB::commit();
        Toastr::success(trans('Category Successfully!'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.customer.index');
    }

    public function edit($id)
    {

        if (is_null($this->user) || !$this->user->can('admin.customer.edit')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $category = User::find($id);
        $html = view('admin.customer.edit', compact('category'))->render();
        return response()->json($html);
    }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.customer.update')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        DB::beginTransaction();
        try {
            $this->validate($request, [
                'name'  => 'required|max:100',
                'order_number'  => 'required',
                'status' => 'required'
            ]);

            $slug = Str::slug($request->name);
            $check_slug = User::where('id','!=',$id)->where('slug',$slug)->first();
            if($check_slug){
                $slug = $slug.'_'.uniqid();
            }

            $category = User::find($id);
            $category->name         = $request->name;
            $category->slug         = $slug;
            $category->order_number = $request->order_number;
            $category->status       = $request->status;
            $category->save();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Category not Updated !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.customer.index');
        }
        DB::commit();
        Toastr::success(trans('Post Updated Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.customer.index');
    }



    public function delete($id)
    {
        if (is_null($this->user) || !$this->user->can('admin.customer.delete')) {
            abort(403, 'Sorry !! You are Unauthorized.');
        }

        $check = SubUser::where('category_id',$id)->first();
        if($check){
            Toastr::error(trans('Delete category first then you can delete subcategory !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.customer.index');
        }

        DB::beginTransaction();
        try {
            $category = User::find($id);
            $category->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error(trans('Category not Deleted !'), 'Error', ["positionClass" => "toast-top-center"]);
            return redirect()->route('admin.customer.index');
        }
        DB::commit();
        Toastr::success(trans('Category Deleted Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('admin.customer.index');
    }





}
