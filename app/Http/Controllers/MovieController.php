<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Movie::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'duration' => 'required|integer|min:1',
            'synopsis' => 'required|string',
        ]);

        $movie = Movie::create($request->all());

        return response()->json(["message" => "Película creada", "movie" => $movie], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(["message" => "Pelicula no encontrada"], 404);
        }

        return response()->json(["movie" => $movie], 200);
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
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(["message" => "Película no encontrada"], 404);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'director' => 'sometimes|string|max:255',
            'genre' => 'sometimes|string|max:100',
            'release_year' => 'sometimes|integer|min:1900|max:' . date('Y'),
            'duration' => 'sometimes|integer|min:1',
            'synopsis' => 'sometimes|string',
        ]);

        $movie->update($request->only([
            'title',
            'director',
            'genre',
            'release_year',
            'duration',
            'synopsis'
        ]));

        return response()->json(["message" => "Película actualizada", "movie" => $movie], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(["message" => "Película no encontrada"], 404);
        }

        $movie->delete();

        return response()->json(["message" => "Película eliminada"], 200);
    }
}
