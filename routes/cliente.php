<?php

Route::group(['namespace' => 'Cliente'], function() {

    Route::get('/', 'HomeController@index')->name('cliente.dashboard');

    // Login
    Route::get('login', function () {
        return view('cliente.auth.login');
    })->name('cliente.login');

    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('cliente.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('cliente.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('cliente.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('cliente.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('cliente.password.reset');

    // Verify
    Route::post('email/resend', 'Auth\VerificationController@resend')->name('cliente.verification.resend');
    Route::get('email/verify', 'Auth\VerificationController@show')->name('cliente.verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('cliente.verification.verify');

    //Rotas para os produtos
    Route::get('produtos', 'ProdutoController@ListarProdutos')->name('cliente.produtos');
    Route::post('produto/novo', 'ProdutoController@NovoProduto')->name('cliente.produtos.novo');
    Route::post('produto/editar', 'ProdutoController@EditarProduto')->name('cliente.produtos.editar');
    Route::post('produto/deletar', 'ProdutoController@DeletarProduto')->name('cliente.produtos.deletar');
    
    //Rota para as entradas
    Route::get('entradas', 'ProdutoController@ListarEntradas')->name('cliente.entradas');
    Route::post('entrada/nova', 'ProdutoController@NovaEntrada')->name('cliente.entrada.nova');    
    
    //Rota para as saídas
    Route::get('saidas', 'ProdutoController@ListarSaidas')->name('cliente.saidas');
    Route::post('saida/nova', 'ProdutoController@NovaSaida')->name('cliente.saida.nova');    
    
    //Rota para o estoque
    Route::get('estoque', 'ProdutoController@ListarEstoque')->name('cliente.estoque');

    //Rota para os funcionários
    Route::get('funcionarios', 'HomeController@ListarFuncionarios')->name('cliente.funcionarios');
    Route::post('funcionario/novo', 'HomeController@NovoFuncionario')->name('cliente.inserir.funcionario');
    Route::post('funcionario/editar', 'HomeController@EditarFuncionario')->name('cliente.funcionario.editar');
    Route::post('funcionario/deletar', 'HomeController@DeletarFuncionario')->name('cliente.funcionario.deletar');
   
    Route::get('relatorios/produtos', 'ProdutoController@RelatorioProdutosExcel')->name('relatorio.produtos.excel');
    Route::get('relatorios/estoque', 'ProdutoController@RelatorioEstoqueExcel')->name('relatorio.estoque.excel');
});
