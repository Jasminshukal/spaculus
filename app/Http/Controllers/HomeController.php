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

    public function UpdateProfile($user,Request $request)
    {
        $files_list=array();
        if($request->has('old_file'))
        {
            $files_list=array_merge($request->old_file);
        }
        if($request->has('image'))
        {
            foreach($request->file('image') as $file_up)
            {
                $path = $file_up->store(
                    '/documents', 'public'
                );
                array_push($files_list,"storage/".$path);
            }
        }

        $User=User::find($user);
        $User->phone_number=json_encode($request->phone);
        $User->image=json_encode($files_list);
        $User->save();
        return redirect()->route('home');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->back()->withSuccess('Deleted');
    }
}
