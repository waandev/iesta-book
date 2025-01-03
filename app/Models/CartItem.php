<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use SoftDeletes;

    protected $table = 'cart_items';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'cart_id',
        'publication_id',
        'quantity',
        'is_selected',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
