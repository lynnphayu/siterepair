<?php
namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Post;
use App\Photos;
use App\Announcement;
use Illuminate\Support\Facades\Storage;

class postsController extends Controller
{
  public function index(){
    // $posts = Post::with('photos')->orderBy('created_at','desc')->limit(4)->get();
     $posts = Post::with('photos')->where('id',1)->get();
    $announcements =  Announcement::orderBy('created_at','desc')->get();
    $photos = Photos::orderBy('id','desc')->get();
    // return view('index',['posts'=> $posts ,'photos' => $photos,'announcements' => $announcements]);
    return response()->json(['posts'=> $posts ,'photos' => $photos,'announcements' => $announcements],200);
    }

  public function details($id){
    $post=Post::with('photos')->find($id);
    // return view('posts.details',['post' => $post]);
    return response()->json(['post' => $post]);
  }

  
  public function  insert(Request $request){
    $this->validate($request,['title'=>'required','content' => 'required','publisher' => 'required']);
    $postData=$request->all();
    Post::create($postData);
    Session::flash('success_msg','Post added Successfully');
    return redirect()->route('posts.index');
  }

  public function edit($id){
    $post=Post::with('photos')->find($id);
    // return view('posts.edit',['post' => $post]);
    return response()->json(['post' => $post]);
  }

  public function update($id,Request $request){
    $this->validate($request,[
      'title'=>'required',
      'content'=>'required'
    ]);
    $postData=$request->all();
    Post::find($id)->update($postData);
    Session::flash('success_msg','Post updated Successfully');
    return redirect()->route('posts.index');
  }

  public function delete($id){
    Post::find($id)->delete();
    // Session::flash('success_msg','Post delected successfully');
    // return redirect()->route('posts.index');
  }
}

//app()->bind('postsController',postsController::class);