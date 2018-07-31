<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Photo;
use App\Category;
use Auth;
use Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::paginate(2);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::pluck('name','id')->all();

        return view('admin.posts.create',compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
$user = Auth::user();

        $data=$this->validate(request(),[
'title'=>'required',
'category_id'=>'required',
'photo_id'=>'required',
'body'=>'required',

        ]);
if ($file = $request->file('photo_id')) {
    
$name = time().$file->getClientOriginalName();
$file->move('my_images',$name);
$photo = Photo::create(['file'=>$name]);
$data['photo_id']=$photo->id;

}
//$data['user_id']=$user;
//Post::create($data);

//?????????????
$user->posts()->create($data);

return redirect('admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        $category = Category::pluck('name','id')->all();

        return view('admin.posts.edit',compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

$data = $this->validate(request(),[

'title'=>'required',
'category_id'=>'required',
'photo_id'=>'required',
'body'=>'required',

]);

        //
        if ($file = $request->file('photo_id')) {
            $name = time().$file->getClientOriginalName();
            $file->move('my_images',$name);
            $photo = Photo::create(['file'=>$name]);
            $data['photo_id'] = $photo->id;
        }
// $data['user_id']=Auth::user()->id;

        Auth::user()->posts()->whereId($id)->first()->update($data);
      

        return redirect('admin/posts');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post = Post::findOrFail($id);
        unlink(public_path()."/my_images/".$post->photo->file);
        $post->delete();
        Session::flash('deleted_post','the post has been deleted');
        return redirect('admin/posts');
    }


        public function post($id){
        $post = Post::findOrFail($id);
        $comments = $post->comments()->whereIsActive(1)->get();
        

        return view('post',compact('post','comments'));    
    }

    public function allposts(Request $request){

        $posts = Post::paginate(2);

        if ($request->ajax()) {
            $view = view('data',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('posts',compact('posts'));
    }


    
}
