<?php

namespace App\Http\Controllers;

use App\Models\MechanicPage;
use Illuminate\Http\Request;

class MechanicPageController extends Controller
{
    public function index()
    {
        $mechanicPages = MechanicPage::all();
        return response()->json($mechanicPages);
    }

    public function show($id)
    {
        $mechanicPage = MechanicPage::with(['mechanicPageInstructions.mechanicInstruction'])-> findOrFail($id);
        return response()->json($mechanicPage);
    }

    public function store(Request $request)
    {
        $mechanicPage = MechanicPage::create($request->all());
        return response()->json($mechanicPage, 201);
    }

    public function update(Request $request, $id)
    {
        $mechanicPage = MechanicPage::findOrFail($id);
        $mechanicPage->update($request->all());
        return response()->json($mechanicPage);
    }

    public function destroy($id)
    {
        MechanicPage::destroy($id);
        return response()->json(null, 204);
    }
}
