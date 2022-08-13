<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeBlogPost as RequestsStoreBlogPost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Requests\storeBlogPost;
use Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function index()
    
    {
        $user=User::first();
        $posts=Post::paginate(15);
       
        //$posts=Post::all();
        //$user=Auth::user();
        //$posts=Post::withoutTrashed()->paginate(15);
        // $posts=Post::with(relations:'user')
        // ->when($request->has(key:'archive'),function($query){
        //     $query->onlyTrashed();
        // }
        // )
        // ->get();
       // return view('posts.index',compact('posts'));
       return view('posts.index',compact('posts','user'));
       // return view('users.index',['users'=>$users]);
       
    }

    public function create()
    {
        return view('posts.create');
        //return redirect()->route('users.index');
    }
//used
    // public function store(Request $request )
    // {
    //     dd($request->all());
    //   //$users=User::create($request->only());
    //   $user=Auth::user();
    //     $posts=new Post();
    //     $posts->title=$request->input('title');
    //     $posts->body=$request->input('body');
    //     $validatedData=$request->validate();
    //     $posts->save();
        
    //    // $posts->fill(['title','body']);
    //    // $user=Auth::user();
    //   //return"data stored";
    //    return redirect()->route('posts.index');
    // }



public function store(Request $request ,RequestsStoreBlogPost $requestt)
{
    $validatedData=$requestt->validated();
    $user=Auth::user();
    $post=$request->only(['title','body']);
    if($request->file('image')->isValid())
    {
      $post['image']=$request->file('image')->store('posts','images');
    }
    $created=$user->posts()->create($post);
    if($created)
    {
       return redirect()->route('posts.index')->with('successMsg','post created');
    }
    return redirect()->route('posts.index')->with('failMsg','post creation failed');
}

public function show(Post $post)
{
    
    return view('posts.show',compact('post'));
}
    public function edit($id)
    {
        $user=Auth::user();
        $posts=Post::find($id);
        return view('posts.edit')->with(['posts'=>$posts]);

    }

    public function update(Request $request ,$id,RequestsStoreBlogPost $requestt)
    { $validatedData=$requestt->validated();
        $user=Auth::user();
        $posts=Post::find($id);
        $posts->title=$request->input('title');
        $posts->body=$request->input('body');
        if ($user->id === $posts->user_id){
        $posts->update();
        return redirect()->route('posts.index')->with('successMsg','post created');}
    }

    public function destroy($id)
    {
        $posts=Post::find($id);
        $posts->delete();
        return redirect()->route('posts.index');
    }

    public function restore(Request $request ,$id)
    {
     Post::onlyTrashed()->find($id)->restore();
     return redirect()->route('users.index');
    }
    

// //used
//     public function show($id)
//     { 
//         $posts=Post::all();
//         $users=User::all();
//         return Post::find($id).User::find($id);
//         //return view('users.show')>with(['users'=>$users]);
//         // return redirect('users.show', compact('user'));
//     }

    // public function show($id)
    // { 
    //     $user= User::find($id);
    //     $post= Post::find($id);

    //     return view('users.show')->with(['post'=>$post,'user'=>$user]);
    
    //    // $posts=Post::all();
    //     //return view('posts.show')>with(['posts'=>$posts]);
    //    // return Post::find($id);;
    // // return redirect('users.show', compact('user'));
    // }

    

}
