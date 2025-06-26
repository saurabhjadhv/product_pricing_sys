<?php

namespace App\Http\Controllers;

use App\Models\CustomPrice;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CustomPriceController extends Controller
{

  public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => [
                'required',
                'exists:products,id',
                Rule::unique('custom_prices')->where(function ($query) use ($request) {
                    return $query->where('partner_id', $request->partner_id);
                })
            ],
            'partner_id' => 'required|exists:partners,id',
            'custom_price_usd' => 'required|numeric|min:0.01',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'message' => 'Validation failed'
            ], 422);
        }

        $price = CustomPrice::create($validator->validated());

        return response()->json($price, 201);
    }

}
