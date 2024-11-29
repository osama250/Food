<?php


use App\Http\Controllers\AdminPanel\SuggestionController as AdminPanelSuggestionController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\API\ExcursionController;
use App\Http\Controllers\API\AgeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\MealController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\SuggestionController;
use App\Http\Controllers\Api\DietController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login' , [ AuthController::class , 'login' ] );
Route::post('signup' , [ AuthController::class , 'signup' ] );


Route::middleware(['auth:client','StatusMiddleware'])->group(function(){
    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('update-profile', [AuthController::class, 'UpdateProfile']);
    Route::get('logout', [AuthController::class, 'Logout']);
    Route::post('change-password', [AuthController::class, 'ChangePassword']);

    // Orders
    Route::post('create-order', [ OrderController::class , 'placeOrder'] ) ;
});

Route::post('contact-us' , [ ContactUsController::class , 'contactUs'] );
Route::get('settings' , [ SettingController::class , 'setting'] );
Route::get('dietplans' , [ DietController::class , 'index'] );


Route::get('categotry-details/{id}' , [ CategoryController::class , 'categoryDetails'] );

Route::get('meal-details/{id}' , [ MealController::class , 'mealDetails'] );

Route::post('suggestions' , [ SuggestionController::class , 'suggestions'] );


