<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Auth;

class OrderItem extends Model
{
    protected $fillable = [
		'order_id',
		'menu_id',
		'quantity',
		'base_price',
		'base_total',
		'tax_amount',
		'tax_percent',
		'sub_total',
		'name',
	];

	/**
	 * Define relationship with the Product
	 *
	 * @return void
	 */
	public function menu()
	{
		return $this->belongsTo('App\Menu');
	}

	protected static $logAttributes = ['name', 'quantity', 'base_price', 'base_total', 'sub_total'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return Auth::user()->name." "."has been {$eventName} order item";
    }

    protected static $logName = 'order item';
}
