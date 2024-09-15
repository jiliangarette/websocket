<?php

namespace App\Http\Controllers;

use App\Models\ParticipantQuizSummary;
use Illuminate\Http\Request;

class ParticipantQuizSummaryController extends Controller
{
public function index()
{

    $summaries = ParticipantQuizSummary::with(['participant', 'quiz'])->get();


    $transformedSummaries = $summaries->map(function ($summary) {
        return [
            'id' => $summary->id,
            'participant' => $summary->participant->full_name,
            'quiz' => $summary->quiz->name,
            'score' => $summary->score,
            'completed_at' => $summary->completed_at,
        ];
    });

    return response()->json($transformedSummaries);
}


    public function show($id)
    {
        $summary = ParticipantQuizSummary::findOrFail($id);
        return response()->json($summary);
    }

    public function store(Request $request)
    {
        $summary = ParticipantQuizSummary::create($request->all());
        return response()->json($summary, 201);
    }

    public function update(Request $request, $id)
    {
        $summary = ParticipantQuizSummary::findOrFail($id);
        $summary->update($request->all());
        return response()->json($summary);
    }

    public function destroy($id)
    {
        ParticipantQuizSummary::destroy($id);
        return response()->json(null, 204);
    }
}
