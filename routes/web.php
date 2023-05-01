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

Route::prefix('account')->group(function () {
    //dashboard account
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('account.dashboard.index');

    //categories debit
    Route::get('/categories_debit/search', [CategoriesDebitController::class, 'search'])->name('account.categories_debit.search');
    Route::get('/categories_debit/create', [CategoriesDebitController::class, 'create'])->name('account.categories_debit.create');
    Route::post('/categories_debit', [CategoriesDebitController::class, 'store'])->name('account.categories_debit.store');
    Route::get('/categories_debit/{category}', [CategoriesDebitController::class, 'show'])->name('account.categories_debit.show');
    Route::get('/categories_debit/{category}/edit', [CategoriesDebitController::class, 'edit'])->name('account.categories_debit.edit');
    Route::put('/categories_debit/{category}', [CategoriesDebitController::class, 'update'])->name('account.categories_debit.update');
    Route::delete('/categories_debit/{category}', [CategoriesDebitController::class, 'destroy'])->name('account.categories_debit.destroy');

    //debit
    Route::get('/debit/search', [DebitController::class, 'search'])->name('account.debit.search');
    Route::get('/debit/create', [DebitController::class, 'create'])->name('account.debit.create');
    Route::post('/debit', [DebitController::class, 'store'])->name('account.debit.store');
    Route::get('/debit/{debit}', [DebitController::class, 'show'])->name('account.debit.show');
    Route::get('/debit/{debit}/edit', [DebitController::class, 'edit'])->name('account.debit.edit');
    Route::put('/debit/{debit}', [DebitController::class, 'update'])->name('account.debit.update');
    Route::delete('/debit/{debit}', [DebitController::class, 'destroy'])->name('account.debit.destroy');

    //categories credit
    Route::get('/categories_credit/search', [CategoriesCreditController::class, 'search'])->name('account.categories_credit.search');
    Route::get('/categories_credit/create', [CategoriesCreditController::class, 'create'])->name('account.categories_credit.create');
    Route::post('/categories_credit', [CategoriesCreditController::class, 'store'])->name('account.categories_credit.store');
    Route::get('/categories_credit/{category}', [CategoriesCreditController::class, 'show'])->name('account.categories_credit.show');
    Route::get('/categories_credit/{category}/edit', [CategoriesCreditController::class, 'edit'])->name('account.categories_credit.edit');
    Route::put('/categories_credit/{category}', [CategoriesCreditController::class, 'update'])->name('account.categories_credit.update');
    Route::delete('/categories_credit/{category}', [CategoriesCreditController::class, 'destroy'])->name('account.categories_credit.destroy');
});