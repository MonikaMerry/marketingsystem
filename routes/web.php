<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LeadController;
use App\Models\Lead;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});
// dd(Auth::user());
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    if (Auth::user()->is_admin == 1) {
        return redirect('admindashboard');
    }
    return redirect('user-dashboard');
})->name('user-dashboard');

Route::get('user-dashboard', function () {
    return view('dashboard');
});

Route::middleware('auth', 'admin')->group(function () {

    Route::get('admindashboard', function () {
        return view('admin.admindashboard');
    });
    Route::get('lead-list', [LeadController::class, 'leadLists']);

    Route::get('create-page', [LeadController::class, 'createPage']);

    Route::post('create-lead', [LeadController::class, 'createlead']);

    Route::get('edit-lead/{id}', [LeadController::class, 'editLead']);

    Route::post('update-lead', [LeadController::class, 'updateLead']);

    Route::get('delete-lead/{id}', [LeadController::class, 'deleteLead']);

    // comment section

    Route::get('comment-page/{id}', [CommentController::class, 'commentPage']);
    // create comment
    Route::post('create-comment', [CommentController::class, 'createComment']);
    // go back user
    Route::get('go-back', [CommentController::class, 'goBacktoLeadList']);
});
