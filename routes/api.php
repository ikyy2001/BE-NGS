<?php

use App\Http\Controllers\Api\AccordionShowcaseController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\PopupBannerController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\TestimonialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public REST API Routes for Astro / React Frontend
|--------------------------------------------------------------------------
*/

Route::get('/popup-banners', [PopupBannerController::class, 'index']);
Route::get('/accordion-showcases', [AccordionShowcaseController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{slug}', [ProjectController::class, 'show']);
Route::get('/testimonials', [TestimonialController::class, 'index']);
Route::get('/faqs', [FaqController::class, 'index']);
Route::get('/teams', [TeamController::class, 'index']);
Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/brands', [BrandController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{slug}', [PostController::class, 'show']);

Route::post('/inquiries', [InquiryController::class, 'store'])->middleware('throttle:10,1');
Route::post('/quotes', [QuoteController::class, 'store'])->middleware('throttle:10,1');

