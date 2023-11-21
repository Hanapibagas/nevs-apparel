<?php

use App\Http\Controllers\Cs\CostumerServicesController;
use App\Http\Controllers\Disainer\DataMesinController;
use App\Http\Controllers\Disainer\DisainerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Mesin\AtexcoController;
use App\Http\Controllers\Mesin\MimakiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'checkroll:super_admin,disainer,layout,cs,atexco,mimaki'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('indexHome');
    // route admin cs
    Route::get('/costumer-service-admin', [HomeController::class, 'getCostumerSevices'])->name('getIndexCs');
    Route::post('/costumer-service-admin/update', [HomeController::class, 'postUpdatePirmission'])->name('postPirmission');
    Route::post('/costumer-service-admin/createCs', [HomeController::class, 'postPegawaiCs'])->name('postCreateCs');
    Route::post('/costumer-service-admin/createDesainer', [HomeController::class, 'postPegawaiDesainer'])->name('postCreateDesainer');
    Route::post('/costumer-service-admin/createLayout', [HomeController::class, 'postPegawaiLayout'])->name('postCreateLayout');

    // route admin disainer
    Route::get('/desainer-admin', [HomeController::class, 'getDesainer'])->name('getIndexDesainer');

    // route admin layout
    Route::get('/layout-admin', [HomeController::class, 'getLayout'])->name('getIndexLayout');

    // route admin layout
    Route::get('/mesin-mimaki-admin', [HomeController::class, 'getMesinMimaki'])->name('getIndexMesinMimaki');

    // route admin layout
    Route::get('/mesin-atexco-admin', [HomeController::class, 'getMesinAtexco'])->name('getIndexMesinAtexco');

    // route admin layout
    Route::get('/pembagian-layout-admin', [HomeController::class, 'getPembagianLayout'])->name('getIndexPembagianLayout');
});

Route::middleware(['auth', 'checkroll:cs'])->group(function () {
    // route pegawai cs
    Route::get('/costumer-service', [CostumerServicesController::class, 'getIndexCs'])->name('getIndexCsPegawai');
    Route::post('costumer-service/todisainer', [CostumerServicesController::class, 'postToTimDisainer'])->name('postKeTimDisainerPegawai');
});

Route::middleware(['auth', 'checkroll:disainer'])->group(function () {
    // route pegawai disainer
    Route::get('/disainer', [DisainerController::class, 'getIndexUserDisainer'])->name('getIndexDisainerPegawai');
    Route::get('/disainer/create/{nama_tim}', [DisainerController::class, 'getCreateToTeamMesin'])->name('getCreateToTeamMesinPegawai');
    Route::get('/disainer/create-Cs/{nama_tim}', [DisainerController::class, 'getCreateToTeamCs'])->name('getCreateToTeamCsPegawai');
    Route::post('/disainer/post-tim-mesin', [DisainerController::class, 'postToTeamMesin'])->name('postToTeamMesinPegawai');
    Route::post('/disainer/post-Cs', [DisainerController::class, 'postToCustomerServices'])->name('postToCsPegawai');

    // data mesin
    Route::get('/data-mesin-disainer-atexco', [DataMesinController::class, 'getDataMesinAtexco'])->name('getIndexDataMesinAtexcoPegawai');
    Route::get('/data-mesin-disainer-mimaki', [DataMesinController::class, 'getDataMesinMimaki'])->name('getIndexDataMesinMimakiPegawai');
});

Route::middleware(['auth', 'checkroll:atexco'])->group(function () {
    Route::get('/mesin-atexco', [AtexcoController::class, 'getIndexAtexco'])->name('getIndexMesinAtexcoPegawai');
    Route::put('/mesin-atxco/{id}', [AtexcoController::class, 'putFeedBackToDisainer'])->name('putFeedbackByAtexcoPegawai');
});

Route::middleware(['auth', 'checkroll:mimaki'])->group(function () {
    Route::get('/mesin-mimaki', [MimakiController::class, 'getIndexMimaki'])->name('getIndexMesinMimakiPegawai');
    Route::put('/mesin-mimaki/{id}', [MimakiController::class, 'putFeedBackToDisainer'])->name('putFeedbackByMimakiPegawai');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
