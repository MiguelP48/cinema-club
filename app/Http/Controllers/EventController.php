<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Event::all(), 200);

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
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'movie_id' => 'required|integer|exists:movies,id'
        ]);

        $event = Event::create($request->all());

        return response()->json(["message" => "Evento creado", "event" => $event], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(["message" => "Evento no encontrado"], 404);
        }

        return response()->json(["event" => $event], 200);
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
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'date' => 'sometimes|date',
            'location' => 'sometimes|string|max:255',
            'movie_id' => 'sometimes|integer|exists:movies,id'
        ]);

        $event = Event::find($id);

        if (!$event) {
            return response()->json(["message" => "Evento no encontrado"], 404);
        }

        $event->update($request->all());

        return response()->json(["message" => "Evento actualizado", "event" => $event], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(["message" => "Evento no encontrado"], 404);
        }

        $event->delete();

        return response()->json(["message" => "Evento eliminado"], 200);

    }
}
