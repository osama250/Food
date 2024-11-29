<?php


use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\AdminPanel\AuthController;
use App\Http\Controllers\AdminPanel\PermessionController;
use App\Http\Controllers\AdminPanel\RoleController;
use App\Http\Controllers\AdminPanel\SettingController;
use App\Http\Controllers\AdminPanel\CategoryController;
use App\Http\Controllers\AdminPanel\RiceController;
use App\Http\Controllers\AdminPanel\BreadController;
use App\Http\Controllers\AdminPanel\DrinkController;
use App\Http\Controllers\AdminPanel\SaladController;
use App\Http\Controllers\AdminPanel\ContactController;
use App\Http\Controllers\AdminPanel\MealController;
use App\Http\Controllers\AdminPanel\OrderController;
use App\Http\Controllers\AdminPanel\SuggestionController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::middleware(['guest'])->group(function () {
            Route::get('/', [AuthController::class, 'login'])->name('auth.login');
            Route::get('/login', [AuthController::class, 'postLogin'])->name('post.login');
        });

        Route::middleware('auth:web')->group(function () {
            Route::get('/dashboard', function () {
                return view('welcome');
            })->name('dashboard');

            Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
            Route::resource('admins', AdminController::class);
            Route::resource('role', RoleController::class);
            Route::resource('permessions', PermessionController::class);
            Route::resource('settings', SettingController::class);
            Route::resource('categories', CategoryController::class);
            Route::resource('rice', RiceController::class);
            Route::resource('breads', BreadController::class);
            Route::resource('drinks', DrinkController::class);
            Route::resource('salads', SaladController::class);
            Route::resource('meals', MealController::class);
            Route::resource('orders', OrderController::class);
            Route::resource('suggestions', SuggestionController::class);
            Route::resource('contacts', ContactController::class);
        });
    }
);

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

// require __DIR__ . '/admin.php';

