<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name',
        'quantity',
        'purchase_price',
        'selling_price',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'purchase_price' => 'integer',
        'selling_price' => 'integer',
    ];

    public function order_product()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function purchase_product()
    {
        return $this->hasMany(PurchaseProduct::class);
    }
}
