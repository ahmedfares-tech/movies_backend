<?php

namespace App\Http\Controllers;

use App\Http\Controllers\helper\UploadController;
use App\Models\Movie;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\MoviesCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(UpdateMovieRequest $request)
    {
        // return response()->json($request->validated());


        $movie = Movie::create($request->safe()->except(['poster', 'movie', 'category']));
        $uploadPoster = UploadController::upload($request, 'posters');
        $uploadMovie = UploadController::uploadMovie($request, 'movies');
        $movie->update([
            'poster' => $uploadPoster['url'],
            'video' => $uploadMovie['url'],
        ]);
        foreach ($request->categories as $key => $cat) {

            MoviesCategory::create([
                'movie_id' => $movie->id,
                'category_id' => $cat['id']
            ]);
        }
        return response()->json([
            'succuess' => true,
            'message' => 'Retived All Movies',
            'data' => $movie
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ?? 20;

        $movies = Movie::orderBy('id', 'desc')->with('category.category');

        if ($request->name) $movies->where('name', 'LIKE', '%' . $request->name . '%');
        if ($request->category > 0) {
            $movies->whereHas('category', function ($query) use ($request) {
                $query->where('category_id', $request->category);
            });
        }
        return response()->json([
            'succuess' => true,
            'message' => 'Retived All Movies',
            'data' => $movies->paginate($limit)
        ]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        $movie->load(['category.category', 'comments.user']);
        return response()->json([
            'succuess' => true,
            'message' => 'Retived Movie',
            'data' => $movie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
