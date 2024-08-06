<?php

namespace App\Http\Controllers;

use App\DataTables\PriceDataTable;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PriceController extends Controller
{
    public function getActivePrice(): JsonResponse
    {
        $price = Price::where('is_active', true)->first();
        return response()->json($price);
    }

    public function __construct()
    {
        $this->middleware('can:create master/prices')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PriceDataTable $dataTable)
    {
        $this->authorize('read master/prices');
        return $dataTable->render('master.price');
    }


    public function getPriceData()
    {
        $price = Price::latest()->first();
        return response()->json([
            'success' => true,
            'message' => 'List data price',
            'data' => $price
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.price-action', ['price' => new Price()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Nonaktifkan harga lama jika ada
        Price::where('is_active', true)->update(['is_active' => false]);

        // Buat harga baru
        Price::create(array_merge($request->all(), ['is_active' => true]));

        return response()->json([
            'status' => 'success',
            'message' => 'Create data successfully'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        return view('master.price-action', compact('price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        // Nonaktifkan harga lama jika ada
        Price::where('is_active', true)->update(['is_active' => false]);

        // Update harga yang ada
        $price->update([
            'pageBerwarnaPrice' => $request->pageBerwarnaPrice,
            'pageHitamPutihPrice' => $request->pageHitamPutihPrice,
            'hardjilidprice' => $request->hardjilidprice,
            'softjilidprice' => $request->softjilidprice,
            'is_active' => true,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Updated data successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $price->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
