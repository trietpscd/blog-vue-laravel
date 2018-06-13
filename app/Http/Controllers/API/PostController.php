<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('created_at', 'desc')->get();

        if ($posts) {
            return response()->json([
                'status' => 'success',
                'result' => $posts
            ],200);
        } else {
            return response()->json([
                'status' => 'error',
                'msg' => 'data not found!'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string',
            'body' => 'required|string',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'error' => $validator->errors()->toArray()
            ]);
        }else{
            $post = new Post;
            $post->title = $request['title'];
            $post->body = $request['body'];
            $post->save();
            return response()->json([
                'status' => 'success',
                'result' => $post
               ], 200);
        }

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
        $post = Post::find($id);
        if ($post) {
            return response()->json([
                'status' => 'success',
                'result' => $post
            ],200);
        } else {
            return response()->json([
                'status' => 'error',
                'msg' => 'data not found!'
            ]);
        }
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
        //
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
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return response()->json([
                'status' => 'success',
                'msg' => 'Delete successfuly'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'msg' => 'Data not found!'
            ]);
        }
        
    }
}
