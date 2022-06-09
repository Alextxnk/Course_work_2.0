<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transaction extends Model
{
    protected $primaryKey = 'transaction_id';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_product_id',
        'purchase_product_id',
        'appointment',
    ];

    public function order_products()
    {
        return $this->belongsTo(OrderProduct::class);
    }

    public function purchase_products()
    {
        return $this->belongsTo(PurchaseProduct::class);
    }
}
