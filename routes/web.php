<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Home;
use App\Models\ItemImage;
use App\Models\Item;

use App\Models\Banner;
use App\Models\AboutUs;
use App\Models\Cart;
use App\Models\Order;
use App\Models\RelatedLinks;








// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


route::get('/', [Admin::class, 'index'])->name('index');
// route::get('/home', [Home::class, 'home'])->name('home');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//==============================================================item route 


Route::get('/items', [Admin::class, 'viewItems'])->name('view-items');
route::get('/new-item', [Admin::class, 'newItemPage'])->name('newItemPage');
route::post('/add_item', [Admin::class, 'add_item']);
Route::post('/updateItem/{id}', [Admin::class, 'updateItem']);
route::get('/delete_item/{id}', [Admin::class, 'delete_item']);

//==============================================================item route 


// Route::get('/Banner', [Home::class, 'viewBanner'])->name('view-banner');
route::get('/new-banner', [Home::class, 'newBannerPage'])->name('newBannerPage');
route::post('/add_banner', [Home::class, 'add_banner']);

Route::get('/edit_updateBanner/{id}', [Home::class, 'edit_banner'])->name('editUpdateBanner');
Route::post('/updateBanner/{id}', [Home::class, 'updateBanner'])->name('updateBanner');

route::get('/newAboutUsPage', [Home::class, 'newAboutUsPage'])->name('newAboutUsPage');
Route::post('/add_aboutUs', [Home::class, 'add_aboutUs'])->name('add_aboutUs');

Route::get('/edit_about_us/{id}', [Home::class, 'edit_aboutUs'])->name('edit_about_us');
Route::post('/update_about_us/{id}', [Home::class, 'update_aboutUs'])->name('update_about_us');

route::get('/related_link_view', [Home::class, 'related_link_view'])->name('related_link_view');
Route::post('/add_related_link', [Home::class, 'add_related_link'])->name('add_related_link');

route::get('/loginPage', [Home::class, 'loginPage'])->name('loginPage');

route::get('/home', [Home::class, 'home'])->name('home');

Route::get('/home2', [Home::class, 'home2'])->name('home2');

Route::get('/product', [Home::class, 'product'])->name('product');


Route::get('/edit_related_link/{id}', [Home::class, 'edit_related_link'])->name('edit_related_link');
Route::post('/update_related_link/{id}', [Home::class, 'update_related_link'])->name('update_related_link');

// Route::post('/updateItem/{id}', [Admin::class, 'updateItem']);
// route::get('/delete_item/{id}', [Admin::class, 'delete_item']);
//============================================================== Cart

Route::get('/cart', [Home::class, 'show_cart'])->name('show_cart');
Route::post('/add_cart/{id}', [Home::class, 'add_cart'])->name('add_cart');
Route::delete('/cart/{id}', [Home::class, 'remove_cart'])->name('remove_cart');

// Route::get('/remove/{id}', [Home::class, 'remove'])->name('remove');
Route::post('/checkout', [Home::class, 'checkout'])->name('checkout');
Route::get('/orders', [Home::class, 'order'])->name('order');




//============================================================== converstion rate 


Route::post('/admin/conversion-rate', [Admin::class, 'updateConversionRate'])->name('updateConversionRate');




Route::get('/admins', [Admin::class, 'admins'])->name('admins');
route::get('/delete_user/{id}', [Admin::class, 'delete_user']);
Route::post('/updateUser/{id}', [Admin::class, 'updateUser']);




// route::get('/addBlog', [Admin::class, 'addBlog'])->name('addBlog');
// route::post('/add_blog', [Admin::class, 'add_blog']);
// route::get('/view-blogs', [Admin::class, 'viewBlogs'])->name('view-blogs');
// route::get('/delete_blog/{id}', [Admin::class, 'delete_blog']);
// route::get('/editBlog/{id}', [Admin::class, 'editBlog']);
// // route::post('/updateBlog/{id}', [Admin::class, 'updateBlog']);
// Route::post('/updateBlog/{id}', [Admin::class, 'updateBlog'])->name('updateBlog');





route::get('/addAdmin', [Admin::class, 'addAdmin'])->name('addAdmin');



require __DIR__.'/auth.php';

