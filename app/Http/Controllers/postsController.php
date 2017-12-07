<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Photos;
use App\Post;
use File;
use Illuminate\Http\Request;
use Session;

class postsController extends Controller
{
    public function index()
    {
        // $posts = Post::with('photos')->orderBy('created_at','desc')->limit(4)->get();
        $posts = Post::with('photos')->get();
        $announcements = Announcement::orderBy('created_at', 'desc')->get();
        $photos = Photos::orderBy('id', 'desc')->get();
        // return view('index',['posts'=> $posts ,'photos' => $photos,'announcements' => $announcements]);
        return response()->json(['posts' => $posts, 'photos' => $photos, 'announcements' => $announcements], 200);
    }

    public function details($id)
    {
        $post = Post::with('photos')->find($id);
        // return view('posts.details',['post' => $post]);
        return response()->json(['post' => $post]);
    }

    public function insert(Request $request)
    {
        $this->validate($request, $this->rules($request));
        $postData = $request->except('img');
        $post = Post::create($postData);
        if($request->has('img')){
            $this->uploadImage($request,$post,'uploads');
        }
        Session::flash('success_msg', 'Post added Successfully');
        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::with('photos')->find($id);
        // return view('posts.edit',['post' => $post]);
        return response()->json(['post' => $post]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,$this->rules($request));
        $postData = $request->except('img');
        $post = Post::find($id);
        $post->update($postData);
        $this->uploadImage($request,$post,'uploads');
        Session::flash('success_msg', 'Post updated Successfully');
        return redirect()->route('posts.index');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $this->deletePhoto($post);
        $post->delete();
//         Session::flash('success_msg','Post delected successfully');
        // return redirect()->route('posts.index');
    }

    public function rules(Request $request)
    {
        $rules = [
            'title' => 'required|string', 'content' => 'required|string', 'publisher' => 'required|string',
            'img'   => 'required'

        ];
        $photos = count($request->img);
        foreach (range(0, $photos) as $index) {
            $rules[ 'img[].' . $index ] = 'image|mimes:jpeg,bmp,png|max:2000';
        }

        return $rules;
    }

    protected function uploadImage(Request $request, $model, $path)
    {
//        $count = count($request->img);
        foreach ($request->img as $index => $image){
            if($request->check[$index] == 'on'){
                $forShow = true;
            }else{
                $forShow = false;
            }
        $imageName = $image->getClientOriginalName();
        $image->move(public_path($path), $imageName);

//        $model->update(['img_dir' => $imageName , 'name' => $imageName]);
            $photos = new Photos(['img_dir' => $imageName , 'name' => $imageName,'forshow' => $forShow]);
            $model->photos()->save($photos);
        }
    }

    private function deletePhoto($model){
        $photos = $model->photos()->get();
        foreach ($photos as $photo){
            File::delete(public_path('uploads').'/'.$photo->img_dir);
        }
    }


}

//app()->bind('postsController',postsController::class);
