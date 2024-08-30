<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AccountReportController;
use App\Http\Controllers\Admin\AccountTransactionsReportController;
use App\Http\Controllers\Admin\BalancesReportController;
use App\Http\Controllers\Admin\TerminalsOnlineReportController;
use App\Http\Controllers\Admin\TerminalTransactionsReportController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CommonController;
use App\Http\Controllers\Admin\ProductlistController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\UploadCsvController;
use App\Http\Controllers\Admin\VoucherProcurementController;
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
    return view('admin.login');
})->name('login')->middleware(['guest','removePublic']);

Route::post('login',[LoginController::class, 'index'])->name('user.login')->middleware(['removePublic']);

Route::middleware(['user','removePublic', 'admin'])->group(function () {
    Route::get('dashboard',[DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('account-report',[AccountReportController::class, 'index'])->name('user.reports.account');
    Route::get('account-transactions-report',[AccountTransactionsReportController::class, 'index'])->name('user.reports.account-transactions');
    Route::get('balance-report',[BalancesReportController::class, 'index'])->name('user.reports.balance');
    Route::get('terminals-online-report',[TerminalsOnlineReportController::class, 'index'])->name('user.reports.terminals-online');
    Route::get('terminal-transactions-report',[TerminalTransactionsReportController::class, 'index'])->name('user.reports.terminal-transactions');
    Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout');

    /***** PRODUCTS *******/
    Route::resource('products', ProductsController::class);

    /*Common*/
    Route::post('common/changestatus', [CommonController::class,'changeStatus'])->name('common.changestatus');

    /***** PRODUCT LIST FOR SHOP *****/
    Route::get('shop-now',[ProductlistController::class, 'index'])->name('productList.index');
    Route::post('add-to-cart',[ProductlistController::class, 'addToCart'])->name('add.to.cart');
    Route::post('orders/update_qty', [ProductlistController::class, 'updateQty'])->name('orders.update_qty');

    Route::resource('carts', CartController::class)->except([
        'create', 'store', 'edit', 'update', 'show'
    ]);

    Route::resource('upload-csv', UploadCsvController::class)->except([
        'index', 'edit', 'update', 'show', 'delete'
    ]);

    Route::post('voucher-procurement/new-div', [VoucherProcurementController::class, 'addNewdiv'])->name('voucher-procurement.new-div');
    Route::resource('voucher-procurement', VoucherProcurementController::class)->except([
        'index', 'edit', 'update', 'show', 'delete'
    ]);

    Route::fallback(function () {
        abort(404);
    });

    // Apply-coupon
    Route::post('apply-coupon',[CouponController::class, 'applyCoupon'])->name('productList.apply-coupon');

    /*404 Page*/
    Route::get('404', [CommonController::class, 'page_not_found'])->name('errors.404');
});
