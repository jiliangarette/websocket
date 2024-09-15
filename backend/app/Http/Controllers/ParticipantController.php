<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::all();
        return response()->json($participants);
    }

    public function show($id)
    {
        $participant = Participant::findOrFail($id);
        return response()->json($participant);
    }

    public function store(Request $request)
    {
        $participant = Participant::create($request->all());
        return response()->json($participant, 201);
    }

    public function update(Request $request, $id)
    {
        $participant = Participant::findOrFail($id);
        $participant->update($request->all());
        return response()->json($participant);
    }

    public function destroy($id)
    {
        Participant::destroy($id);
        return response()->json(null, 204);
    }
}
