# Cart

--- 

- [Construct()](#section-1)
- [Index()](#section-2)
- [Create()](#section-3)
- [_getItemQuantity()](#section-4)
- [_getCartItem()](#section-5)
- [update()](#section-6)
- [destroy()](#section-7)

>{primary} Halo, ini adalah halaman dokumentasi cart

--- 
# Controller Cart
---
<a name="section-1">
### function __construct()
```php
<?php
    public function __construct(){
        $this->middleware([
           'auth',
           'privilege:Administrator&Pelanggan'
        ]);
    }
```

---
<a name="section-2">
### function index()
```php
<?php
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
?>
```
---

<a name="section-3">
### function store()
```php
<?php
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

        // var_dump($item);
		\Cart::add($item);
		Alert::success('Berhasil','Data pesanan berhasil dimasukkan kedalam keranjang');
        return redirect('/warung');
    }
?>
```
---

<a name="section-4">
### function _getItemQuantity()
```php
<?php
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
?>
```
---

<a name="section-5">
### function _getCartItem()
```php
<?php
   private function _getCartItem($cartID)
	{
		$items = \Cart::getContent();

		return $items[$cartID];
	}
?>
```
---

<a name="section-6">
### function update()
```php
<?php
   public function update(Request $request)
	{
		$params = $request->except('_token');
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
?>
```
---
<a name="section-7">
### function destroy()
```php
<?php
   public function destroy($id)
    {
        \Cart::remove($id);
		Alert::success('Berhasil', 'Data pesanan berhasil dihapus');
		return redirect('keranjang');
    }
?>
```
---