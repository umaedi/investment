<?php
namespace App\Http\Controllers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [AuthController::class, 'index']);
Route::get('/lender/login', [AuthController::class, 'auth']);
Route::get('/lender/forgot-password', [AuthController::class, 'forgot']);

Route::middleware('checkAccessToken')->prefix('lender')->group(function() {
    Route::get('/dashboard', DashboardController::class);
    
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/update_account', [ProfileController::class, 'update']);

    //export
    Route::get('/export/transction', [ExportController::class, 'transction']);
    Route::get('/export/funding_balance', [ExportController::class, 'fundingbalance']);

    //print or pdf
    Route::get('/print/transction', [PrintController::class, 'transction']);
    Route::get('/print/funding_balance', [PrintController::class, 'fundingbalance']);

    //send wa
    Route::post('/send-whatsapp', SendwaController::class);
});