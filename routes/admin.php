<?php

Route::group(['namespace' => 'Admin'], function() {

    Route::get('/', 'HomeController@index')->name('admin.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

    // Verify
    Route::post('email/resend', 'Auth\VerificationController@resend')->name('admin.verification.resend');
    Route::get('email/verify', 'Auth\VerificationController@show')->name('admin.verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('admin.verification.verify');
    
    Route::get('clientes/listagem', 'HomeController@ListaClientes')->name('admin.clientes.list');
    Route::post('inserircliente', 'HomeController@InserirCliente')->name('admin.clientes.inserir');
    Route::post('editarcliente', 'HomeController@EditarCliente')->name('admin.clientes.editar');
    Route::post('deletarcliente', 'HomeController@DeletarCliente')->name('admin.clientes.deletar');
    
    Route::get('listagem', 'HomeController@ListaAdmins')->name('admins.list');
    Route::post('inseriradmin', 'HomeController@InserirAdmin')->name('admin.inserir');
    Route::post('editaradmin', 'HomeController@EditarAdmin')->name('admin.editar');
    Route::post('deletaradmin', 'HomeController@DeletarAdmin')->name('admin.deletar');
});
