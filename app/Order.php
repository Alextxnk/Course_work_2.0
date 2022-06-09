<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    protected $primaryKey = 'order_id';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //'user_id',
        'buyer_id',
        'date',
        'status',
    ];

    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function order_product()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
