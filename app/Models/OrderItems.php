<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\Orders;

class OrderItems extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = ['order_id','product_id','quantity','total_amount_items'];
    protected $primaryKey = 'id';

    public function products() { 
        return $this->belongsTo(Products::class,'product_id','id'); 
    }
    public function orders() { 
        return $this->belongsTo(Orders::class,'order_id','id'); 
    }
}
