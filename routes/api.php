<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotController;
use App\Http\Controllers\paiementsController;

Route::post('bot', [BotController::class, 'handleChat']);
Route::post('webhook', [BotController::class, 'sendMessageTe']);
Route::get('webhook', [BotController::class, 'verifyToken']);
Route::get('tester', [BotController::class, 'sendMessageTe']);
Route::get('vote/{reference}', [paiementsController::class, 'inialise_pay']);
Route::get('changeStatut/reference', [paiementsController::class, 'reglement']);
