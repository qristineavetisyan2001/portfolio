<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('project');
//});

/*Route::get('/admin', function () {
    return view('admin');
})->name('admin');*/

Route::get('/adminInsertForm', function () {
    return view('adminInsertForm');
})->name('adminInsertForm');

Route::get('/project', function () {
    return view('project');
})->name('project');


Route::get('/', [ProjectController::class, 'getAllProjects'])->name('get-all-projects');

Route::get('/admin', [AdminController::class, 'getAdminPage'])->name('admin');
Route::post('/loginAdmin', [AdminController::class, 'login'])->name("loginAdmin");
Route::get('/logOutAdmin', [AdminController::class, 'logOut'])->name("logOutAdmin");

Route::post('/insert-project', [ProjectController::class, 'insert'])->name("insert-project");

Route::get("/project/{id}", [ProjectController::class, 'getProject'])->name("get-project");
Route::post('/editProject/{id}', [AdminController::class, 'editProject'])->name("editProject");
Route::get('/deleteProject/{id}', [AdminController::class, 'deleteProject'])->name("deleteProject");
Route::get('/deleteImage/{id}', [ProjectImage::class, 'deleteImage'])->name("deleteImage");
Route::post('/addImage/{id}', [ProjectImage::class, 'addImage'])->name("addImage");




