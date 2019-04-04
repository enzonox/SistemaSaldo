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
//Grupo de Administracao
$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){// Gurpo de rotas com permissoes de acesso por autenticacao
    $this->post('deposito', 'BalanceController@depositoRecarregar')->name('deposito.consulta');
    $this->get('recarga', 'BalanceController@deposito')->name('balance.deposito');
    $this->get('saldos', 'BalanceController@index')->name('admin.balance');
    
    $this->get('/', 'AdminController@index')->name('admin.home');
});



$this->get('/', 'Site\SiteController@index')->name('home');



Auth::routes();

