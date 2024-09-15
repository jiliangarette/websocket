<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizQuestionLinkController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\QuizStatusController;
use App\Http\Controllers\QuestionTypeController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MechanicPageController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ParticipantQuizController;
use App\Http\Controllers\ParticipantQuizSummaryController;

// Admin routes
Route::get('/admins', [AdminController::class, 'index']);
Route::get('/admins/{id}', [AdminController::class, 'show']);
Route::post('/admins', [AdminController::class, 'store']);
Route::put('/admins/{id}', [AdminController::class, 'update']);
Route::delete('/admins/{id}', [AdminController::class, 'destroy']);

// Game routes (Quizzes)
Route::get('/quizzes', [QuizController::class, 'index']);
Route::get('/quizzes/{id}', [QuizController::class, 'show']);
Route::post('/quizzes', [QuizController::class, 'store']);
Route::post('/quizzes/{id}/update', [QuizController::class, 'updateQuizData']);
Route::delete('/quizzes/{id}', [QuizController::class, 'destroy']);

// QuizQuestion Routes
Route::get('/quiz-questions', [QuizQuestionController::class, 'index']);
Route::get('/quiz-questions/{id}', [QuizQuestionController::class, 'show']);
Route::post('/quiz-questions', [QuizQuestionController::class, 'store']);
Route::put('/quiz-questions/{id}', [QuizQuestionController::class, 'update']);
Route::delete('/quiz-questions/{id}', [QuizQuestionController::class, 'destroy']);
Route::post('/quiz-questions/with-choices', [QuizQuestionController::class, 'storeQuestionWithChoices']);

// QuestionTypes Routes
Route::get('/question-types', [QuestionTypeController::class, 'index']);
Route::get('/question-types/{id}', [QuestionTypeController::class, 'show']);
Route::post('/question-types', [QuestionTypeController::class, 'store']);
Route::put('/question-types/{id}', [QuestionTypeController::class, 'update']);
Route::delete('/question-types/{id}', [QuestionTypeController::class, 'destroy']);

// Choice Routes
Route::get('/choices', [ChoiceController::class, 'index']);
Route::post('/choices', [ChoiceController::class, 'store']);
Route::put('/choices/{id}', [ChoiceController::class, 'update']);
Route::delete('/choices/{id}', [ChoiceController::class, 'destroy']);
Route::get('/choices/{id}', [ChoiceController::class, 'getChoicesByQuizId']);

// QuizQuestionLink Routes
Route::get('/quiz-question-links', [QuizQuestionLinkController::class, 'index']);
Route::get('/quiz-question-links/{id}', [QuizQuestionLinkController::class, 'show']);
Route::post('/quiz-question-links', [QuizQuestionLinkController::class, 'store']);
Route::put('/quiz-question-links/{id}', [QuizQuestionLinkController::class, 'update']);
Route::delete('/quiz-question-links/{id}', [QuizQuestionLinkController::class, 'destroy']);

// Landing Page routes
Route::get('/landing-pages', [LandingPageController::class, 'index']);
Route::get('/landing-pages/{id}', [LandingPageController::class, 'show']);
Route::post('/landing-pages', [LandingPageController::class, 'store']);
Route::put('/landing-pages/{id}', [LandingPageController::class, 'update']);
Route::delete('/landing-pages/{id}', [LandingPageController::class, 'destroy']);

// Mechanic Page routes
Route::get('/mechanic-pages', [MechanicPageController::class, 'index']);
Route::get('/mechanic-pages/{id}', [MechanicPageController::class, 'show']);
Route::post('/mechanic-pages', [MechanicPageController::class, 'store']);
Route::put('/mechanic-pages/{id}', [MechanicPageController::class, 'update']);
Route::delete('/mechanic-pages/{id}', [MechanicPageController::class, 'destroy']);

// Theme routes
Route::get('/themes', [ThemeController::class, 'index']);
Route::get('/themes/{id}', [ThemeController::class, 'show']);
Route::post('/themes', [ThemeController::class, 'store']);
Route::put('/themes/{id}', [ThemeController::class, 'update']);
Route::delete('/themes/{id}', [ThemeController::class, 'destroy']);

// Quiz Status routes
Route::get('/quiz-status', [QuizStatusController::class, 'index']);
Route::get('/quiz-status/{id}', [QuizStatusController::class, 'show']);
Route::post('/quiz-status', [QuizStatusController::class, 'store']);
Route::put('/quiz-status/{id}', [QuizStatusController::class, 'update']);
Route::delete('/quiz-status/{id}', [QuizStatusController::class, 'destroy']);

// Participant routes
Route::get('/participants', [ParticipantController::class, 'index']);
Route::get('/participants/{id}', [ParticipantController::class, 'show']);
Route::post('/participants', [ParticipantController::class, 'store']);
Route::put('/participants/{id}', [ParticipantController::class, 'update']);
Route::delete('/participants/{id}', [ParticipantController::class, 'destroy']);

// Participant routes
Route::get('/participant-quiz', [ParticipantQuizController::class, 'index']);
Route::get('/participant-quiz/{id}', [ParticipantQuizController::class, 'show']);
Route::post('/participant-quiz', [ParticipantQuizController::class, 'store']);
Route::put('/participant-quiz/{id}', [ParticipantQuizController::class, 'update']);
Route::delete('/participant-quiz/{id}', [ParticipantQuizController::class, 'destroy']);

// Participant routes
Route::get('/participants-summary-quiz', [ParticipantQuizSummaryController::class, 'index']);
Route::get('/participants-summary-quiz/{id}', [ParticipantQuizSummaryController::class, 'show']);
Route::post('/participants-summary-quiz', [ParticipantQuizSummaryController::class, 'store']);
Route::put('/participants-summary-quiz/{id}', [ParticipantQuizSummaryController::class, 'update']);
Route::delete('/participants-summary-quiz/{id}', [ParticipantQuizSummaryController::class, 'destroy']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
