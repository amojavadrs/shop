<?php

use Illuminate\Support\Facades\Route;
/*
 * admin
 */
Route::get('/admin', function () {
    return view('admin.master');
});

//menu

Route::get('/admin/create/gallery', [\App\Http\Controllers\admin\galleryController::class, 'create'])->name('admin.create.gallery');
Route::post('/admin/store/gallery', [\App\Http\Controllers\admin\galleryController::class, 'store'])->name('admin.store.gallery');
Route::get('/admin/list/gallery', [\App\Http\Controllers\admin\galleryController::class, 'list'])->name('admin.list.gallery');
Route::get('/admin/edit/gallery/{id}', [\App\Http\Controllers\admin\galleryController::class, 'edit'])->name('admin.edit.gallery');
Route::post('/admin/update/gallery/{id}', [\App\Http\Controllers\admin\galleryController::class, 'update'])->name('admin.update.gallery');
Route::delete('/admin/delete/gallery/{id}', [\App\Http\Controllers\admin\galleryController::class, 'destroy'])->name('admin.delete.gallery');
Route::get('admin/show/gallery/{id}', [\App\Http\Controllers\admin\galleryController::class, 'download'])->name('gallery.show');
/*
 *
 */
Route::resource('/admin/picture' , \App\Http\Controllers\admin\pictureController::class)->except(['update']);
Route::post('/admin/update/picture/{id}', [\App\Http\Controllers\admin\pictureController::class, 'update'])->name('picture.update');
Route::get('/admin/show/picture/{id}', [\App\Http\Controllers\admin\pictureController::class, 'download'])->name('picture.show');
/*
 *
 */
Route::resource('/admin/menu', \App\Http\Controllers\admin\menuController::class)->except(['update']);
Route::post('/admin/update/menu/{id}', [\App\Http\Controllers\admin\menuController::class, 'update'])->name('menu.update');
/*
 *
 */
Route::get('admin/picture/gallery/list',[\App\Http\Controllers\admin\picgalleryController::class, 'index'])->name('picturegal.index');
Route::get('admin/picture/gallery/show/{id}',[\App\Http\Controllers\admin\picgalleryController::class, 'show'])->name('picturegal.show');
Route::post('admin/picture/gallery/store',[\App\Http\Controllers\admin\picgalleryController::class, 'store'])->name('picturegal.store');
Route::get('admin/picture/gallery/edit/{id}',[\App\Http\Controllers\admin\picgalleryController::class, 'edit'])->name('picturegal.edit');
Route::post('admin/picture/gallery/update/{id}',[\App\Http\Controllers\admin\picgalleryController::class, 'update'])->name('picturegal.update');
Route::get('admin/picture/gallery/create',[\App\Http\Controllers\admin\picgalleryController::class, 'create'])->name('picturegal.create');
Route::delete('admin/picture/gallery/destroy/{id}',[\App\Http\Controllers\admin\picgalleryController::class, 'destroy'])->name('picturegal.destroy');
/*
 *
 */
Route::resource('/admin/page', \App\Http\Controllers\admin\pageController::class)->except(['update']);
Route::post('/admin/update/page/{id}', [\App\Http\Controllers\admin\pageController::class, 'update'])->name('page.update');
/*
 *
 */
Route::resource('/admin/category', \App\Http\Controllers\admin\categoryController::class)->except(['update']);
Route::post('/admin/update/category/{id}', [\App\Http\Controllers\admin\categoryController::class, 'update'])->name('category.update');
/*
 *
 */
Route::resource('/admin/attribute', \App\Http\Controllers\admin\attributeController::class)->except(['update']);
Route::post('/admin/update/attribute/{id}', [\App\Http\Controllers\admin\attributeController::class, 'update'])->name('attribute.update');
/*
 *
 */
//Route::resource('admin/product' , \App\Http\Controllers\admin\productController::class)->except(['update','store','create','index']);
Route::get('/admin/index/product' , [\App\Http\Controllers\admin\productController::class, 'index'])->name('product.index');
Route::post('/admin/update/product/{id}', [\App\Http\Controllers\admin\productController::class, 'update'])->name('product.update');
Route::get('admin/show/product/{id}', [\App\Http\Controllers\admin\productController::class, 'show'])->name('product.show');
Route::get('admin/creating/product' , [\App\Http\Controllers\admin\productController::class, 'creating'])->name('product.creating');
Route::get('/admin/create/product', [\App\Http\Controllers\admin\productController::class, 'create'])->name('product.create');
Route::post('/admin/store/product', [\App\Http\Controllers\admin\productController::class, 'store'])->name('product.store');
Route::get('admin/edit/product/{id}', [\App\Http\Controllers\admin\productController::class, 'edit'])->name('product.edit');
Route::delete('/admin/delete/product/{id}', [\App\Http\Controllers\admin\productController::class, 'destroy'])->name('product.destroy');
/*
 * client
 */
$menus=\App\Models\admin\Menu::all();
$pages=\App\Models\admin\Page::all();
$pictures=\App\Models\admin\Picture::all();
