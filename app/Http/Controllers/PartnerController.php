<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Partner::all());
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:partners,email',
            'contact_number' => 'required|string',
        ]);

        $partner = Partner::create($request->only(['name', 'email', 'contact_number']));

        return response()->json($partner, 201);
    }

  
    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
{
    $partner = Partner::findOrFail($id);
    
    $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'email' => 'required|email|unique:partners,email,' . $id,
        'contact_number' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors(),
            'message' => 'Validation failed'
        ], 422);
    }

    $validated = $validator->validated();

    $partner->update($validated);
    
    return response()->json($partner->fresh());
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        return response()->json(['message' => 'Partner deleted successfully']);
    }
}
