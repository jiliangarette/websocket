<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $landingPages = LandingPage::all();
        return response()->json($landingPages);
    }

    public function show($id)
    {
        $landingPage = LandingPage::findOrFail($id);
        return response()->json($landingPage);
    }

    public function store(Request $request)
    {
        $landingPage = LandingPage::create($request->all());
        return response()->json($landingPage, 201);
    }

    public function update(Request $request, $id)
    {
        $landingPage = LandingPage::findOrFail($id);
        $landingPage->update($request->all());
        return response()->json($landingPage);
    }

    public function destroy($id)
    {
        LandingPage::destroy($id);
        return response()->json(null, 204);
    }
}
