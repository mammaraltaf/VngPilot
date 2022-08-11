<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
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

//Route::get('/', function () {
//    return view('index');
//});
Route::get('/',[CompanyController::class,'getAllCompaniesData'])->name('company.getAllCompaniesData');
Route::post('/',[CompanyController::class,'store'])->name('company.store');

Route::get('/get-company-data/{id?}', [CompanyController::class,'getCompanyData'])->name('company.getCompanyData');

Route::get('/getData',[CompanyController::class,'index'])->name('company.index');
Route::get('/company-category/{company_category?}',[CompanyController::class,'companyCategory'])->name('company.companyCategory');
Route::get('/global-search/{value?}',[CompanyController::class,'globalSearch'])->name('company.globalSearch');


Route::get('license', function () {
    return view('license');
});

