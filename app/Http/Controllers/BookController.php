<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Book::all(), 200);
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
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $book = Book::create($request->all());

        return response()->json(["message" => "Libro creado", "book" => $book], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(["message" => "Libro no encontrado"], 404);
        }

        return response()->json(["book" => $book], 200);
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
        $book = Book::find($id);

        if (!$book) {
            return response()->json(["message" => "Libro no encontrado"], 404);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'author' => 'sometimes|string|max:255',
            'genre' => 'sometimes|string|max:100',
            'release_year' => 'sometimes|integer|min:1900|max:' . date('Y')
        ]);

        $book->update($request->only([
            'title',
            'author',
            'genre',
            'release_year'
        ]));

        return response()->json(["message" => "Libro actualizado", "book" => $book], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(["message" => "Libro no encontrado"], 404);
        }

        $book->delete();

        return response()->json(["message" => "Libro eliminado"], 200);
    }
}
