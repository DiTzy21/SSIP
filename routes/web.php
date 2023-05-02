<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesDebitController;


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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\account\DashboardController::class, 'index'])->name('account.dashboard.index');
Route::get('/categories/debit', [App\Http\Controllers\account\CategoriesDebitController::class, 'index'])->name('account.categories_debit.index');
Route::get('/debit', [App\Http\Controllers\account\DebitController::class, 'index'])->name('account.debit.index');
Route::get('/categories/credit', [App\Http\Controllers\account\CategoriesCreditController::class, 'index'])->name('account.categories_credit.index');
Route::get('/credit', [App\Http\Controllers\account\CreditController::class, 'index'])->name('account.credit.index');


Route::prefix('account')->group(function () {
    //dashboard account
    Route::get('/dashboard', [App\Http\Controllers\account\DashboardController::class, 'index'])->name('account.dashboard.index');

    //categories debit
    Route::get('/categories_debit/search', [App\Http\Controllers\account\CategoriesDebitController::class, 'search'])->name('account.categories_debit.search');
    Route::get('/categories_debit/create', [App\Http\Controllers\account\CategoriesDebitController::class, 'create'])->name('account.categories_debit.create');
    Route::post('/categories_debit', [App\Http\Controllers\account\CategoriesDebitController::class, 'store'])->name('account.categories_debit.store');
    Route::get('/categories_debit/{category}', [App\Http\Controllers\account\CategoriesDebitController::class, 'show'])->name('account.categories_debit.show');
    Route::get('/categories_debit/{category}/edit', [App\Http\Controllers\account\CategoriesDebitController::class, 'edit'])->name('account.categories_debit.edit');
    Route::put('/categories_debit/{category}', [App\Http\Controllers\account\CategoriesDebitController::class, 'update'])->name('account.categories_debit.update');
    Route::delete('/categories_debit/{category}', [App\Http\Controllers\account\CategoriesDebitController::class, 'destroy'])->name('account.categories_debit.destroy');

    //debit
    Route::get('/debit/search', [App\Http\Controllers\account\DebitController::class, 'search'])->name('account.debit.search');
    Route::get('/debit/create', [App\Http\Controllers\account\DebitController::class, 'create'])->name('account.debit.create');
    Route::post('/debit', [App\Http\Controllers\account\DebitController::class, 'store'])->name('account.debit.store');
    Route::get('/debit/{debit}', [App\Http\Controllers\account\DebitController::class, 'show'])->name('account.debit.show');
    Route::get('/debit/{debit}/edit', [App\Http\Controllers\account\DebitController::class, 'edit'])->name('account.debit.edit');
    Route::put('/debit/{debit}', [App\Http\Controllers\account\DebitController::class, 'update'])->name('account.debit.update');
    Route::delete('/debit/{debit}', [App\Http\Controllers\account\DebitController::class, 'destroy'])->name('account.debit.destroy');

    //categories credit
    Route::get('/categories_credit/search', [App\Http\Controllers\account\CategoriesCreditController::class, 'search'])->name('account.categories_credit.search');
    Route::get('/categories_credit/create', [App\Http\Controllers\account\CategoriesCreditController::class, 'create'])->name('account.categories_credit.create');
    Route::post('/categories_credit', [App\Http\Controllers\account\CategoriesCreditController::class, 'store'])->name('account.categories_credit.store');
    Route::get('/categories_credit/{category}', [App\Http\Controllers\account\CategoriesCreditController::class, 'show'])->name('account.categories_credit.show');
    Route::get('/categories_credit/{category}/edit', [App\Http\Controllers\account\CategoriesCreditController::class, 'edit'])->name('account.categories_credit.edit');
    Route::put('/categories_credit/{category}', [App\Http\Controllers\account\CategoriesCreditController::class, 'update'])->name('account.categories_credit.update');
    Route::delete('/categories_credit/{category}', [App\Http\Controllers\account\CategoriesCreditController::class, 'destroy'])->name('account.categories_credit.destroy');

    //credit
    Route::get('/credit/search', [App\Http\Controllers\account\CreditController::class, 'search'])->name('account.credit.search');
    Route::get('/credit/create', [App\Http\Controllers\account\CreditController::class, 'create'])->name('account.credit.create');
    Route::post('/credit', [App\Http\Controllers\account\CreditController::class, 'store'])->name('account.credit.store');
    Route::get('/credit/{credit}', [App\Http\Controllers\account\CreditController::class, 'show'])->name('account.credit.show');
    Route::get('/credit/{credit}/edit', [App\Http\Controllers\account\CreditController::class, 'edit'])->name('account.credit.edit');
    Route::put('/credit/{credit}', [App\Http\Controllers\account\CreditController::class, 'update'])->name('account.credit.update');
    Route::delete('/credit/{credit}', [App\Http\Controllers\account\CreditController::class, 'destroy'])->name('account.credit.destroy');

    //laporan debit
    Route::get('/laporan_debit', [App\Http\Controllers\account\LaporanDebitController::class, 'index'])->name('account.laporan_debit.index');
    Route::get('/laporan_debit/check', [App\Http\Controllers\account\LaporanDebitController::class, 'check'])->name('account.laporan_debit.check');

    //laporan credit
    Route::get('/laporan_credit', [App\Http\Controllers\account\LaporanCreditController::class, 'index'])->name('account.laporan_credit.index');
    Route::get('/laporan_credit/check', [App\Http\Controllers\account\LaporanCreditController::class, 'check'])->name('account.laporan_credit.check');
});
