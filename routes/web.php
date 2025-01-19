<?php
// routes/web.php
use App\Http\Controllers\TradeHistoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\WelcomeController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/trade-histories/create', [TradeHistoryController::class, 'create'])->name('trade_histories.create');
Route::post('/trade-histories', [TradeHistoryController::class, 'store'])->name('trade_histories.store');
Route::get('/trade-histories/search-user', [TradeHistoryController::class, 'searchUser']);

Route::get('index', [WelcomeController::class, 'index']);
Route::get('trade_history', [WelcomeController::class, 'trade_history']);
Route::get('trade', [WelcomeController::class, 'trade']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
