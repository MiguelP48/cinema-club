<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Models\Movie;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::with(['user', 'book'])->get();
        return response()->json($reviews, 200);
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
            'book_id' => 'required|integer|exists:books,id',
            'user_id' => 'required|integer|exists:users,id',
            'comment' => 'required|string',
            'date' => 'sometimes|date'
        ]);

        $review = Review::create($request->all());

        return response()->json(["message" => "Reseña creada", "review" => $review], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $review = Review::with(['user', 'book'])->find($id);

        if (!$review) {
            return response()->json(["message" => "Reseña no encontrada"], 404);
        }

        return response()->json(["review" => $review], 200);
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
        $request->validate([
            'book_id' => 'sometimes|integer|exists:books,id',
            'user_id' => 'sometimes|integer|exists:users,id',
            'comment' => 'sometimes|string',
            'date' => 'sometimes|date'
        ]);

        $review = Review::find($id);

        if (!$review) {
            return response()->json(["message" => "Reseña no encontrada"], 404);
        }

        $review->update($request->all());

        return response()->json(["message" => "Reseña actualizada", "review" => $review], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(["message" => "Reseña no encontrada"], 404);
        }

        $review->delete();

        return response()->json(["message" => "Reseña eliminada"], 200);
    }
}
