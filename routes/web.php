<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\StuffController;
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

Route::get('/', function () {
    return view('welcome');
});

/**
 * BranchController's actions
 */
Route::controller(BranchController::class)->group(function () {
    Route::get('branches', 'read')->name('get_branches');
    Route::post('branch/create', 'create')->name('set_branch');
    Route::get('branch', 'readDetails')->name('get_branch_details');
});

/**
 * Stuff's actions
 */
Route::post('stuff/assign_branch', [StuffController::class, 'assignBranch'])->name('set_stuff_branch');