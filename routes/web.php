<?php

use App\Http\Controllers\Cs\CostumerServicesController;
use App\Http\Controllers\Disainer\DataMesinController;
use App\Http\Controllers\Disainer\DisainerController;
use App\Http\Controllers\Disainer\ListDataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Layout\LayoutController;
use App\Http\Controllers\Mesin\AtexcoController;
use App\Http\Controllers\Mesin\MimakiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'checkroll:super_admin,disainer,layout,cs,atexco,mimaki'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('indexHome');
    // route admin cs
    Route::get('/laporan', [HomeController::class, 'getLaporan'])->name('getIndexLaporan');

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
    Route::get('/data-order-disainer', [CostumerServicesController::class, 'getIndexOrderCs'])->name('getIndexOrderCsPegawai');
    Route::get('/data-order', [CostumerServicesController::class, 'getIndexCs'])->name('getIndexCsPegawai');
    Route::get('/data-lk', [CostumerServicesController::class, 'getIndexLkCs'])->name('getIndexLkCsPegawai');
    Route::get('/data-lk/edit/{id}', [CostumerServicesController::class, 'puUpdateLK'])->name('getEditIndexLkCsPegawai');
    Route::post('costumer-service/todisainer', [CostumerServicesController::class, 'postToTimDisainer'])->name('postKeTimDisainerPegawai');
    Route::get('/data-order-disainer/LK/{id}', [CostumerServicesController::class, 'createLK'])->name('getCreateToLkPegawai');
    Route::put('/data-lk/update/{id}', [CostumerServicesController::class, 'putDataLkFix'])->name('putDataLkPegawai');

    Route::get('cetak-data-lk/{id}', [CostumerServicesController::class, 'cetakDataLk'])->name('getCetakDataLk');
});

Route::middleware(['auth', 'checkroll:disainer'])->group(function () {
    // route pegawai disainer
    Route::get('/disainer', [DisainerController::class, 'getIndexUserDisainer'])->name('getIndexDisainerPegawai');
    Route::get('/disainer/create/{nama_tim}', [DisainerController::class, 'getCreateToTeamMesin'])->name('getCreateToTeamMesinPegawai');
    Route::get('/disainer/create-Cs/{nama_tim}', [DisainerController::class, 'getCreateToTeamCs'])->name('getCreateToTeamCsPegawai');
    Route::post('/disainer/post-tim-mesin/{nama_tim}', [DisainerController::class, 'postToTeamMesin'])->name('postToTeamMesinPegawai');
    Route::post('/disainer/post-Cs/{nama_tim}', [DisainerController::class, 'postToCustomerServices'])->name('postToCsPegawai');
    Route::get('/data-fix-disainer', [DisainerController::class, 'getDataFixDisainer'])->name('getDataFixDisainerPegawai');

    // list data
    Route::get('/list-data-jenis-kerah', [ListDataController::class, 'getIndexLisDataJenisKerah'])->name('getIndexListDataJenisKerah');
    Route::post('/list-data-jenis-kerah/create', [ListDataController::class, 'postDataJenisKerah'])->name('getCreateistDataJenisKerah');
    Route::put('/list-data-jenis-kerah/update/{id}', [ListDataController::class, 'putDataJenisKerah'])->name('putListDataJenisKerah');
    Route::delete('/list-data-jenis-kerah/delete/{id}', [ListDataController::class, 'deletJenisDatakerah'])->name('deleteListDataJenisKerah');
    //
    Route::get('/list-data-jenis-lengan', [ListDataController::class, 'getIndexLisDataJenisLengan'])->name('getIndexListDataJenisLengan');
    Route::post('/list-data-jenis-lengan/create', [ListDataController::class, 'postDataJenisLengan'])->name('getCreateistDataJenisLengan');
    Route::put('/list-data-jenis-lengan/update/{id}', [ListDataController::class, 'putDataJenisLengan'])->name('putListDataJenisLengan');
    Route::delete('/list-data-jenis-lengan/delete/{id}', [ListDataController::class, 'deletJenisDataLengan'])->name('deleteListDataJenisLengan');
    //
    Route::get('/list-data-jenis-celana', [ListDataController::class, 'getIndexLisDataJenisCelana'])->name('getIndexListDataJenisCelana');
    Route::post('/list-data-jenis-celana/create', [ListDataController::class, 'postDataJenisCelana'])->name('getCreateistDataJenisCelana');
    Route::put('/list-data-jenis-celana/update/{id}', [ListDataController::class, 'putDataJenisCelana'])->name('putListDataJenisCelana');
    Route::delete('/list-data-jenis-celana/delete/{id}', [ListDataController::class, 'deletJenisDataCelana'])->name('deleteListDataJenisCelana');

    // data mesin
    Route::get('/data-mesin-disainer-atexco', [DataMesinController::class, 'getDataMesinAtexco'])->name('getIndexDataMesinAtexcoPegawai');
    Route::get('/data-mesin-disainer-mimaki', [DataMesinController::class, 'getDataMesinMimaki'])->name('getIndexDataMesinMimakiPegawai');
});

Route::middleware(['auth', 'checkroll:atexco'])->group(function () {
    Route::get('/mesin-atexco', [AtexcoController::class, 'getIndexAtexco'])->name('getIndexMesinAtexcoPegawai');
    Route::get('/data-masuk-mesin-atexco', [AtexcoController::class, 'getIndexDataMasukAtexco'])->name('getIndexDataMasukMesinAtexco');

    Route::put('/mesin-atxco/{id}', [AtexcoController::class, 'putFeedBackToDisainer'])->name('putFeedbackByAtexcoPegawai');
});

Route::middleware(['auth', 'checkroll:mimaki'])->group(function () {
    Route::get('/mesin-mimaki', [MimakiController::class, 'getIndexMimaki'])->name('getIndexMesinMimakiPegawai');
    Route::put('/mesin-mimaki/{id}', [MimakiController::class, 'putFeedBackToDisainer'])->name('putFeedbackByMimakiPegawai');
});

Route::middleware(['auth', 'checkroll:layout'])->group(function () {
    Route::get('/data-Lk-Layout', [LayoutController::class, 'getIndexLkCs'])->name('getIndexLkLayoutPegawai');
    Route::get('/create-laporan-lk/{id}', [LayoutController::class, 'createLaporanLk'])->name('getCreateLaporanLkLayout');
    Route::post('/kirim-laporan-lk', [LayoutController::class, 'postLaporanLk'])->name('postLaporanLkLayout');
    Route::get('/laporan-Lk-Layout', [LayoutController::class, 'getIndexLaporanLk'])->name('getIndexLaporanLk');
    Route::get('/show-laporan-Lk-Layout/{id}', [LayoutController::class, 'showDataLaporanLk'])->name('getShowLaporanLkLayout');


    Route::get('cetak-data-lk-fix/{id}', [LayoutController::class, 'cetakDataLk'])->name('getCetakDataLkLayout');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
