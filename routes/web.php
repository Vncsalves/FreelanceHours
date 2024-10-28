<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

// Define a rota inicial para a página de projetos
Route::get('/', [ProjectsController::class, 'index'])->name('projects.index');

// Define a rota para exibir um projeto específico baseado no ID ou slug
Route::get('/project/{project}', [ProjectsController::class, 'show'])->name('projects.show');



