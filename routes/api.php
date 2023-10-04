<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\MusicModelController;
use App\Http\Controllers\DrawingModelController;
use App\Http\Controllers\DanceModelController;
use App\Http\Controllers\EveronmentModelController;
use App\Http\Controllers\FoodModelController;
use App\Http\Controllers\BasketballModelController;
use App\Http\Controllers\VolleyballModelController;
use App\Http\Controllers\FootballModelController;
use App\Http\Controllers\PeopleModelController;
use App\Http\Controllers\StudyModelController;
use App\Http\Controllers\VisitorModelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactModelController;
use App\Http\Controllers\SoundModelController;
use App\Http\Controllers\TeacModelControllerController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Authentications
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::post('/logout',[UserController::class,'logout']);
//Account
Route::get('/user',[UserController::class,'user']);
Route::get('/user/edit/{id}',[UserController::class,'user_edit']);
Route::post('/user/update/{id}',[UserController::class,'user_update']);
Route::post('/user/delete_user/{id}',[UserController::class,'user_delete']);
Route::get('/user/account',[UserController::class,'account']);
Route::post('/user/account/update/{id}',[UserController::class,'update_account']);
Route::post('/user/account/update/password/{id}',[UserController::class,'update_password']);


// Data And Infomation
Route::get('/information/getAll',[InformationController::class,'getAll']);
Route::post('/information/add',[InformationController::class,'addInfor']);
Route::post('/information/update/{id}',[InformationController::class,'updateInfor']);

// Activety
Route::post('/active/add',[ImageController::class,'create']);
Route::get('/active/getAll',[ImageController::class,'index']);
Route::get('/active/edit/{id}',[ImageController::class,'edit']);
Route::post('/active/update/{id}',[ImageController::class,'update']);
Route::post('/active/EditSelectedItems',[ImageController::class,'EditSelectedItems']);
Route::post('/active/deleteSelectedItems',[ImageController::class,'destroy']);
Route::post('/active/update/content/{id}',[ImageController::class,'updateContent']);

// Music
Route::post('/music/add',[MusicModelController::class,'create']);
Route::get('/music/getAll',[MusicModelController::class,'index']);
Route::get('/music/edit/{id}',[MusicModelController::class,'edit']);
Route::post('/music/update/{id}',[MusicModelController::class,'update']);
Route::post('/music/update/content/{id}',[MusicModelController::class,'updateContent']);
Route::post('/music/update/logo/{id}',[MusicModelController::class,'updatelogo']);
Route::post('/music/EditSelectedItems',[MusicModelController::class,'EditSelectedItems']);
Route::post('/music/deleteSelectedItems',[MusicModelController::class,'destroy']);


// Drawing
Route::post('/draw/add',[DrawingModelController::class,'create']);
Route::get('/draw/getAll',[DrawingModelController::class,'index']);
Route::get('/draw/edit/{id}',[DrawingModelController::class,'edit']);
Route::post('/draw/update/{id}',[DrawingModelController::class,'update']);
Route::post('/draw/update/content/{id}',[DrawingModelController::class,'updateContent']);
Route::post('/draw/update/logo/{id}',[DrawingModelController::class,'updatelogo']);
Route::post('/draw/EditSelectedItems',[DrawingModelController::class,'EditSelectedItems']);
Route::post('/draw/deleteSelectedItems',[DrawingModelController::class,'destroy']);
// Dance
Route::post('/dance/add',[DanceModelController::class,'create']);
Route::get('/dance/getAll',[DanceModelController::class,'index']);
Route::get('/dance/edit/{id}',[DanceModelController::class,'edit']);
Route::post('/dance/update/{id}',[DanceModelController::class,'update']);
Route::post('/dance/update/content/{id}',[DanceModelController::class,'updateContent']);
Route::post('/dance/update/logo/{id}',[DanceModelController::class,'updatelogo']);
Route::post('/dance/EditSelectedItems',[DanceModelController::class,'EditSelectedItems']);
Route::post('/dance/deleteSelectedItems',[DanceModelController::class,'destroy']);
// everonment
Route::post('/everonment/add',[EveronmentModelController::class,'create']);
Route::get('/everonment/getAll',[EveronmentModelController::class,'index']);
Route::get('/everonment/edit/{id}',[EveronmentModelController::class,'edit']);
Route::post('/everonment/update/{id}',[EveronmentModelController::class,'update']);
Route::post('/everonment/update/content/{id}',[EveronmentModelController::class,'updateContent']);
Route::post('/everonment/update/logo/{id}',[EveronmentModelController::class,'updatelogo']);
Route::post('/everonment/EditSelectedItems',[EveronmentModelController::class,'EditSelectedItems']);
Route::post('/everonment/deleteSelectedItems',[EveronmentModelController::class,'destroy']);

// Food
Route::post('/food/add',[FoodModelController::class,'create']);
Route::get('/food/getAll',[FoodModelController::class,'index']);
Route::get('/food/edit/{id}',[FoodModelController::class,'edit']);
Route::post('/food/update/{id}',[FoodModelController::class,'update']);
Route::post('/food/update/content/{id}',[FoodModelController::class,'updateContent']);
Route::post('/food/update/logo/{id}',[FoodModelController::class,'updatelogo']);
Route::post('/food/EditSelectedItems',[FoodModelController::class,'EditSelectedItems']);
Route::post('/food/deleteSelectedItems',[FoodModelController::class,'destroy']);
// Basketball
Route::post('/basketball/add',[BasketballModelController::class,'create']);
Route::get('/basketball/getAll',[BasketballModelController::class,'index']);
Route::get('/basketball/edit/{id}',[BasketballModelController::class,'edit']);
Route::post('/basketball/update/{id}',[BasketballModelController::class,'update']);
Route::post('/basketball/update/content/{id}',[BasketballModelController::class,'updateContent']);
Route::post('/basketball/update/logo/{id}',[BasketballModelController::class,'updatelogo']);
Route::post('/basketball/EditSelectedItems',[BasketballModelController::class,'EditSelectedItems']);
Route::post('/basketball/deleteSelectedItems',[BasketballModelController::class,'destroy']);
// Volleyball
Route::post('/volleyball/add',[VolleyballModelController::class,'create']);
Route::get('/volleyball/getAll',[VolleyballModelController::class,'index']);
Route::get('/volleyball/edit/{id}',[VolleyballModelController::class,'edit']);
Route::post('/volleyball/update/{id}',[VolleyballModelController::class,'update']);
Route::post('/volleyball/update/content/{id}',[VolleyballModelController::class,'updateContent']);
Route::post('/volleyball/update/logo/{id}',[VolleyballModelController::class,'updatelogo']);
Route::post('/volleyball/EditSelectedItems',[VolleyballModelController::class,'EditSelectedItems']);
Route::post('/volleyball/deleteSelectedItems',[VolleyballModelController::class,'destroy']);
// Football
Route::post('/football/add',[FootballModelController::class,'create']);
Route::get('/football/getAll',[FootballModelController::class,'index']);
Route::get('/football/edit/{id}',[FootballModelController::class,'edit']);
Route::post('/football/update/{id}',[FootballModelController::class,'update']);
Route::post('/football/update/content/{id}',[FootballModelController::class,'updateContent']);
Route::post('/football/update/logo/{id}',[FootballModelController::class,'updatelogo']);
Route::post('/football/EditSelectedItems',[FootballModelController::class,'EditSelectedItems']);
Route::post('/football/deleteSelectedItems',[FootballModelController::class,'destroy']);
// teach
Route::post('/teach/add',[TeacModelControllerController::class,'create']);
Route::get('/teach/getAll',[TeacModelControllerController::class,'index']);
Route::get('/teach/edit/{id}',[TeacModelControllerController::class,'edit']);
Route::post('/teach/update/{id}',[TeacModelControllerController::class,'update']);
Route::post('/teach/update/content/{id}',[TeacModelControllerController::class,'updateContent']);
Route::post('/teach/update/logo/{id}',[TeacModelControllerController::class,'updatelogo']);
Route::post('/teach/EditSelectedItems',[TeacModelControllerController::class,'EditSelectedItems']);
Route::post('/teach/deleteSelectedItems',[TeacModelControllerController::class,'destroy']);
// People
Route::post('/people/add',[PeopleModelController::class,'create']);
Route::get('/people/getAll',[PeopleModelController::class,'index']);
Route::get('/people/edit/{id}',[PeopleModelController::class,'edit']);
Route::post('/people/update/{id}',[PeopleModelController::class,'update']);
Route::post('/people/update/content/{id}',[PeopleModelController::class,'updateContent']);
Route::post('/people/EditSelectedItems',[PeopleModelController::class,'EditSelectedItems']);
Route::post('/people/deleteSelectedItems',[PeopleModelController::class,'destroy']);
// Study
Route::post('/study/add',[StudyModelController::class,'create']);
Route::get('/study/getAll',[StudyModelController::class,'index']);
Route::get('/study/edit/{id}',[StudyModelController::class,'edit']);
Route::post('/study/update/{id}',[StudyModelController::class,'update']);
Route::post('/study/update/content/{id}',[StudyModelController::class,'updateContent']);
Route::post('/study/EditSelectedItems',[StudyModelController::class,'EditSelectedItems']);
Route::post('/study/deleteSelectedItems',[StudyModelController::class,'destroy']);
// Visitor
Route::post('/visitor/add',[VisitorModelController::class,'create']);
Route::get('/visitor/getAll',[VisitorModelController::class,'index']);
Route::get('/visitor/edit/{id}',[VisitorModelController::class,'edit']);
Route::post('/visitor/update/{id}',[VisitorModelController::class,'update']);
Route::post('/visitor/update/content/{id}',[VisitorModelController::class,'updateContent']);
Route::post('/visitor/EditSelectedItems',[VisitorModelController::class,'EditSelectedItems']);
Route::post('/visitor/deleteSelectedItems',[VisitorModelController::class,'destroy']);
// Sound
Route::post('/sound/add',[SoundModelController::class,'create']);
Route::get('/sound/getAll',[SoundModelController::class,'index']);
Route::get('/sound/edit/{id}',[SoundModelController::class,'edit']);
Route::post('/sound/update/{id}',[SoundModelController::class,'update']);
Route::post('/sound/update/content/{id}',[SoundModelController::class,'updateContent']);
Route::post('/sound/update/logo/{id}',[SoundModelController::class,'updatelogo']);
Route::post('/sound/EditSelectedItems',[SoundModelController::class,'EditSelectedItems']);
Route::post('/sound/deleteSelectedItems',[SoundModelController::class,'destroy']);
// Contract
Route::get('/contact',[ContactModelController::class,'index']);
Route::post('/contact/add',[ContactModelController::class,'create']);
Route::get('/contact/edit/{id}',[ContactModelController::class,'edit']);
Route::post('/contact/update/{id}',[ContactModelController::class,'update']);
Route::post('/contact/update/bg/{id}',[ContactModelController::class,'updatebg']);