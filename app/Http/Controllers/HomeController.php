<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=User::all();
        return view('home',compact('user'));
    }

    public function profile($userId)
    {
        $user=User::find($userId);
        return view('profile',compact('user'));
    }

    public function UpdateProfile(Request $request)
    {
        dd($request);
    }
}
