<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DuplicateRemoveController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\UserController;
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

    // histroy section
    Route::get('histroy-page', [LeadController::class, 'histroyPage']);

    // user page
    Route::get('user-list', [UserController::class, 'userListPage']);

    // active && inactive user

    Route::get('active-user/{id}', [UserController::class, 'activeUser']);
    Route::get('inactive-user/{id}', [UserController::class, 'inactiveUser']);

    // admin to user && user to admin

    Route::get('user-admin/{id}', [UserController::class, 'userToAdmin']);
    Route::get('admin-user/{id}', [UserController::class, 'adminToUser']);

    // message list
    Route::get('message-list', [MessagesController::class, 'messageList']);

    // import section
    Route::get('import-page', [LeadController::class, 'viewImportPage']);

    Route::post('import-lead-data', [LeadController::class, 'importData'])->name('import-data');

    // check duplicate values

    Route::get('duplicate-page', [DuplicateRemoveController::class, 'viewDuplicatePage']);

    Route::post('check-value', [DuplicateRemoveController::class, 'checkDuplicateValue']);
    Route::get('export-data', [DuplicateRemoveController::class, 'checkDuplicateValue']);

    // district and state
    Route::get('district-page',[LeadController::class,'districtPage']);
    Route::get('state-page',[LeadController::class,'statePage']);

});
