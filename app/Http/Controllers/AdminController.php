<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
   public function post_page()
    {
        $post = Post::all();

        // Pass the $posts data to the view
        return view('dashboard.post_page', compact('post'));
    }
    public function manage_user()
    {
        $user = User::all();
        // Pass the $posts data to the view
        return view('dashboard.manage_user',compact('user'));
    }
    public function add_post(Request $request)
    {
        $user = Auth()->user();
        $user_id = $user->id;
        $name = $user->name;

 $post =new Post;
        $post->title =$request -> title;
        $post->Description =$request -> Description;
        $post->post_status ='active';
        $post->user_id = $user_id;
        $post->name =$name;

        /////////
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image-> getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $post->image =$imagename;
        }

        $post->save();
        return redirect() -> back();

    }

    public function delete_post($id)
    {
        $post= Post::find($id);
        $post->delete();
        return redirect()->back()->with('message','Post Deleted Sucessfully');
    }

    public function edit_post($id)
    {
        $post= Post::find($id);
        return view ('dashboard.edit_post',compact('post'));

    }

    public function delete_user($id)
    {
        $post= User::find($id);
        $post->delete();
        return redirect()->back()->with('message','Post Deleted Sucessfully');
    }

    public function edit_user($id)
    {
        $user= User::find($id);
        return view ('dashboard.edit_user',compact('user'));

    }

    public function update_post(Request $request,$id)
    {
        $data= Post::find($id);
        $data->title=$request->title;
        $data->Description=$request->Description;
        $image=$request-> image;
        if($image)
        {
            $imagename=time().'.'.$image-> getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $data->image =$imagename;
        }
        $data->save();
        return redirect()->back()->with('message','Post Updated Sucessfully');

        return view ('dashboard.edit_post',compact('post'));

    }

    public function Update_user(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required', // Ensure 'name' field is not empty
            'email' => 'required|email', // Ensure 'email' field is not empty and is a valid email address
        ]);

        // Find the user by ID
        $user = User::find($id);

        if (!$user) {
            // Handle case where user is not found
            return redirect()->back()->with('error', 'User not found.');
        }

        // Update user data
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Save the updated user
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('message', 'User updated successfully.');
    }

}
