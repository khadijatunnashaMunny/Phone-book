<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactController;


//signin
Route::get('/signin', [contactController::class, 'login']);
Route::post('/loginhere', [contactController::class, 'LoginSubmit']);
//signup
Route::get('/signup', [contactController::class, 'register']);
Route::post('/register', [contactController::class, 'registerSubmit']);
//logout
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});
//contact List
Route::get('/', [contactController::class, 'contactList']);

//crud contact
Route::get('/add_contact', [contactController::class, 'add_contact']);
Route::post('/contactSubmit', [contactController::class, 'contactSubmit']);
Route::get('/contact_detail/{id}', [contactController::class, 'contact_detail']);
Route::get("/edit/{id}", [contactController::class, 'edit']);
Route::get("/delete/{id}", [contactController::class, 'delete']);
Route::patch("/update_detail/{id}", [contactController::class, 'update_detail']);
//search
Route::get("/search", [contactController::class, 'search']);
//pdf convert
Route::get('/pdf_convert',[contactController::class, 'pdfGeneration']);
//shortlist
Route::post('/add_to_shortlist', [contactController::class, 'add_to_shortlist']);
Route::get("/shortList", [contactController::class, 'shortList']);
