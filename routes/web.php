<?php

use Illuminate\Support\Facades\Route;

// Define uma rota para a página inicial que aponta para a view 'projects.index'
Route::view('/', 'projects.index')->name('projects.index');

// Define uma rota para mostrar um projeto específico
Route::view('/project/{project}', 'projects.show')->name('project.show');


