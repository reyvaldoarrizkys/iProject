<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\OrderItems;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name','price','description','stock'];
    protected $primaryKey = 'id';

    public function orderItems() { 
      return $this->HasMany(OrderItems::class,'orderItems','id'); 
  }
}
