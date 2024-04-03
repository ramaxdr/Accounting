<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountingController;

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
    return view('login/login');
});

Route::get('/register', function (){
    return view('login/register');
});
Route::get('/master', function (){
    return view('master/master');
});
Route::get('/dashboard', function (){
    return view('dashboard/dashboard');
});
Route::get('/credit-term', function (){
    return view('dashboard/credit');
});
Route::get('/customer-supplier-group', function (){
    return view('dashboard/customerManagement');
});
Route::get('/supplier-type-management', function (){
    return view('dashboard/supplierType');
});
Route::get('/currency-management', function (){
    return view('dashboard/currency');
});
Route::get('/document-numbering-format', function (){
    return view('dashboard/dnf');
});
Route::get('/journal-type-management', function (){
    return view('dashboard/journalType');
});
Route::get('/payment-method-management', function (){
    return view('dashboard/payment');
});
Route::get('/tax-management', function (){
    return view('dashboard/tax');
});
Route::get('/group-modul', function (){
    return view('dashboard/groupModul');
});
Route::get('/credit-add', function (){
    return view('dashboard/creditAdd');
});
Route::get('/currency-add', function (){
    return view('dashboard/currencyAdd');
});
Route::get('/customer-management-add', function (){
    return view('dashboard/customerManagementAdd');
});
Route::get('/dnf-add', function (){
    return view('dashboard/dnfAdd');
});
Route::get('/journal-type-add', function (){
    return view('dashboard/journalTypeAdd');
});
Route::get('/payment-add', function (){
    return view('dashboard/paymentAdd');
});
Route::get('/supplier-type-add', function (){
    return view('dashboard/supplierTypeAdd');
});
Route::get('/group-modul-add', function (){
    return view('dashboard/groupModulAdd');
});
Route::get('/modul-add', function (){
    return view('dashboard/modulAdd');
});
Route::get('/modul-form', function (){
    return view('dashboard/modulForm');
});
Route::get('/modul-edit', function (){
    return view('dashboard/modulEdit');
});
Route::get('/tax-add', function (){
    return view('dashboard/taxAdd');
});

// group modul
Route::get('/group-modul', [AccountingController::class, 'show']);
Route::post('/group-modul-store', [AccountingController::class, 'storeGroup'])->name('groupModul');
Route::get('/group-modul-edit-{id}', [AccountingController::class, 'editGroup'])->name('groupModulEdit');
Route::post('/group-modul-{id}', [AccountingController::class, 'updateGroup'])->name('groupModulUpdate');
Route::delete('/group-modul-{id}', [AccountingController::class, 'destroyGroup'])->name('groupModulDestroy');

// modul form
Route::post('/modul-add', [AccountingController::class, 'storeModul'])->name('modulAdd');
Route::get('/modul-form', [AccountingController::class, 'showModul']);
Route::get('/modul-add', [AccountingController::class, 'joinGroup']);
Route::get('/modul-edit/{id}', [AccountingController::class, 'joinGroup'])->name('modulEdit');
Route::post('/modul-form-{id}', [AccountingController::class, 'updateModul'])->name('modulUpdate');
Route::get('/modul-edit-{id}', [AccountingController::class, 'editModul'])->name('modulEdit');
Route::delete('/modul-form-{id}', [AccountingController::class, 'destroyModul'])->name('modulDestroy');

// credit term
Route::post('/credit-add', [AccountingController::class, 'storeCredit'])->name('creditAdd');
Route::get('/credit-add', [AccountingController::class, 'joinModul']);
Route::get('/credit-term', [AccountingController::class, 'showCredit']);
Route::get('/credit-edit/{id}', [AccountingController::class, 'joinModul'])->name('creditEdit');
Route::get('/credit-edit/{id}', [AccountingController::class, 'creditEdit'])->name('creditEdit');
Route::post('/credit-term-{id}', [AccountingController::class, 'creditUpdate'])->name('creditUpdate');
Route::delete('/credit-term-{id}', [AccountingController::class, 'creditDestroy'])->name('creditDestroy');

// document-numbering-format
Route::get('/document-numbering-format', [AccountingController::class, 'formatShow']);
Route::post('/document-numbering-format-add', [AccountingController::class, 'formatStore'])->name('formatAdd');
Route::get('/document-numbering-format-add', [AccountingController::class, 'formatJoin']);
Route::get('/document-numbering-format-edit-{id}', [AccountingController::class, 'formatEdit'])->name('formatEdit');
Route::get('/document-numbering-format-edit-{id}', [AccountingController::class, 'formatJoin'])->name('formatEdit');
Route::post('/document-numbering-format-{id}', [AccountingController::class, 'formatUpdate'])->name('formatUpdate');
Route::delete('/document-numbering-format-{id}', [AccountingController::class, 'formatDestroy'])->name('formatDestroy');
