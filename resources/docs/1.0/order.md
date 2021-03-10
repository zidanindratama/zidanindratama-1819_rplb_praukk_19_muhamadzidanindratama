# Order

--- 

- [Model](#section-1)
- [Migration](#section-9)
- [Construct()](#section-2)
- [Checkout()](#section-3)
- [_updateTax()](#section-4)
- [doCheckout()](#section-5)
- [_generatePaymentToken()](#section-10)
- [_saveOrder()](#section-6)
- [_saveOrderItems()](#section-7)
- [received()](#section-8)
- [list()](#section-11)

>{primary} Halo, ini adalah halaman dokumentasi order

--- 
# Model Order
---
<a name="section-1">
### Model Order

---

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Auth;

class Order extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'no_meja', 'status', 'payment_status', 
		'base_total_price', 'tax_amount', 'tax_percent', 'grand_total', 
		'keterangan', 'payment_token', 'payment_url', 'payment_due', 'order_date',
		'customer_email', 'customer_first_name', 'customer_last_name', 'code', 'customer_phone',
    ];

	public const CREATED = 'created';
	public const CONFIRMED = 'confirmed';
	public const COMPLETED = 'completed';
	public const PAID = 'paid';
	public const UNPAID = 'unpaid';

	public const STATUSES = [
		self::CREATED => 'Created',
		self::CONFIRMED => 'Confirmed',
		self::COMPLETED => 'Completed',
	];

	/**
	 * Check order is paid or not
	 *
	 * @return boolean
	 */
	public function isPaid()
	{
		return $this->payment_status == self::PAID;
	}

	/**
	 * Check order is created
	 *
	 * @return boolean
	 */
	public function isCreated()
	{
		return $this->status == self::CREATED;
	}

	/**
	 * Check order is confirmed
	 *
	 * @return boolean
	 */
	public function isConfirmed()
	{
		return $this->status == self::CONFIRMED;
	}
}
?>
```
---
# Lanjutan Model Order
```php
<?php
    /**
	 * Check order is completed
	 *
	 * @return boolean
	 */
	public function isCompleted()
	{
		return $this->status == self::COMPLETED;
	}

    /**
	 * Define relationship with the OrderItem
	 *
	 * @return void
	 */
	public function orderItems()
	{
		return $this->hasMany('App\OrderItem');
	}

	/**
	 * Define relationship with the User
	 *
	 * @return void
	 */
	public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }

	protected static $logAttributes = ['name', 'no_meja', 'keterangan', 'status', 'base_total_price'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return Auth::user()->name." "."has been {$eventName} order";
    }

    protected static $logName = 'order';

	public const ORDERCODE = 'INV';

	public static function generateCode()
	{
		$dateCode = self::ORDERCODE . '/' . date('Ymd') . '/';

		$lastOrder = self::select([\DB::raw('MAX(orders.code) AS last_code')])
			->where('code', 'like', $dateCode . '%')
			->first();

		$lastOrderCode = !empty($lastOrder) ? $lastOrder['last_code'] : null;
		
		$orderCode = $dateCode . '00001';
		if ($lastOrderCode) {
			$lastOrderNumber = str_replace($dateCode, '', $lastOrderCode);
			$nextOrderNumber = sprintf('%05d', (int)$lastOrderNumber + 1);
			
			$orderCode = $dateCode . $nextOrderNumber;
		}

		if (self::_isOrderCodeExists($orderCode)) {
			return generateOrderCode();
		}

		return $orderCode;
	}

	private static function _isOrderCodeExists($orderCode)
	{
		return Order::where('code', '=', $orderCode)->exists();
	}
?>
```

--- 
# Migration Order
---
<a name="section-9">
### Migration Order
---
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('code')->unique();
            $table->string('customer_email')->nullable();
            $table->string('customer_first_name');
			$table->string('customer_last_name');
            $table->string('customer_phone')->nullable();
            $table->integer('no_meja');
            $table->string('keterangan');
            $table->string('status');
            $table->datetime('order_date');
            $table->datetime('payment_due');
            $table->string('payment_status');
            $table->decimal('base_total_price', 16, 2)->default(0);
            $table->decimal('tax_amount', 16, 2)->default(0);
            $table->decimal('tax_percent', 16, 2)->default(0);
            $table->string('payment_token')->nullable();
            $table->string('payment_url')->nullable();
            $table->decimal('grand_total', 16, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
?>
```

--- 
# Controller Order
---
<a name="section-2">
### function __construct()
```php
<?php
    public function __construct(){
        $this->middleware([
           'auth',
           'privilege:Administrator&Pelanggan'
        ]);
    }
?>
```

---
<a name="section-3">
### function checkout()
```php
<?php
    public function checkout()
	{

		if (\Cart::isEmpty()) {
			return redirect('/keranjang');
		}

        $this->_updateTax();

        $items = \Cart::getContent();
		$this->data['items'] = $items;
        $this->data['user'] = \Auth::user();

        // dd($this->data);

        return view('default.order.checkout', $this->data);
	}
?>
```
---

<a name="section-4">
### function _updateTax()
```php
<?php
    private function _updateTax()
	{
		\Cart::removeConditionsByType('tax');

		$condition = new \Darryldecode\Cart\CartCondition(
			[
				'name' => 'TAX 10%',
				'type' => 'tax',
				'target' => 'total',
				'value' => '10%',
			]
		);

		\Cart::condition($condition);
	}
?>
```
---

<a name="section-5">
### function doCheckout()
```php
<?php
    public function doCheckout(OrderRequest $request)
	{
		$params = $request->except('_token');

		$order = \DB::transaction(
			function () use ($params) {
				$order = $this->_saveOrder($params);
				$this->_saveOrderItems($order);
				$this->_generatePaymentToken($order);

				return $order;
			}
		);

		if ($order) {
			\Cart::clear();
            Alert::success('Berhasil', 'Data pesanan anda diterima');
			return redirect('/warung/orders/received/'. $order->id);
		}

		return redirect('/warung/order/checkout');
	}
?>
```
---
<a name="section-10">
### function _generatePaymentToken()
```php
<?php
    private function _generatePaymentToken($order)
	{
		$this->initPaymentGateway();

		$customerDetails = [
			'first_name' => $order->customer_first_name,
			'last_name' => $order->customer_last_name,
			'email' => $order->customer_email,
			'phone' => $order->customer_phone,
		];

		$params = [
			'enable_payments' => \App\Payment::PAYMENT_CHANNELS,
			'transaction_details' => [
				'order_id' => $order->code,
				'gross_amount' => $order->grand_total,
			],
			'customer_details' => $customerDetails,
			'expiry' => [
				'start_time' => date('Y-m-d H:i:s T'),
				'unit' => \App\Payment::EXPIRY_UNIT,
				'duration' => \App\Payment::EXPIRY_DURATION,
			],
		];

		$snap = \Midtrans\Snap::createTransaction($params);
		
		if ($snap->token) {
			$order->payment_token = $snap->token;
			$order->payment_url = $snap->redirect_url;
			$order->save();
		}
	}
?>
```
---

<a name="section-6">
### function _saveOrder()
```php
<?php
    private function _saveOrder($params)
	{
		$baseTotalPrice = \Cart::getSubTotal();
		$taxAmount = \Cart::getCondition('TAX 10%')->getCalculatedValue(\Cart::getSubTotal());
		$taxPercent = (float)\Cart::getCondition('TAX 10%')->getValue();
		$grandTotal = ($baseTotalPrice + $taxAmount);

		$orderDate = date('Y-m-d H:i:s');
		$paymentDue = (new \DateTime($orderDate))->modify('+7 day')->format('Y-m-d H:i:s');

		$orderParams = [
			'user_id' => \Auth::user()->id,
			'code' => Order::generateCode(),
			'no_meja' => $params['no_meja'],
			'keterangan' => $params['keterangan'],
			'customer_first_name' => $params['first_name'],
			'customer_last_name' => $params['last_name'],
			'customer_email' => $params['email'],
			'customer_phone' => $params['phone'],
			'order_date' => $orderDate,
			'payment_due' => $paymentDue,
			'payment_status' => Order::UNPAID,
			'status' => Order::CREATED,
            'payment_status' => Order::UNPAID,
			'base_total_price' => $baseTotalPrice,
			'tax_amount' => $taxAmount,
			'tax_percent' => $taxPercent,
			'grand_total' => $grandTotal,
		];

		return Order::create($orderParams);
	}
?>
```
---

<a name="section-7">
### function _saveOrderItems()
```php
<?php
    private function _saveOrderItems($order)
	{
		$cartItems = \Cart::getContent();

		if ($order && $cartItems) {
			foreach ($cartItems as $item) {
				$itemTaxAmount = 0;
				$itemTaxPercent = 0;
				$itemBaseTotal = $item->quantity * $item->price;
                // $itemSubTotal = DB::select('SELECT ngitungTotal('.$itemBaseTotal.','.$itemTaxAmount.') AS hasil_total')[0]->hasil_total;
                // dd($itemSubTotal);

                $itemSubTotal = $itemBaseTotal + $itemTaxAmount;

				$product = isset($item->associatedModel->parent) ? $item->associatedModel->parent : $item->associatedModel;

				$orderItemParams = [
					'order_id' => $order->id,
					'menu_id' => $item->associatedModel->id,
					'quantity' => $item->quantity,
					'base_price' => $item->price,
					'base_total' => $itemBaseTotal,
					'tax_amount' => $itemTaxAmount,
					'tax_percent' => $itemTaxPercent,
					'sub_total' => $itemSubTotal,
					'name' => $item->name,
				];

				$orderItem = OrderItem::create($orderItemParams);
			}
		}
	}
?>
```
---

---
<a name="section-8">
### function received()
```php
<?php
    public function received($orderId)
	{
        $order = Order::findOrFail($orderId);

        // dd($order);

		return view('default.order.received', compact('order'));
	}
?>
```

---
<a name="section-11">
### function list()
```php
<?php
    public function list()
    {
        $orders = Order::where('user_id', Auth::id())
			->orderBy('created_at', 'DESC')
			->paginate(10);

		$this->data['orders'] = $orders;

		return view('default.order.index', $this->data);
    }
?>
```
---