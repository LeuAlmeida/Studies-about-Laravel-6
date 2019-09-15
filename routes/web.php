<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});


// Parâmetro das Rotas
Route::get('/ola/{nome}/{sobrenome}', function($nome, $sobrenome) {
    echo "Olá! Seja bem vindo, $nome $sobrenome!";
});


// Parâmetros Opcionais
Route::get('/seunome/{nome?}', function($nome=null) {
    if(isset($nome))
        echo "Olá! Seja bem vindo, $nome!";
    else
        echo "Você não digitou nenhum nome.";
});


// Parâmetro com Regras
Route::get('/rotacomregras/{nome}/{n}', function($nome, $n) {
    for($i=0;$i<$n;$i++)
    echo "Olá! Seja bem vindo, $nome!" . "<br/>";
})->where('nome','[A-Za-z]+')->where('n','[0-9]+');


// Agrupamento de Rotas
Route::prefix('/app')->group(function() {
    
    Route::get('/', function() {
        return view('app');
    });

    Route::get('/user', function() {
        return view('user');
    });

    Route::get('/profile', function() {
        return view('profile');
    });

});


// Nomeando Rotas
Route::prefix('/aplicacao')->group(function() {
    
    Route::get('/', function() {
        return view('app');
    })->name('app');

    Route::get('/user', function() {
        return view('user');
    })->name('app.user');

    Route::get('/profile', function() {
        return view('profile');
    })->name('app.profile');

});

Route::get('/produtos', function() {
    echo "<h1>Produtos</h1>";
    echo "<ol>";
    echo "<li>Notebook </li>";
    echo "<li>Impressora </li>";
    echo "<li>Mouse </li>";
    echo "</ol>";
})->name('meusprodutos');

// Redirecionando Requisições
Route::redirect('meusprodutos1', 'produtos', 301);

Route::get('todosprodutos2', function() {
    return redirect()->route('meusprodutos');
});

////////////////////////////////////////////////////

Route::post('/requisicoes', function(Request $request) {
    return 'Hello POST';
});

Route::delete('/requisicoes', function(Request $request) {
    return 'Hello DELETE';
});

Route::put('/requisicoes', function(Request $request) {
    return 'Hello PUT';
});

Route::patch('/requisicoes', function(Request $request) {
    return 'Hello PATCH';
});

Route::options('/requisicoes', function(Request $request) {
    return 'Hello OPTIONS';
});

Route::get('/requisicoes', function(Request $request) {
    return 'Hello GET';
});