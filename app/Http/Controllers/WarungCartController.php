<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class WarungCartController extends Controller
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
        $items = \Cart::getContent();
		// $this->data['items'] =  $items;
        $data = [
            'items' => $items,
        ];
        return view('default.cart.index', $data);
		// return view('dashboard-petugas.cart.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        dd($item['gambar']);
		// \Cart::add($item);
		// Alert::success('Berhasil','Data pesanan berhasil dimasukkan kedalam keranjang');
        // return redirect('/warung');
    }

    private function _getItemQuantity($itemId)
	{
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
		$items = \Cart::getContent();

		return $items[$cartID];
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
	{
		$params = $request->except('_token');
        if (\Cart::isEmpty()) {
            Alert::error('Gagal','Data pesanan gagal diubah');
			return redirect('/keranjang');
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
        return redirect('/keranjang');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Cart::remove($id);
		Alert::success('Berhasil', 'Data pesanan berhasil dihapus');
		return redirect('keranjang');
    }
}
