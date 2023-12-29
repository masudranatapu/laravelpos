<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Resources\SuppliersResource;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $request = request();
            $suppliers = Supplier::query()
                    ->when($request->user_id, fn($q) => $q->where('user_id', $request->user_id))
                    ->when($request->text, fn($q) => $q->where('name', 'like', '%' . $request->text . '%'))
                    ->when($request->status, fn($q) => $q->where('status', $request->status))
                    ->get();
            return SuppliersResource::collection($suppliers);
        } catch (\Throwable $th) {
            return response()->json([
                'type' => 'Error',
                'massage' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
