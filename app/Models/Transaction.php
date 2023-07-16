<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = ['order_id','transaction_date','order_items_id','amount'];
    protected $primaryKey = 'id';

    public function orders() { 
        return $this->BelongsTo(Orders::class); 
    }
}