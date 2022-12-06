<?php
use App\Http\Controllers\CourtainsController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TrabajosController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'inicio')->name('inicio');
Route::get('buscar', [SearchController::class, 'index'])->name('search');

Route::view('mantenimiento', 'mantenimiento')->name('mantenimiento');
Route::get('mantenimiento', [MantenimientoController::class, 'index'])->name('mantenimiento');
Route::get('mantenimiento/{element}', [MantenimientoController::class, 'description'])->name('mantenimiento.description');
Route::post('mantenimiento', [MantenimientoController::class, 'store'])->name('mantenimiento.store.mantenimiento');
Route::patch('mantenimiento/{element}', [MantenimientoController::class, 'update'])->name('mantenimiento.update.mantenimiento');
Route::delete('mantenimiento/{element}', [MantenimientoController::class, 'delete'])->name('mantenimiento.delete.mantenimiento');

Route::get('cortinas', [CourtainsController::class, 'index'])->name('cortinas.modelos');

Route::post('cortinas', [CourtainsController::class, 'store'])->name('modelos.store.modelos');

Route::patch('cortinas/{model}', [CourtainsController::class, 'update'])->name('modelos.update.modelos');
Route::delete('cortinas/{model}', [CourtainsController::class, 'delete'])->name('modelos.delete.modelos');

Route::get('cortinas/{element}', [CourtainsController::class, 'description'])->name('cortinas.description');
Route::patch('cortinas/{model}', [CourtainsController::class, 'update'])->name('modelos.update.modelos');

Route::view('contacto', 'contacto')->name('contacto');
Route::post('contacto', 'MessagesController@store')->name('contacto.send');

Route::view('catalogo', 'galeria')->name('galeria');
Route::get('catalogo', [GaleryController::class, 'index'])->name('galeria');
Route::get('catalogo/{element}', [GaleryController::class, 'description'])->name('galeria.description');
Route::post('catalogo', [GaleryController::class, 'store'])->name('galeria.store.galeria');
Route::patch('catalogo/{element}', [GaleryController::class, 'update'])->name('galeria.update.galeria');
Route::delete('catalogo/{element}', [GaleryController::class, 'delete'])->name('galeria.delete.galeria');


Route::get('trabajos', [TrabajosController::class, 'index'])->name('trabajos');
Route::get('trabajos/{element}', [TrabajosController::class, 'description'])->name('trabajos.description');
Route::post('trabajos', [TrabajosController::class, 'store'])->name('trabajos.store.trabajos');
Route::patch('trabajos/{element}', [TrabajosController::class, 'update'])->name('trabajos.update.trabajos');
Route::delete('trabajos/{element}', [TrabajosController::class, 'delete'])->name('trabajos.delete.trabajos');

Route::view('about', 'about')->name('about');

Auth::routes(['register' => true]);
