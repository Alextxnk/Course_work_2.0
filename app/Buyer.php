<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Buyer extends Model
{
    protected $primaryKey = 'buyer_id';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'address',
        'phone',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
