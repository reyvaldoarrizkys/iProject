<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customers;
use App\Models\OrderItems;
use App\Models\Transaction;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['customers_id','order_date','total_amount','code'];
    protected $primaryKey = 'id';

    public function customers() { 
        return $this->BelongsTo(Customers::class,'customers_id','id'); 
  }

    public function orderItem() { 
        return $this->hasmany(OrderItems::class,'orderItem','id'); 
    }
    
}
