<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomPrice;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'contact_number',
    ];


    public function customPrices() {
        return $this->hasMany(CustomPrice::class);
    }
}
