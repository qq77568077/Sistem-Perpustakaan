<?php

namespace App\Http\Controllers;

use App\DataTables\PriceDataTable;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create konfigurasi/prices')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PriceDataTable $dataTable)
    {
        //
        $this->authorize('read konfigurasi/prices');
        return $dataTable->render('konfigurasi.price');
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
        //
        return view('konfigurasi.price-action', ['price' => new Price()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Price::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Create data successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        //
        return view('konfigurasi.price-action', compact('price'));
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
        //
        $price->pageBerwarnaPrice = $request->pageBerwarnaPrice;
        $price->pageHitamPutihPrice = $request->pageHitamPutihPrice;
        $price->softjilidprice = $request->softjilidprice;
        $price->hardjilidprice = $request->hardjilidprice;
        $price->save();

        return response()->json([
            'status' => 'success',
            'message' => 'updated data successfully'
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
        //
        $price->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
