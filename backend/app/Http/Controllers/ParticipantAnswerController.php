<?php

namespace App\Http\Controllers;

use App\Models\ParticipantAnswer;
use Illuminate\Http\Request;

class ParticipantAnswerController extends Controller
{
    public function index()
    {
        $participantAnswers = ParticipantAnswer::all();
        return response()->json($participantAnswers);
    }

    public function show($id)
    {
        $participantAnswer = ParticipantAnswer::findOrFail($id);
        return response()->json($participantAnswer);
    }

    public function store(Request $request)
    {
        $participantAnswer = ParticipantAnswer::create($request->all());
        return response()->json($participantAnswer, 201);
    }

    public function update(Request $request, $id)
    {
        $participantAnswer = ParticipantAnswer::findOrFail($id);
        $participantAnswer->update($request->all());
        return response()->json($participantAnswer);
    }

    public function destroy($id)
    {
        ParticipantAnswer::destroy($id);
        return response()->json(null, 204);
    }
}
