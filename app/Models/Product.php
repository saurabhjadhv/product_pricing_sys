<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomPrice;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'category',
        'document',
    ];

    protected $dates = ['deleted_at'];


    public function customPrices() {
        return $this->hasMany(CustomPrice::class);
    }
}
