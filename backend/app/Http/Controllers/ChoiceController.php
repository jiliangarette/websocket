<?php

namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Choice;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    public function index()
    {
        $choices = Choice::with('quizQuestion')->get();
        return response()->json($choices);
    }

    public function show($id)
    {
        $choice = Choice::with('quizQuestion')->findOrFail($id);
        return response()->json($choice);
    }

    public function getChoicesByQuizId($id)
    {
        // Retrieve choices related to the quiz
        $choices = Choice::with('quizQuestion.questionType')
            ->whereHas('quizQuestion', function ($query) use ($id) {
                $query->where('id', $id);
            })
            ->get();

        if ($choices->isEmpty()) {
            return response()->json(['message' => 'No choices found for the specified quiz.'], 404);
        }

        return response()->json($choices);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:quiz_questions,id',
            'choice_text' => 'required|string|max:255',
            'choice_image' => 'nullable|string',
            'is_correct' => 'required|boolean',
        ]);

        $choice = Choice::create($validated);
        return response()->json($choice, 201);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'question_id' => 'required|exists:quiz_questions,id',
            'choice_text' => 'required|string|max:255',
            'choice_image' => 'nullable|string',
            'is_correct' => 'required|boolean',
        ]);

        $choice = Choice::findOrFail($id);
        $choice->update($validated);
        return response()->json($choice);
    }

    public function destroy($id)
    {
        Choice::destroy($id);
        return response()->json(null, 204);
    }
}