<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class HomeController extends Controller
{
    public function homepage()
    {

        $post = Post::all();

        return view('home.homepage',compact('post'));
    }

    public function backtohomepage()
    {

        return view('home.homepage');
    }

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
        return view('dashboard.dashboard');
    }
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }
    public function post_details($id)
    {
        $post = Post::find($id);
        return view('home.post_details',compact('post'));
    }
    public function my_post()
    {
        $user=Auth::user();
        $userid=$user->id;
        $data =Post::where('user_id','=',$userid)->get();
        return view('home.my_post',compact('data'));
    }
//    public function homepage()
//    {
//        return view('home.homepage');
//    }
}
