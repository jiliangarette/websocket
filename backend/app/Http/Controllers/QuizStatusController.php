<?php

namespace App\Http\Controllers;

use App\Models\QuizStatus;
use Illuminate\Http\Request;

class QuizStatusController extends Controller
{
    public function index()
    {
        $statuses = QuizStatus::all();
        return response()->json($statuses);
    }

    public function show($id)
    {
        $status = QuizStatus::findOrFail($id);
        return response()->json($status);
    }

    public function store(Request $request)
    {
        $status = QuizStatus::create($request->all());
        return response()->json($status, 201);
    }

    public function update(Request $request, $id)
    {
        $status = QuizStatus::findOrFail($id);
        $status->update($request->all());
        return response()->json($status);
    }

    public function destroy($id)
    {
        QuizStatus::destroy($id);
        return response()->json(null, 204);
    }
}
