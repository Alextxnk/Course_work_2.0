<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OrderProduct extends Model
{
    protected $primaryKey = 'order_product_id';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //'order_id',
        'product_id',
        'order_quantity',
        'order_amount',
    ];

    protected $casts = [
        'order_quantity' => 'integer',
        'order_amount' => 'integer',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function trasaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
