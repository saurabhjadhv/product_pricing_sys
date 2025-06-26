<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Partner;
use App\Models\Product;

class CustomPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'partner_id',
        'custom_price_usd',
    ];


    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function partner() {
        return $this->belongsTo(Partner::class);
    }
}
