<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\Menu;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrderRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class WarungOrderController extends Controller
{
    public function __construct(){
        $this->middleware([
           'auth',
           'privilege:Administrator&Pelanggan'
        ]);
    }

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

    public function received($orderId)
	{
        $order = Order::findOrFail($orderId);

        // dd($order);

		return view('default.order.received', compact('order'));
	}

    public function list()
    {
        $orders = Order::where('user_id', Auth::id())
			->orderBy('created_at', 'DESC')
			->paginate(10);

		$this->data['orders'] = $orders;

		return view('default.order.index', $this->data);
    }
}
