<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ['user_id','name','username','email','address','phone'];
    protected $primaryKey = 'id';

    public function orders() { 
        return $this->HasMany(Orders::class); 
      }
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
