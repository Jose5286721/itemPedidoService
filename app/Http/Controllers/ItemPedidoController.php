<?php
namespace App\Http\Controllers;
use App\ItemPedido;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemPedidoController extends Controller {
	use ApiResponse;
	public function index() {
		return $this->successResponse(ItemPedido::all());
	}
	public function store(Request $request) {
		$this->validate($request, [
			"pedido_id" => "required|min:1",
			"producto_id" => "required|min:1",
			"cantidad" => "required|min:1",
		]);
		$itemPedido = ItemPedido::create($request->all());
		return $this->successResponse($itemPedido, Response::HTTP_CREATED);
	}
	public function show($id) {
		$itemPedido = ItemPedido::findOrFail($id);
		return $this->successResponse($itemPedido);
	}

	public function showItemsByPedidoId($idPedido) {
		$itemsPedido = ItemPedido::where("pedido_id", $idPedido)->get();
		if ($itemsPedido->count() < 1) {
			return $this->errorResponse("No se encuentra los items del Pedido", Response::HTTP_NOT_FOUND);
		}
		return $this->successResponse($itemsPedido);
	}
	public function showItemByPedidoIdAndItemId($idPedido, $idItem) {
		$itemPedido = ItemPedido::where("item_nro", $idItem)->where("pedido_id", $idPedido)->get();
		if ($itemPedido->count() < 1) {
			return $this->errorResponse("No se encuentra el item", Response::HTTP_NOT_FOUND);
		}
		return $this->successResponse($itemPedido);
	}

	public function update(Request $request, $id) {
		$this->validate($request, [
			"producto_id" => "required|min:1",
			"cantidad" => "required|min:1",
		]);
		$itemPedido = ItemPedido::findOrFail($id);
		$itemPedido->fill($request->all());
		if ($itemPedido->isClean()) {
			return $this->errorResponse("Modifique la cantidad", Response::HTTP_UNPROCESSABLE_ENTITY);
		}
		$itemPedido->save();
		return $this->successResponse($itemPedido);
	}

	public function destroy($id) {
		$itemPedido = ItemPedido::findOrFail($id);
		$itemPedido->delete();
		return $this->successResponse($itemPedido);
	}
	public function destroyItemsByPedidoId($idPedido) {
		$itemsPedido = ItemPedido::where("pedido_id", $idPedido);
		if ($itemsPedido->count() < 1) {
			return $this->errorResponse("No existe items para el id del pedido", Response::HTTP_NOT_FOUND);
		}
		$itemsPedido->delete();
		return $this->successResponse($itemsPedido);
	}
}
