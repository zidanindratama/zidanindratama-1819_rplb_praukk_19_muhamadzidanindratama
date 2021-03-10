# Payment

--- 

- [Model](#section-1)
- [Migration](#section-9)
- [notification()](#section-2)
- [completed()](#section-3)
- [failed()](#section-4)
- [unfinish()](#section-5)

>{primary} Halo, ini adalah halaman dokumentasi payment

--- 
# Model Payment
---
<a name="section-1">
### Model Payment

---

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
		'order_id',
		'number',
		'amount',
		'method',
		'status',
		'token',
		'payloads',
		'payment_type',
		'va_number',
		'vendor_name',
		'biller_code',
		'bill_key',
	];

	public const PAYMENT_CHANNELS = ['credit_card', 'mandiri_clickpay', 'cimb_clicks',
	'bca_klikbca', 'bca_klikpay', 'bri_epay', 'echannel', 'permata_va',
	'bca_va', 'bni_va', 'other_va', 'gopay', 'indomaret',
	'danamon_online', 'akulaku'];

	public const EXPIRY_DURATION = 7;
	public const EXPIRY_UNIT = 'days';
	  

	public const CHALLENGE = 'challenge';
	public const SUCCESS = 'success';
	public const SETTLEMENT = 'settlement';
	public const PENDING = 'pending';
	public const DENY = 'deny';
	public const EXPIRE = 'expire';
	public const CANCEL = 'cancel';


	public const PAYMENTCODE = 'PAY';

    public static function generateCode()
	{
		$dateCode = self::PAYMENTCODE . '/' . date('Ymd'). '/';

		$lastOrder = self::select([\DB::raw('MAX(payments.number) AS last_code')])
			->where('number', 'like', $dateCode . '%')
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
		return self::where('number', '=', $orderCode)->exists();
	}
}
?>
```

--- 
# Migration Payment
---
<a name="section-9">
### Migration Payment

---
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('number')->unique();
            $table->decimal('amount', 16, 2)->default(0);
            $table->string('method');
            $table->string('token')->nullable();
            $table->json('payloads')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('va_number')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('biller_code')->nullable();
            $table->string('bill_key')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            
            $table->index('number');
            $table->index('method');
            $table->index('token');
            $table->index('payment_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}

?>
```

--- 
# Controller Payment
---
<a name="section-2">
### function notification()
```php
<?php
    public function notification(Request $request) {
        $payload = $request->getContent();
		$notification = json_decode($payload);

		$validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . env('MIDTRANS_SERVER_KEY'));

		if ($notification->signature_key != $validSignatureKey) {
			return response(['message' => 'Invalid signature'], 403);
		}

		$this->initPaymentGateway();
		$statusCode = null;

		$paymentNotification = new \Midtrans\Notification();
		$order = Order::where('code', $paymentNotification->order_id)->firstOrFail();

		if ($order->isPaid()) {
			return response(['message' => 'The order has been paid before'], 422);
		}
?>
```
---
### Lanjutan funcion notification()
```php
    $transaction = $paymentNotification->transaction_status;
    $type = $paymentNotification->payment_type;
    $orderId = $paymentNotification->order_id;
    $fraud = $paymentNotification->fraud_status;

    $vaNumber = null;
    $vendorName = null;
    if (!empty($paymentNotification->va_numbers[0])) {
        $vaNumber = $paymentNotification->va_numbers[0]->va_number;
        $vendorName = $paymentNotification->va_numbers[0]->bank;
    }

    $paymentStatus = null;
    if ($transaction == 'capture') {
        // For credit card transaction, we need to check whether transaction is challenge by FDS or not
        if ($type == 'credit_card') {
            if ($fraud == 'challenge') {
                // TODO set payment status in merchant's database to 'Challenge by FDS'
                // TODO merchant should decide whether this transaction is authorized or not in MAP
                $paymentStatus = Payment::CHALLENGE;
            } else {
                // TODO set payment status in merchant's database to 'Success'
                $paymentStatus = Payment::SUCCESS;
            }
        }
    }
```
---
### Lanjutan function notification()
```php
    else if ($transaction == 'settlement') {
        // TODO set payment status in merchant's database to 'Settlement'
        $paymentStatus = Payment::SETTLEMENT;
    } else if ($transaction == 'pending') {
        // TODO set payment status in merchant's database to 'Pending'
        $paymentStatus = Payment::PENDING;
    } else if ($transaction == 'deny') {
        // TODO set payment status in merchant's database to 'Denied'
        $paymentStatus = PAYMENT::DENY;
    } else if ($transaction == 'expire') {
        // TODO set payment status in merchant's database to 'expire'
        $paymentStatus = PAYMENT::EXPIRE;
    } else if ($transaction == 'cancel') {
        // TODO set payment status in merchant's database to 'Denied'
        $paymentStatus = PAYMENT::CANCEL;
    }

    $paymentParams = [
        'order_id' => $order->id,
        'number' => Payment::generateCode(),
        'amount' => $paymentNotification->gross_amount,
        'method' => 'midtrans',
        'status' => $paymentStatus,
        'token' => $paymentNotification->transaction_id,
        'payloads' => $payload,
        'payment_type' => $paymentNotification->payment_type,
        'va_number' => $vaNumber,
        'vendor_name' => $vendorName,
        'biller_code' => $paymentNotification->biller_code,
        'bill_key' => $paymentNotification->bill_key,
    ];

    $payment = Payment::create($paymentParams);
```
---
### Lanjutan function notification()
```php
    if ($paymentStatus && $payment) {
        \DB::transaction(
            function () use ($order, $payment) {
                if (in_array($payment->status, [Payment::SUCCESS, Payment::SETTLEMENT])) {
                    $order->payment_status = Order::PAID;
                    $order->status = Order::CONFIRMED;
                    $order->save();
                }
            }
        );
    }

    $message = 'Payment status is : '. $paymentStatus;

    $response = [
        'code' => 200,
        'message' => $message,
    ];

    return response($response, 200);
}
```

---
<a name="section-3">
### function completed()
```php
<?php
    public function completed(Request $request) {
		$code = $request->query('order_id');
		$order = Order::where('code', $code)->firstOrFail();
		
		if ($order->payment_status == Order::UNPAID) {
			return redirect('payments/failed?order_id='. $code);
		}

		\Session::flash('success', "Thank you for completing the payment process!");

		return redirect('/warung/orders/received/'. $order->id);
    }
?>
```
---

<a name="section-4">
### function failed()
```php
<?php
    public function failed(Request $request) {
		$code = $request->query('order_id');
		$order = Order::where('code', $code)->firstOrFail();

		\Session::flash('error', "Sorry, we couldn't process your payment.");

		return redirect('/warung/orders/received/'. $order->id);
    }
?>
```
---

<a name="section-5">
### function unfinish()
```php
<?php
    public function unfinish(Request $request) {
		$code = $request->query('order_id');
		$order = Order::where('code', $code)->firstOrFail();

		\Session::flash('error', "Sorry, we couldn't process your payment.");

		return redirect('/warung/orders/received/'. $order->id);
    }
?>
```
---
