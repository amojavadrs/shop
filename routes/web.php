<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\admin\productController;


/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/
Route::get('client/profile/{id}',[\App\Http\Controllers\clientController::class,'profile_client'])->name('profile.pic');
Route::get('/',[\App\Http\Controllers\clientController::class,'index'])->name('firstpage');
Route::middleware('auth')->prefix('/client')->group(function () {
    Route::get('/', function () {
        // Ensure only clients can access
        if (Auth::user()->role !== 'client') {
            return redirect()->route('login'); // Redirect to login if not a client
        }
        return view('client.home');
    })->name('home');

    Route::get('/home', function () {
        if (Auth::user()->role !== 'client') {
            return redirect()->route('login');
        }
        return view('client.home');
    });
});

    Route::get('/profile', [\App\Http\Controllers\UserController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [\App\Http\Controllers\UserController::class, 'update'])->name('profile.update');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('/admin')->group(function () {
    // Admin login route (without authentication)
    Route::get('/login', function () {
        return view('auth.admin-login');
    })->name('admin.login');

    Route::middleware('auth')->group(function () {
        Route::get('/', function () {
            // Ensure only admins can access
            if (Auth::user()->role !== 'admin') {
                return redirect()->route('admin.login'); // Redirect to admin login if not an admin
            }
            return view('admin.master');
        })->name('admin.dashboard');

        Route::get('/profile', function () {
            if (Auth::user()->role !== 'admin') {
                return redirect()->route('admin.login');
            }
            $user = Auth::user(); // Get the logged-in admin data
            return view('admin.profile', compact('user')); // Return the profile view
        })->name('admin.profile');
    });
    Route::get('/login', function () {
        if (Auth::check() && Auth::user()->role === 'client') {
            return redirect()->route('home'); // Redirect clients to their home page
        }

        return view('auth.admin-login');
    })->name('admin.login');
    /*
 * Gallery Routes
 */
    Route::get('/create/gallery', [\App\Http\Controllers\admin\galleryController::class, 'create'])->name('admin.create.gallery');
    Route::post('/store/gallery', [\App\Http\Controllers\admin\galleryController::class, 'store'])->name('admin.store.gallery');
    Route::get('/list/gallery', [\App\Http\Controllers\admin\galleryController::class, 'list'])->name('admin.list.gallery');
    Route::get('/edit/gallery/{id}', [\App\Http\Controllers\admin\galleryController::class, 'edit'])->name('admin.edit.gallery');
    Route::post('/update/gallery/{id}', [\App\Http\Controllers\admin\galleryController::class, 'update'])->name('admin.update.gallery');
    Route::delete('/delete/gallery/{id}', [\App\Http\Controllers\admin\galleryController::class, 'destroy'])->name('admin.delete.gallery');
    Route::get('/show/gallery/{id}', [\App\Http\Controllers\admin\galleryController::class, 'download'])->name('gallery.show');

    /*
     * Picture Routes
     */
    Route::resource('/picture', \App\Http\Controllers\admin\pictureController::class)->except(['update']);
    Route::post('/update/picture/{id}', [\App\Http\Controllers\admin\pictureController::class, 'update'])->name('picture.update');
    Route::get('/show/picture/{id}', [\App\Http\Controllers\admin\pictureController::class, 'download'])->name('picture.show');

    /*
     * Menu Routes
     */
    Route::resource('/menu', \App\Http\Controllers\admin\menuController::class)->except(['update']);
    Route::post('/update/menu/{id}', [\App\Http\Controllers\admin\menuController::class, 'update'])->name('menu.update');

    /*
     * Picture Gallery Routes
     */
    Route::get('/picture/gallery/list',[\App\Http\Controllers\admin\picgalleryController::class, 'index'])->name('picturegal.index');
    Route::post('/picture/gallery/store',[\App\Http\Controllers\admin\picgalleryController::class, 'store'])->name('picturegal.store');
    Route::get('/picture/gallery/edit/{id}',[\App\Http\Controllers\admin\picgalleryController::class, 'edit'])->name('picturegal.edit');
    Route::post('/picture/gallery/update/{id}',[\App\Http\Controllers\admin\picgalleryController::class, 'update'])->name('picturegal.update');
    Route::get('/picture/gallery/create',[\App\Http\Controllers\admin\picgalleryController::class, 'create'])->name('picturegal.create');
    Route::delete('/picture/gallery/destroy/{id}',[\App\Http\Controllers\admin\picgalleryController::class, 'destroy'])->name('picturegal.destroy');
    /*
     *
     */
    Route::resource('/page', \App\Http\Controllers\admin\pageController::class)->except(['update']);
    Route::post('/update/page/{id}', [\App\Http\Controllers\admin\pageController::class, 'update'])->name('page.update');
    /*
     *
     */
    Route::resource('/category', \App\Http\Controllers\admin\categoryController::class)->except(['update']);
    Route::post('/update/category/{id}', [\App\Http\Controllers\admin\categoryController::class, 'update'])->name('category.update');
    /*
     *
     */
    Route::resource('/attribute', \App\Http\Controllers\admin\attributeController::class)->except(['update']);
    Route::post('/update/attribute/{id}', [\App\Http\Controllers\admin\attributeController::class, 'update'])->name('attribute.update');
    /*
     *
     */
//Route::resource('admin/product' , \App\Http\Controllers\admin\productController::class)->except(['update','store','create','index']);
    Route::get('/index/product' , [\App\Http\Controllers\admin\productController::class, 'index'])->name('product.index');
    Route::post('/update/product/{id}', [\App\Http\Controllers\admin\productController::class, 'update'])->name('product.update');
    Route::get('/creating/product' , [\App\Http\Controllers\admin\productController::class, 'creating'])->name('product.creating');
    Route::get('/create/product', [\App\Http\Controllers\admin\productController::class, 'create'])->name('product.create');
    Route::post('/store/product', [\App\Http\Controllers\admin\productController::class, 'store'])->name('product.store');
    Route::get('/edit/product/{id}', [\App\Http\Controllers\admin\productController::class, 'edit'])->name('product.edit');
    Route::delete('/delete/product/{id}', [\App\Http\Controllers\admin\productController::class, 'destroy'])->name('product.destroy');
    /*
     * client
     */
});


// In your web.php file

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [\App\Http\Controllers\CartController::class, 'store'])->name('cart.add');
Route::put('/cart/{productId}', [\App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{productId}', [\App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/cart/clear', [\App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');
Route::get('admin/picture/gallery/show/{id}',[\App\Http\Controllers\admin\picgalleryController::class, 'show'])->name('picturegal.show');
Route::get('admin/show/product/{id}', [\App\Http\Controllers\admin\productController::class, 'show'])->name('product.show');
Route::get('product/details/{id}',[\App\Http\Controllers\clientController::class,'details'])->name('product.details');
Auth::routes();

