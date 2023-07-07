<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('backpanel.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backpanel.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $posts = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'excerpt' => $request->excerpt,
            'user_id' => 6,
            'category_id' => $request->category_id
        ]);

        return redirect(route('post.index'))->with('success', 'Post Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function trashedPost()
    {


    }

    public function restorePost($post)
    {


    }

    public function forcedeletePost($post)
    {


    }

    public function uploadPhoto(Request $request)
    {

        $original_name = $request->upload->getClientOriginalName();
        $filename_org = pathinfo($original_name, PATHINFO_FILENAME);
        $ext = $request->upload->getClientOriginalExtension();
        $filename = $filename_org . '_' . time() . '.' . $ext;
        $request->upload->move(storage_path('app\public\blog\images'), $filename);
        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset('storage/blog/images/' . $filename);
        $message = "Photo Uploaded";

        $res = "<script>window.parent.CKEditor.tools.callFunction($CKEditorFuncNum,'$url','$message')</script>";
        @header("Content-Type:text/html; charset=utf-8");

        echo $res;
    }
}