<?php

use App\Http\Controllers\AlmuniStudentController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\RoleManagementController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SupervisorController;
use App\Models\Carousel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;




Route::get('/register', [UserController::class, 'create'])->name('auth.register');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/home', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('/current', [FrontendController::class,'current'])->name('frontend.current');
Route::get('/almuni', [FrontendController::class,'almuni'])->name('frontend.almuni');
Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('/publications', [FrontendController::class,'publication'])->name('frontend.publication');
Route::get('/carousel_show', [FrontendController::class,'carousel'] )->name('frontend.layout.carousel');


Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    // Routes accessible only to admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/master', [UserController::class,'master'])->name('backend.master');
        Route::get('/updatte_uesr{user}', [UserController::class,'update'])->name('backend.auth.update');

        Route::get('/create', [StudentController::class,'create'])->name('backend.student.create');
        Route::post('/store', [StudentController::class,'store'])->name('backend.student.store');
        Route::get('/index', [StudentController::class,'index'])->name('backend.student.index');
        Route::get('/edit{student}',[StudentController::class,'edit'])->name('backend.student.edit');
        Route::post('/update{student}',[StudentController::class,'update'])->name('backend.student.update');
        Route::get('/delete{student}',[StudentController::class,'delete'])->name('backend.student.delete');

        Route::get('/create_almuni', [AlmuniStudentController::class,'create'])->name('backend.almuni.create');
        Route::post('/store_almuni', [AlmuniStudentController::class,'store'])->name('backend.almuni.store');
        Route::get('/index_almuni', [AlmuniStudentController::class,'index'])->name('backend.almuni.index');
        Route::get('/almuni_edits{almuni}',[AlmuniStudentController::class,'edits'])->name('backend.almuni.edits');
        Route::post('/almuni_update{almuni}',[AlmuniStudentController::class,'update'])->name('backend.almuni.update');
        Route::get('/almuni_delete{almuni}',[AlmuniStudentController::class,'delete'])->name('backend.almuni.delete');

        Route::get('/create_supervisor', [SupervisorController::class,'create'])->name('backend.supervisor.create');
        Route::post('/store_supervisor', [SupervisorController::class,'store'])->name('backend.supervisor.store');
        Route::get('/index_supervisor', [SupervisorController::class,'index'])->name('backend.supervisor.index');
        Route::get('/s_edit_supervisor{supervisor}', [SupervisorController::class,'edit'])->name('backend.supervisor.edit');
        Route::post('/s_update_supervisor{supervisor}', [SupervisorController::class,'update'])->name('backend.supervisor.update');
        Route::get('/s_delete_supervisor{supervisor}', [SupervisorController::class,'delete'])->name('backend.supervisor.delete');


        Route::get('/carousel_create_in', [CarouselController::class,'create'] )->name('backend.carousel.create');
        Route::post('/carousel_store_in', [CarouselController::class,'store'] )->name('backend.carousel.store');
        Route::get('/carousel_index_in', [CarouselController::class,'index'] )->name('backend.carousel.index');
        Route::get('/carousel_edit_in_edits{carousel}', [CarouselController::class,'edit'] )->name('backend.carousel.edit');
        Route::post('/carousel_update_in{carousel}', [CarouselController::class,'update'] )->name('backend.carousel.update');
        Route::get('/carousel_delete_in{carousel}', [CarouselController::class,'delete'] )->name('backend.carousel.delete');


        Route::get('/publicatiion_create', [PublicationController::class,'create'] )->name('backend.publication.create');
        Route::post('/publicatiion_store_in', [PublicationController::class,'store'] )->name('backend.publication.store');
        Route::get('/publicatiion_index_in', [PublicationController::class,'index'] )->name('backend.publication.index');
        Route::get('/publicatiion_edit_in_edits{publication}', [PublicationController::class,'edit'] )->name('backend.publication.edit');
        Route::post('/publicatiion_update_in{publication}', [PublicationController::class,'update'] )->name('backend.publication.update');
        Route::get('/publicatiion_delete_in{publication}', [PublicationController::class,'delete'] )->name('backend.publication.delete');


        Route::get('/role_index', [RoleManagementController::class, 'index'])->name('backend.role.index');
        Route::get('/role_edit{role}', [RoleManagementController::class, 'edit'])->name('backend.role.edit');
        Route::post('/role_update{role}', [RoleManagementController::class, 'update'])->name('backend.role.update');
        Route::get('/role_delete{role}', [RoleManagementController::class,'delete'])->name('backend.role.delete');


    });


});
