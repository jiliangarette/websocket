<?php

namespace App\Http\Controllers;

use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    public function index(Request $request)
    {
        $quizId = $request->query('quiz_id');

        if ($quizId) {
            $questions = QuizQuestion::whereHas('quizLinks', function ($query) use ($quizId) {
                $query->where('quiz_id', $quizId);
            })->get();
        } else {
            $questions = QuizQuestion::all();
        }

        return response()->json($questions);
    }

    public function show($id)
    {
        $question = QuizQuestion::with('questionType')->findOrFail($id);
        return response()->json($question);
    }

    public function store(Request $request)
    {
        $question = QuizQuestion::create($request->all());
        return response()->json($question, 201);
    }

    public function storeQuestionWithChoices(Request $request)
    {
        $validated = $request->validate([
            'question_type_id' => 'required|exists:question_types,id',
            'question_text' => 'required|string',
            'question_image' => 'nullable|string',
            'choices' => 'required|array|min:2', // Ensure at least two choices
            'choices.*.choice_text' => 'required|string|max:255',
            'choices.*.choice_image' => 'nullable|string',
            'choices.*.is_correct' => 'required|boolean',
        ]);

        // Create the question
        $question = QuizQuestion::create([
            'question_type_id' => $validated['question_type_id'],
            'question_text' => $validated['question_text'],
            'question_image' => $validated['question_image'] ?? null,
        ]);

        // Create choices associated with the question
        foreach ($validated['choices'] as $choice) {
            $question->choices()->create($choice);
        }

        return response()->json($question->load('choices'), 201); // Return the question with its choices
    }

    public function update(Request $request, $id)
    {
        $question = QuizQuestion::findOrFail($id);
        $question->update($request->all());
        return response()->json($question);
    }

    public function destroy($id)
    {
        QuizQuestion::destroy($id);
        return response()->json(null, 204);
    }
}