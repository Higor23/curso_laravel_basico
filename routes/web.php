<?php

use Illuminate\Support\Facades\Route;

// Definição de rotas

Route::post('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contato', function () {
    return view('site.contact');
});

// =======================================

// *Rota any

//  Permite o acesso com qualquer verbo http.

Route::any('any', function (){
    return 'Any';
});


// *Rota match

//  Permite o acesso http somente por meio dos verbos(parâmetros) passados no array.

Route::match(['get', 'post'], '/match', function (){
    return 'Match';
});
// =========================================


// *Rotas com parâmetros na url

Route::get('/categorias/{flag}', function ($flag){
    return "Produtos da categoria: {$flag}";
});

Route::get('/categorias/{flag/posts}', function ($flag){
    return "Produtos da categoria: {$flag}";
});

Route::get('/produtos/{idProduct?}', function ($idProduct = ''){
    return "Produto(s): {$idProduct}";
}); // Parâmetros opcionais. Utiliza-se a ? para isso.

// =========================================
// *Redirecionamento de rotas.

// Route::get('/redirect1', function () {
//     return redirect('redirect2');
// });

Route::get('/redirect2', function () {
    return 'redirect2';
});

// ou mais simples ainda:

Route::redirect('/redirect1', '/redirect2');

// =========================================
// *Retornando diretamente para uma view. Deve ser usado somente se a lógica da view for muito simples.

Route::view('/view', 'welcome');

// =========================================
// *Rotas nomeadas. Permitem alterar o nome da rota sem comprometer o funcionamento
// da mesma, pois esta será chamada pelo name.

Route::get('/nome-url', function (){
    return 'hey hey';
})->name('url.name');

Route::get('/redirect3', function () {
    return redirect()->route('url.name');
});
