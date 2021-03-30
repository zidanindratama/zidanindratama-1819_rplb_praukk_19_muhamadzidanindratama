<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
	public function __construct(){
        $this->middleware([
           'auth',
		   'privilege:Administrator&Pelanggan'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$this->middleware([
           'privilege:Administrator&Pelanggan'
        ]);

        $items = \Cart::getContent();
		// $this->data['items'] =  $items;
        $data = [
            'items' => $items,
        ];
        return view('dashboard-petugas.cart.index', $data);
		// return view('dashboard-petugas.cart.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->middleware([
           'privilege:Administrator&Pelanggan'
        ]);

        $params = $request->except('_token');
		$menu = Menu::findOrFail($params['menu_id']);
		$itemQuantity =  $this->_getItemQuantity(md5($menu->id)) + $params['quantity'];
		$item = [
			'id' => md5($menu->id),
			'name' => $menu->name,
			'price' => $menu->price,
			'gambar' => $menu->gambar,
			'quantity' => $params['quantity'],
			'associatedModel' => $menu,
		];

        // var_dump($item);
		\Cart::add($item);
		Alert::success('Berhasil','Data pesanan berhasil dimasukkan kedalam keranjang');
        return redirect('/order');
    }

    private function _getItemQuantity($itemId)
	{
		$this->middleware([
           'privilege:Administrator&Pelanggan'
        ]);

		$items = \Cart::getContent();
		$itemQuantity = 0;
		if ($items) {
			foreach ($items as $item) {
				if ($item->id == $itemId) {
					$itemQuantity = $item->quantity;
					break;
				}
			}
		}

		return $itemQuantity;
	}

    private function _getCartItem($cartID)
	{
		$this->middleware([
           'privilege:Administrator&Pelanggan'
        ]);

		$items = \Cart::getContent();

		return $items[$cartID];
	}

    public function update(Request $request)
	{
		$this->middleware([
           'privilege:Administrator&Pelanggan'
        ]);

		$params = $request->except('_token');

		 if (!isset($items)){
            Alert::error('Gagal','Data pesanan gagal diubah');
            return redirect('/carts');
        }

		if ($items = $params['items']) {
			foreach ($items as $cartID => $item) {
				$cartItem = $this->_getCartItem($cartID);
				\Cart::update(
					$cartID,
					[
						'quantity' => [
							'relative' => false,
							'value' => $item['quantity'],
						],
					]
				);
			}
        }
        Alert::success('Berhasil','Data pesanan berhasil diubah');
        return redirect('/carts');
	}

    public function destroy($id)
	{
		$this->middleware([
           'privilege:Administrator&Pelanggan'
        ]);
		
		\Cart::remove($id);
		Alert::success('Berhasil','Data pesanan berhasil dihapus');
		return redirect('carts');
	}
}
