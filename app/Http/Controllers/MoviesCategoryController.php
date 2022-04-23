<?php

namespace App\Http\Controllers;

use App\Models\MoviesCategory;
use App\Http\Requests\StoreMoviesCategoryRequest;
use App\Http\Requests\UpdateMoviesCategoryRequest;

class MoviesCategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreMoviesCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMoviesCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MoviesCategory  $moviesCategory
     * @return \Illuminate\Http\Response
     */
    public function show(MoviesCategory $moviesCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MoviesCategory  $moviesCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(MoviesCategory $moviesCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMoviesCategoryRequest  $request
     * @param  \App\Models\MoviesCategory  $moviesCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMoviesCategoryRequest $request, MoviesCategory $moviesCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MoviesCategory  $moviesCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MoviesCategory $moviesCategory)
    {
        //
    }
}
