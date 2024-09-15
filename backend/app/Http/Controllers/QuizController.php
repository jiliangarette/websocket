<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Enums\QuizStatuses;
use Illuminate\Http\Request;
use App\Models\LandingPage;
use App\Models\MechanicPage;
use App\Models\MechanicInstruction;
use App\Models\MechanicPageInstruction;
use App\Models\Theme;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('quizStatus', 'theme', 'landingPage', 'mechanicPage', 'admin')

            ->get()
            ->map(function ($quiz) {
                $quiz->thumbnailUrl = $quiz->thumbnail ? asset('storage/' . $quiz->thumbnail) : null;

                $quiz->landingImageUrl = $quiz->landingImage ? asset('storage/' . $quiz->landingImage) : null;
                return $quiz;
            });

        return response()->json($quizzes);

    }

    public function show($id)
    {
        $quiz = Quiz::with('quizStatus', 'theme', 'landingPage', 'mechanicPage', 'admin')->findOrFail($id);

         $quiz->thumbnailUrl = $quiz->thumbnail ? asset('storage/' . $quiz->thumbnail) :  null;

         $quiz->landingImageUrl = $quiz->landingImage ? asset('storage/' . $quiz->landingImage) :  null;

         $quiz->landingBackgroundImageUrl = $quiz->landingImage ? asset('storage/' . $quiz->landingImage) :  null;

        return response()->json($quiz);
    }

public function store(Request $request)
{
    // Validate incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'selectedTheme' => 'required|exists:themes,id',
        'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',

        'landingHeader' => 'required|string|max:255',
        'landingSubheader' => 'required|string|max:255',
        'landingButtonText' => 'required|string|max:255',
        'landingImage' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        'landingBackgroundImage' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',

            'mechanicsHeader' => 'required|string|max:255',
            'mechanicsButtonText' => 'required|string|max:255',
            'mechanicsInstruction' => 'required|array',
            'mechanicsInstruction.*' => 'required|string|max:1000',
        ]);

        if ($request->hasFile('thumbnail')) {
            $imagePath = $request->file('thumbnail')->store('thumbnails', 'public');
        } else {
            return response()->json(['error' => 'Image is required', 400]);
        }

        $defaultStatus = QuizStatuses::Unpublished;
        $quizStatusId = $request->input('quiz_status_id', $defaultStatus);
        $quizStatusId = $quizStatusId ?: null;

        DB::beginTransaction();

        try {


       

        // landing page create
        $landingImagePath = $request->hasFile('landingImage') ? $request->file('landingImage')->store('public/landing_page_images') : null;

        $landingBackgroundImagePath = $request->hasFile('landingBackgroundImage') ? $request->file('landingBackgroundImage')->store('public/landing_background_images') : null;

        $landingPage = LandingPage::create([
            'header' => $validatedData['landingHeader'],
            'sub_header' => $validatedData['landingSubheader'],
            'button_text' => $validatedData['landingButtonText'],
            'landing_page_image' => $landingImagePath,
            'background_image' => $landingBackgroundImagePath,
            
        ]);

            $landing_id = $landingPage->id;


        $mechanicPage = MechanicPage::create([
            'header' => $validatedData['mechanicsHeader'],
            'button_text' => $validatedData['mechanicsButtonText'],
        ]);

            $mechanic_id = $mechanicPage->id;

            $instructionIds = [];

            foreach ($validatedData['mechanicsInstruction'] as $mechanicInstruction) {
                $mechanicInstruction = MechanicInstruction::create([
                    'instruction' => $mechanicInstruction,
                ]);

                $instructionIds[] = $mechanicInstruction->id;
            }

            foreach ($instructionIds as $instructionId) {
                MechanicPageInstruction::create([
                    'mechanic_page_id' => $mechanic_id,
                    'instruction_id' => $instructionId,
                ]);
            }

        // $themeId = DB::table('themes')->pluck('id')->first();
        $adminId = DB::table('admins')->pluck('id')->first();


        $quiz = Quiz::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'thumbnail' => $imagePath,
            'quiz_status_id' => $quizStatusId,
            'theme_id' => $validatedData['selectedTheme'],
            'landing_page_id' => $landing_id,
            'mechanic_page_id' => $mechanic_id,
            'admin_id' => $adminId,
        ]);
        DB::commit();

            return response()->json($quiz, 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function updateQuizData(Request $request, $id)
    {
        // Check if request has no input
        if ($request->all() === []) {
            return response()->json([
                'success' => false,
                'message' => 'No data received for update.',
            ], 400); // 400 Bad Request
        }
    

    
        // Example validation for expected fields
        $validatedData = $request->validate([
            'name' => 'sometimes|nullable|string|max:255',
            'name' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string',
            'themeId' => 'sometimes|nullable|integer',
            'themeId' => 'sometimes|nullable|integer',
            'thumbnail' => 'sometimes|nullable|file|mimes:jpg,jpeg,png,gif|max:2048',
            'mechanicId' => 'sometimes|nullable|integer',
            'mechanicHeader' => 'sometimes|nullable|string|max:255',
            'instructions' => 'sometimes|array', // Validate that instructions are sent as an array
            'instructions.*' => 'string|max:255', // Each instruction should be a string    
            'newInstructions' => 'sometimes|array', // Validate new instructions as well
            'newInstructions.*' => 'string|max:255', // Each new instruction should be a string
        ]);

        // return response()->json(['data' => $validatedData]);

        $quiz = Quiz::findOrFail($id);
        $mechanicPage = MechanicPage::find($validatedData['mechanicId']);
        $instructions = $mechanicPage->mechanicInstructions;
        $mechanicPage = MechanicPage::find($validatedData['mechanicId']);
        $instructions = $mechanicPage->mechanicInstructions;

        if (isset($validatedData['name'])) {
          $quiz->name = $validatedData['name'];
      }

      if (isset($validatedData['description'])) {
          $quiz->description = $validatedData['description'];
      }

      if (isset($validatedData['themeId'])) {
          $quiz->theme_id = $validatedData['themeId'];
      }

      if (isset($validatedData['thumbnail'])) {
        // Store the thumbnail and get its path
        $path = $validatedData['thumbnail']->store('thumbnails', 'public');
    
        // Update the quiz's thumbnail field with the new path
        $quiz->thumbnail = $path;
    }
    if (isset($validatedData['mechanicHeader'])) {
        $mechanicPage->header = $validatedData['mechanicHeader'];
    }

   // Update instructions if they are present in the request
   if (isset($validatedData['instructions'])) {
    foreach ($validatedData['instructions'] as $instructionId => $instruction) {
        // Find the corresponding MechanicPageInstruction by instruction ID
        $mechanicPageInstruction = MechanicPageInstruction::where('instruction_id', $instructionId)->first();
        
        // Check if the instruction exists
        if ($mechanicPageInstruction) {
            // Find the corresponding MechanicInstruction
            $mechanicInstruction = $mechanicPageInstruction->mechanicInstruction;
            if ($mechanicInstruction) {
                // Update the instruction text
                $mechanicInstruction->instruction = $instruction;
                $mechanicInstruction->save(); // Save changes to MechanicInstruction
            }
        }
    }
}

   // Handle new instructions
   if (isset($validatedData['newInstructions'])) {
    foreach ($validatedData['newInstructions'] as $newInstruction) {
        // Create a new MechanicInstruction
        $mechanicInstruction = new MechanicInstruction();
        $mechanicInstruction->instruction = $newInstruction;
        $mechanicInstruction->save(); // Save the new instruction

        // Associate the new instruction with the current mechanic page
        // Create a new MechanicPageInstruction
        $mechanicPageInstruction = new MechanicPageInstruction();
        $mechanicPageInstruction->mechanic_page_id = $mechanicPage->id; // Associate with the current mechanic page
        $mechanicPageInstruction->instruction_id = $mechanicInstruction->id; // Associate with the new instruction
        $mechanicPageInstruction->save(); // Save the new mechanic page instruction
    }
}


      $quiz->save(); // Save all changes
      $mechanicPage->save(); // Save all changes
      $mechanicPage->save(); // Save all changes
    

    
        return response()->json([
            'success' => true,
            'message' => 'Quiz updated successfully.',
            'data' => $request->all(), // Return updated data or necessary response
        ]);
    }
    

    public function destroy($id)
    {
        Quiz::destroy($id);
        return response()->json(null, 204);
    }
}
