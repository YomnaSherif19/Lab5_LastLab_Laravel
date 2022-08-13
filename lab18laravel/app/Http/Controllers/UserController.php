<?php
namespace App\HTTP\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\HTTP\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {//$user=User::all();
        //$post=Post::all();
        //$users = User::withCount(['posts'])->get();
        $users=User::withCount('posts')->paginate(15);
       return view('users.index', compact('users'));
       
    //    // $posts=Post::find($id);
    //     // foreach($posts as $post){
    //     //       echo $post->posts_count;
    //     // }
    //     return view('users.index',['users'=>$users]);
        //return $users;
    }
    
    public function create()
    {
        return view('users.create'); 
    }

    public function store(Request $request )
    {
        dd($request->all());
        //$users=User::create($request->all());
        $users=new User;
        $users->name=$request->input('name');
        $users->email=$request->input('email');
        $users->password=$request->input('password');
        $users->save();
        $users->fill(['name','email','password']);
        //$id=Auth::id();
      //return"data stored";
       return redirect()->route('users.index');
    }

//    public function show(User $user)
//     { 
//        // $users=User::all();
//         // $user= User::find($id);
//         // $post= Post::find($id);

//         return view('users.show',compact('user'));//->with(['user'=>$user,'post'=>$post]);
   
//     }
     //used
    public function show($id)
    {   $users=User::all();
        $posts=Post::all();
        //return view('users.show')>with(['users'=>$users]);
        return  User::find($id).Post::find($id);
       // return Post::find($id);
    // return redirect('users.show', compact('user'));
    }
   

    public function edit($id)
    {
    
        $users=User::find($id);
      return view('users.edit')->with(['users'=>$users]);

    }

    public function update(Request $request ,$id)
    {
        $users=User::find($id);
        $users->name=$request->input('name');
        $users->email=$request->input('email');
        $users->password=$request->input('password');
        $users->update();
        return redirect()->route('users.index');  
    }


    public function destroy($id)
    {
        //return "id deleted".$id;
        $users=User::find($id);
        $users->delete();
        return redirect()->route('users.index');
    }
    // function flush(Request $request){
    //     $r=$request->session()->flush();
    //     return redirect('users.login');
    // }
}
