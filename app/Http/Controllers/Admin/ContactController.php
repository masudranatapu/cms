<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class ContactController extends Controller
 {
    public $user;
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact     = $contact;
       $this->middleware(function ($request, $next) {
             $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }



    public function index()
    {
       if (is_null($this->user) || !$this->user->can('admin.contact.index')) {
            abort(403, 'Sorry !! You are Unauthorized.');
       }

        $data['title']  = 'Contact';
        $data['rows']   =  Contact::orderBy('id', 'desc')->get();
        return view('admin.contact.index',compact('data'));
   }

//     public function view()
//     {
//         if (is_null($this->user) || !$this->user->can('admin.contact.view')) {
//             abort(403, 'Sorry !! You are Unauthorized.');
//         }


//         $data['title'] = 'Contact Edit';
//         $data['row'] = Contact::find($id);
//         return view('admin.contact.view', compact('data'));
//     }

//     public function delete($id)
//     {
//         if (is_null($this->user) || !$this->user->can('admin.contact.delete')) {
//             abort(403, 'Sorry !! You are Unauthorized.');
//         }

//         $contact = Contact::find($id);

//         $contact->delete();

//         Toastr::success(trans('Contact Deleted Successfully !'), 'Success', ["positionClass" => "toast-top-center"]);
//         return view('admin.contact.view');

//     }
}
