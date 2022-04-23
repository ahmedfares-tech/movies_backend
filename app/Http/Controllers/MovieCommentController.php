<?php

namespace App\Http\Controllers;

use App\Models\MovieComment;
use App\Http\Requests\StoreMovieCommentRequest;
use App\Http\Requests\UpdateMovieCommentRequest;

class MovieCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieCommentRequest $request, $movie)
    {
        // return response()->json([auth()->user()]);
        $newComment = MovieComment::create([
            'movie_id' => $movie,
            'user_id' => auth()->user()->id,
            'comment' => json_encode($request->comment)
        ]);
        return response()->json([
            'succuess' => true,
            'message' => 'Nice comment',
            'data' => $newComment
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MovieComment  $movieComment
     * @return \Illuminate\Http\Response
     */
    public function show(MovieComment $movieComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MovieComment  $movieComment
     * @return \Illuminate\Http\Response
     */
    public function edit(MovieComment $movieComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieCommentRequest  $request
     * @param  \App\Models\MovieComment  $movieComment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieCommentRequest $request, MovieComment $movieComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MovieComment  $movieComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovieComment $movieComment)
    {
        $movieComment->delete();
    }
}
