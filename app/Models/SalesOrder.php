<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;

    protected $guarded = [
        'order_id'
    ];
    protected $primaryKey = 'order_id';


    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'productr_id');
    }
}
