<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;

    protected $table = 'order_items';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'order_id',
        'publication_id',
        'quantity',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
