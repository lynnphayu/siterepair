<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Post;
use Illuminate\Http\Request;
use App\Department;

class PageController extends Controller
{
    //
    public function dep($keyword){
    	$dep = Department::where('name',$keyword)->with(['research','degrees','staff','courses'])->first();
    	return view('departments.department',['dep' => $dep]);
    }

    public function index(){
        $posts = Post::with('photos')->orderBy('created_at','desc')->take(5)->get();
        $announcements = Announcement::orderBy('created_at','desc')->take(3)->get();
        return view('index',['posts' => $posts , 'announcements' => $announcements]);
    }
    public function postDetail($id){
        $post = Post::find($id);
        return view('detail',['post' => $post]);

    }
    public function articles(){
        $posts = Post::paginate(5);
        $announcements = Announcement::paginate(5);
        return view('articles',['posts' => $posts , 'announcements' => $announcements]);
    }
}
