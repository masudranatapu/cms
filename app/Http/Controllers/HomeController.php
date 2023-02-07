<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\User;
use App\Models\Franchise;
use App\Models\CustomPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{

    public function index()
    {
        $data['title'] = 'Home';
        $data['og_title'] = 'N/A';
        $data['og_description'] = '';
        $data['og_image'] = '';
        $data['best_franchises'] = Franchise::where('status', 1)->orderBy('order_number', 'desc')->take(8)->get();
        $data['new_franchises'] = Franchise::where('status', 1)->orderBy('created_at', 'desc')->take(8)->get();
        $data['lowcost_franchises'] = Franchise::where('status', 1)->orderBy('min_hand_cash', 'asc')->take(8)->get();
        $data['row'] = '';
        return view('frontend.index', $data);
    }

    public function privacyPolicy()
    {
        $data['title'] = 'Privacy Policy';
        $data['og_title'] = '';
        $data['og_description'] = '';
        $data['og_image'] = '';
        $data['row'] = CustomPage::where('url_slug', 'privacy-policy')->first();
        return view('frontend.custom_page', $data);
    }

    public function termsCondition()
    {
        $data['title'] = 'Terms Condition';
        $data['og_title'] = '';
        $data['og_description'] = '';
        $data['og_image'] = '';
        $data['row'] = CustomPage::where('url_slug', 'terms-and-conditions')->first();
        return view('frontend.custom_page', $data);
    }

    public function faq()
    {
        $data['title'] = 'FAQ';
        $data['og_title'] = '';
        $data['og_description'] = '';
        $data['og_image'] = '';
        $data['faqs'] = Faq::get();

        return view('frontend.faq', $data);
    }

    public function about()
    {
        $data['title'] = 'About';
        $data['og_title'] = '';
        $data['og_description'] = '';
        $data['og_image'] = '';
        $data['aboput'] = '';
        return view('frontend.about', $data);
    }

    public function contact()
    {
        $data['title'] = 'Contact';
        $data['og_title'] = '';
        $data['og_description'] = '';
        $data['og_image'] = '';
        $data['contact'] = '';
        return view('frontend.contact', $data);
    }



    public function disclaimer()
    {
        $data['title'] = 'disclaimer';
        $data['og_title'] = '';
        $data['og_description'] = '';
        $data['og_image'] = '';
        $data['disclaimer'] = '';
        return view('frontend.disclaimer', $data);
    }
    public function blogs()
    {
        $data['title'] = 'Blogs';
        $data['og_title'] = '';
        $data['og_description'] = '';
        $data['og_image'] = '';
        $data['blogs'] = '';
        return view('frontend.blogs.index', $data);
    }
    public function blogsDetails($slug)
    {
        $data['title'] = 'Blog Details';
        $data['og_title'] = '';
        $data['og_description'] = '';
        $data['og_image'] = '';
        $data['bolg'] = '';
        return view('frontend.blogs.details', $data);
    }


    public function userRegister(Request $request)
    {
        $setting = getSetting();

        $request->validate([
            'name' => "required",
            'email' => "required|email|unique:users,email",
            'password' => "required|confirmed|min:8|max:50",
        ]);

        $created = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($created) {
            Auth::guard('user')->logout();
            Auth::guard('admin')->logout();
            Auth::guard('user')->login($created);
            if ($setting->customer_email_verification) {
                return redirect()->route('verification.notice');
            } else {
                return redirect()->route('user.dashboard');
            }
        }
    }


}
