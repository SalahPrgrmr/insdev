<?php

namespace App\Http\Controllers\Api\V1;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // All Posts
   $posts = Post::all();

   // Return Json Response
   return response()->json([
      'posts' => $posts
   ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        try {
    
            // Create Post
            Post::create([
                'website_id' => $request->website_id,
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->user_id

            ]);
    
            // Return Json Response
            return response()->json(['message' => "Post successfully created."],200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
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
         // Post Detail 
   $post = Post::find($id);
   if(!$post){
     return response()->json([
        'message'=>'Post Not Found.'
     ],404);
   }

   // Return Json Response
   return response()->json([
      'post' => $post
   ],200);
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
        try {
            $post = Post::where('deleted_at', null)->findOrFail($id);
            $post->deleted_at = now();
            $post->save();
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_NOT_FOUND);
        }

    }
}
