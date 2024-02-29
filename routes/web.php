<?php

use App\Models\Stocke;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderitemController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UpdateProfileController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
   //Profile routes
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profileedit', [UpdateProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profileupdate' , [UpdateProfileController::class , 'update'])->name('profile.update');
    Route::post('/logout', [ProfileController::class, 'destroy'])->name('logout');
   //Dashboard routes
    Route::get("/dashboard", [DashboardController::class, 'index'])->name('dashboard.index');
   //Categories routes
    Route::get("/categories", [CategorieController::class, 'index'])->name('categories.index');
    Route::get("/categoriecreate", [CategorieController::class, 'create'])->name('categories.create');
    Route::post("/categoriestore", [CategorieController::class, 'store'])->name('categories.store');
    Route::get('categoriesedite/{id}' , [CategorieController::class, 'edit'])->name('categories.edit');
    Route::put('categories/update/{id}' , [CategorieController::class, 'update'])->name('categories.update');
    Route::delete('categories/delelte/{id}' , [CategorieController::class, 'destroy'])->name('categories.destroy');
  //Menus routes
    Route::get('/menuscreate' , [MenusController::class, 'create'])->name('menus.create');
    Route::post("menustore" , [MenusController::class, 'store'])->name('menus.store');
    Route::get('menus' , [MenusController::class, 'index'])->name('menus.index');
    Route::get('menusedit/{id}' , [MenusController::class, 'edit'])->name('menus.edit');
    Route::put('menusupdate/{id}' , [MenusController::class, 'update'])->name('menus.update');
    Route::get('menusdelete/{id}' , [MenusController::class, 'destroy'])->name('menus.destroy');
    //Stockes routes
    Route::get('stockescreate' , [StockeController::class , 'create'])->name('stockes.create');
    Route::post('stockesstore', [StockeController::class , 'store'])->name('stockes.store');
    Route::get('stockes' , [StockeController::class , 'index'])->name('stockes.index');
    Route::get('stockeedit/{id}', [StockeController::class , 'edit'])->name('stockes.edit');
    Route::put('stockeupdate/{id}', [StockeController::class , 'update'])->name('stockes.update');
    Route::get('stockedelete/{id}', [StockeController::class , 'destroy'])->name('stockes.destroy');
    //Order routes
    Route::get('ordercreate' , [OrderController::class , 'create'])->name('order.create');
    Route::post('ordersstore' , [OrderController::class , 'store'])->name('orders.store');
    Route::get('orders' ,  [OrderController::class , 'index'])->name('orders.index');
    Route::get('ordersitemscreate' , [OrderitemController::class , 'create'])->name('ordersitemscreate.create');
    Route::post('ordersitemsstore' , [OrderitemController::class , 'store'])->name('orderitems.store');
    Route::get('orderedit/{id}' , [OrderitemController::class , 'edit'])->name('orders.edit');
    Route::get('orderdelete/{id}' , [OrderController::class , 'destroy'])->name('orders.delete');
    

    //Customer routes
    Route::get('customers' , [CustomerController::class , 'index'])->name('customers.index');
    Route::get('customercreate' , [CustomerController::class , 'create'])->name('customers.create');
    Route::post('customersstore' , [CustomerController::class , 'store'])->name('customers.store');
    Route::get('customers' , [CustomerController::class , 'index'] )->name('customers.index');
    Route::get('customersedit/{id}' , [CustomerController::class , 'edit'] )->name('customers.edit');
    Route::get('customersdelete/{id}' , [CustomerController::class , 'destroy'] )->name('customers.delete');
    Route::put('customersupdate/{id}' , [CustomerController::class ,'update'] )->name('customers.update');

    //Invoices routes
    Route::get('invoicecreate' ,  [InvoiceController::class , 'create'])->name('invoices.create');
    Route::post('invoicesstore', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
     
    //Personnel routes
    Route::get('/personnelcreate', [PersonnelController::class, 'create'])->name('personnel.create');
    Route::post('/personnelstore', [PersonnelController::class , 'store'])->name('personnel.store');
    Route::get('personnels' , [PersonnelController::class , 'index'])->name('personnel.index');

    // Search routes
    Route::get('/categorie', [CategorieController::class, 'search'])->name('categorie.search');
    Route::get('/menu', [CategorieController::class, 'search'])->name('menu.search');
    Route::get('/stockess', [StockeController::class, 'search'])->name('stocke.search');
    Route::get('/order' , [OrderController::class, 'search'])->name('order.search');
    Route::get('/customer' , [CustomerController::class, 'search'])->name('customer.search');
    Route::get('/invoice' , [InvoiceController::class, 'search'])->name('invoices.search');
    Route::get('/personnnel' , [PersonnelController::class, 'search'])->name('personnnel.search');
});



Route::get('/reservation' , [ReservationController::class, 'index']);
Route::post('/reservation/post' , [ReservationController::class , "store"] )->name('reservation.store');




require __DIR__.'/auth.php';
