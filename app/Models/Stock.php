<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable=['warehouse_id','product_id','batch_id','quantity','price','type'];
    public function warehouses() {
        return $this->hasOne(Warehouse::class,'id','warehouse_id');
    }
    public function products() {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
