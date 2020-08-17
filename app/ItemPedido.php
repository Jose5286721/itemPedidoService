<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model {
	protected $fillable = [
		"item_nro", "pedido_id", "producto_id", "cantidad",
	];
}
