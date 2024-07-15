<?php

Route::post('chapa/payment', 'Musie\LaravelChapa\Controllers\ChapaController@initializePayment')->name('chapa.payment');
Route::get('chapa/callback', 'Musie\LaravelChapa\Controllers\ChapaController@handleCallback')->name('chapa.callback');
Route::get('chapa/verify/{tx_ref}', 'Musie\LaravelChapa\Controllers\ChapaController@verifyPayment')->name('chapa.verify');
