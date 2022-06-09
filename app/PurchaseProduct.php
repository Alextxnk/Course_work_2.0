<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PurchaseProduct extends Model
{
    protected $primaryKey = 'purchase_product_id';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'purchase_quantity',
        'purchase_amount',
    ];

    protected $casts = [
        'purchase_quantity' => 'integer',
        'purchase_amount' => 'integer',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
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
