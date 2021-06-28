<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'status', 'description', 'location'];

    public function stocks() {
        return $this->hasMany(Stock::class,'warehouse_id','id');
    }
}