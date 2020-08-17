<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$router->group(["prefix" => "api/items"], function () use ($router) {
	$router->get("", "ItemPedidoController@index");
	$router->get("/pedido/{idPedido}", "ItemPedidoController@showItemsByPedidoId");
	$router->get("/{id}", "ItemPedidoController@show");
	//$router->get("/{id}/pedido/{idPedido}", "ItemPedidoController@showItemByPedidoIdAndItemId");
	$router->post("", "ItemPedidoController@store");
	$router->put("/{id}", "ItemPedidoController@update");
	$router->delete("/pedido/{idPedido}", "ItemPedidoController@destroyItemsByPedidoId");
	$router->delete("/{id}", "ItemPedidoController@destroy");
	//$router->delete("/{id}/pedido/{idPedido}", "ItemPedidoController@destroyItemByPedidoIdAndItemId");
});
