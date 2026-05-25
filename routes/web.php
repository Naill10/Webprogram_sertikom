<?php
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Tampil_dataController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// dashboard pages

Route::get('/', function () {
    return view('pages.dashboard.ecommerce', ['title' => 'E-commerce Dashboard']);
})->name('dashboard');

// calender pages
Route::get('/calendar', function () {
    return view('pages.calender', ['title' => 'Calendar']);
})->name('calendar');

// tabel user
Route::get('/tabel_user', function () {
    return view('pages.tabel_user', ['title' => 'Tabel User']);
})->name('tabel_user');

// tabel admin
Route::get('/tabel_admin', function () {
    return view('pages.tabel_admin', ['title' => 'Tabel Admin']);
})->name('tabel_admin');

// profile pages
Route::get('/profile', function () {
    return view('pages.profile', ['title' => 'Profile']);
})->name('profile');

// form pages
Route::get('/form-elements', function () {
    return view('pages.form.form-elements', ['title' => 'Form Elements']);
})->name('form-elements');

// tables pages
Route::get('/basic-tables', function () {
    return view('pages.tables.basic-tables', ['title' => 'Basic Tables']);
})->name('basic-tables');

// pages

Route::get('/blank', function () {
    return view('pages.blank', ['title' => 'Blank']);
})->name('blank');

// error pages
Route::get('/error-404', function () {
    return view('pages.errors.error-404', ['title' => 'Error 404']);
})->name('error-404');

// chart pages
Route::get('/line-chart', function () {
    return view('pages.chart.line-chart', ['title' => 'Line Chart']);
})->name('line-chart');

Route::get('/bar-chart', function () {
    return view('pages.chart.bar-chart', ['title' => 'Bar Chart']);
})->name('bar-chart');


// authentication pages
Route::get('/signin', function () {
    return view('pages.auth.signin', ['title' => 'Sign In']);
})->name('signin');

Route::get('/signup', function () {
    return view('pages.auth.signup', ['title' => 'Sign Up']);
})->name('signup');

// ui elements pages
Route::get('/alerts', function () {
    return view('pages.ui-elements.alerts', ['title' => 'Alerts']);
})->name('alerts');

Route::get('/avatars', function () {
    return view('pages.ui-elements.avatars', ['title' => 'Avatars']);
})->name('avatars');

Route::get('/badge', function () {
    return view('pages.ui-elements.badges', ['title' => 'Badges']);
})->name('badges');

Route::get('/buttons', function () {
    return view('pages.ui-elements.buttons', ['title' => 'Buttons']);
})->name('buttons');

Route::get('/image', function () {
    return view('pages.ui-elements.images', ['title' => 'Images']);
})->name('images');

Route::get('/videos', function () {
    return view('pages.ui-elements.videos', ['title' => 'Videos']);
})->name('videos');

//tampil data 
Route::get('/tabel_user', [ComplaintController::class, 'index'])->name('tabel_user');

//tampil data (admin)
Route::get('/tabel_admin', [DashboardController::class, 'show'])->name('tabel_admin');
// tambah pengaduan
Route::get('create',[ComplaintController::class, 'form'])->name('create.form');

// simpan pengaduan
Route::post('create',[DashboardController::class, 'store'])->name('create.store');


//delete data
Route::delete('/tabel_user/{id}', [ComplaintController::class, 'destroy'])->name('tabel_user.destroy');

//delete data admin
Route::delete('/tabel_admin/{id}', [AdminController::class, 'destroy'])->name('tabel_admin.destroy');

//tampil data crud admin
Route::get('/crud-admin', [AdminController::class, 'index'])->name('crud-admin');

Route::get('/crud-admin/create', [AdminController::class, 'create'])->name('create.admin');
// simpan data crud admin
Route::post('/crud-admin', [AdminController::class, 'store'])->name('store.admin');

Route::get('/edit_pengaduan/{id}', [DashboardController::class, 'edit'])->name('edit_pengaduan');
Route::put('/edit_pengaduan/{id}', [DashboardController::class, 'update'])->name('update_pengaduan');

Route::get('/edit_admin/{id}', [AdminController::class, 'edit'])->name('edit_admin');
Route::put('/edit_admin/{id}', [AdminController::class, 'update'])->name('update_admin');

//response
Route::post('/complaints/{complaint_id}/response', [ResponseController::class, 'store'])->name('response.store');
Route::delete('/response/{id}', [ResponseController::class, 'destroy'])->name('response.destroy');
Route::get('/complaints/{id}', [ResponseController::class, 'show'])->name('complaint.show');
Route::get('/respon', [ResponseController::class, 'respon'])->name('complaint.respon');

//delete complaint(admin)
Route::delete('/tabel_admin/{id}', [ComplaintController::class, 'destroyAdmin'])->name('tabel_admin.destroy');
});

require __DIR__.'/auth.php';





















