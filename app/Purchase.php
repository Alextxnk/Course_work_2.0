<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Purchase extends Model
{
    protected $primaryKey = 'purchase_id';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'status',
        'provider',
    ];

    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];

    public function purchase_product()
    {
        return $this->hasMany(PurchaseProduct::class);
    }
}
