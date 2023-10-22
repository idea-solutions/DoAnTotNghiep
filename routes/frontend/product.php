<?php

use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Frontend\Product\ProductController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::group(['as' => 'products.', 'prefix' => 'products',], function () {
    Route::get('index', [ProductController::class, 'index'])->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent(homeRoute())
                ->push(__('Product management'), route('frontend.products.index'));
        });

    Route::get('create', [ProductController::class, 'create'])->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent(homeRoute())
                ->push(__('Product management'), route('frontend.products.index'))
                ->push(__('Create new Product'));
        });

    Route::post('store', [ProductController::class, 'store'])->name('store');

    Route::get('{categorySlug}/edit', [ProductController::class, 'edit'])->name('edit')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent(homeRoute())
                ->push(__('Product management'), route('frontend.products.index'))
                ->push(__('Update Product'));
        });

    Route::put('{slug}/update', [ProductController::class, 'update'])->name('update');

    Route::delete('{categorySlug}/destroy', [ProductController::class, 'destroy'])->name('destroy');
});
