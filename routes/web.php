<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Gestão do Dashboard
Route::group(['prefix' => 'painel', 'middleware' => ['auth'], 'web'], function ($route) {
    
    //Estilos Musicais
    $route->get('estilos','Painel\EstilosController@index');
    $route->get('estilos/cadastrar','Painel\EstilosController@cad');
    $route->post('estilos/cadastrar','Painel\EstilosController@cadGo');
    $route->get('estilos/editar/{id}','Painel\EstilosController@edit');
    $route->post('estilos/editar/{id}','Painel\EstilosController@editGo');
    $route->get('estilos/deletar/{id}','Painel\EstilosController@delete');
    $route->post('estilos/pesquisar','Painel\EstilosController@pesquisar');

    //Albuns
    $route->get('albuns','Painel\AlbunController@index');
    $route->get('album/cadastrar','Painel\AlbunController@cad');
    $route->post('album/cadastrar','Painel\AlbunController@cadGo');
    $route->get('album/editar/{id}','Painel\AlbunController@edit');
    $route->post('album/editar/{id}','Painel\AlbunController@editGo');
    $route->get('album/deletar/{id}','Painel\AlbunController@delete');
    $route->post('album/pesquisar','Painel\AlbunController@pesquisar');

    //Músicas
    $route->get('musicas','Painel\MusicaController@index');
    $route->get('musica/cadastrar','Painel\MusicaController@cad');
    $route->post('musica/cadastrar','Painel\MusicaController@cadGo');
    $route->get('musica/editar/{id}','Painel\MusicaController@edit');
    $route->post('musica/editar/{id}','Painel\MusicaController@editGo');
    $route->get('musica/deletar/{id}','Painel\MusicaController@delete');
    $route->post('musica/pesquisar','Painel\MusicaController@pesquisar');

    //Rota inicial do Dashboard
    $route->get('/','Painel\PainelController@index');
});;
//Rota de autenticação
//Auth::routes();
Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


//Homepage Laramusic
Route::get('/','Site\SiteController@index');