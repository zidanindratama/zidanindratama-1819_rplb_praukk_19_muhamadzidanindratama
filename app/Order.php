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
}
