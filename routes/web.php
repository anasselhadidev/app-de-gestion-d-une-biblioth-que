<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

route::get('/',[HomeController::class,'index']);
Route::get('/', function () {
    return view('home.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/home',[AdminController::class,'index']);

route::get('/category_page',[AdminController::class,'category_page']);

route::post('/add_category',[AdminController::class,'add_category']);

route::get('/cat_delete/{id}',[AdminController::class,'cat_delete']);
route::get('/edit_category/{id}',[AdminController::class,'edit_category']);
route::post('/update_category/{id}',[AdminController::class,'update_category']);
route::get('/add_book',[AdminController::class,'add_book']);
route::post('/store_book',[AdminController::class,'store_book']);
route::get('/show_book',[AdminController::class,'show_book']);
route::get('/book_delete/{id}',[AdminController::class,'book_delete']);
route::get('/edit_book/{id}',[AdminController::class,'edit_book']);
route::post('/update_book/{id}',[AdminController::class,'update_book']);
route::get('/book_details/{id}',[HomeController::class,'book_details']);
route::get('/borrow_request',[AdminController::class,'borrow_request']);
route::get('/approve_book/{id}',[AdminController::class,'approve_book']);
route::get('/return_book/{id}',[AdminController::class,'return_book']);
route::get('/cancel_book/{id}',[AdminController::class,'cancel_book']);
route::get('/rejected_book/{id}',[AdminController::class,'rejected_book']);
route::get('/book_history',[HomeController::class,'book_history']);
route::get('/cancel_req/{id}',[HomeController::class,'cancel_req']);
route::get('/explore',[HomeController::class,'explore']);
route::get('/search',[HomeController::class,'search']);
route::get('/cat_search/{id}',[HomeController::class,'cat_search']);
route::get('/book_detail/{id}',[HomeController::class,'book_detail']);
Route::post('update_return_date/{id}', [AdminController::class, 'updateReturnDate'])->name('update_return_date');
Route::get('/borrow/{id}/reservation', [HomeController::class, 'reservation'])->name('reservation');
Route::post('/reservation/{id}/submit', [HomeController::class, 'submitReservation'])->name('reservation.submit');
Route::get('/book_reservation', [HomeController::class, 'book_reservation'])->name('book_reservation');
Route::get('/cancel_reserv/{id}', [HomeController::class, 'cancel_reserv'])->name('cancel_reserv');
Route::get('/reservation_request',[AdminController::class,'reservation_request']);
route::get('/approve_reservation/{id}',[AdminController::class,'approve_reservation']);
route::get('/rejected_reservation/{id}',[AdminController::class,'rejected_reservation']);
route::get('/borrow_books/{id}',[HomeController::class,'borrow_books']);
Route::post('/borrow/{id}', [HomeController::class, 'submitBorrowForm'])->name('submitBorrowForm');
route::get('/return_reservation/{id}',[AdminController::class,'return_reservation']);
route::get('/cancel_reservation/{id}',[AdminController::class,'cancel_reservation']);
Route::post('update_return_date/{id}', [AdminController::class, 'updatReturnDate'])->name('update_return_date');
