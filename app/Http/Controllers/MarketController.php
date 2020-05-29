<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMarketRequest;
use App\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markets = Market::cursor();
        return view('admin.markets.index', compact('markets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.markets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreMarketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarketRequest $request)
    {
        $validatedData = $request->validated();
        Market::create($validatedData);

        $successMsg = trans('global.messages.success.create', ['name' => trans('cruds.markets.title_singular')]);
        return redirect()->route('admin.markets.index', app()->getLocale())->withSuccess($successMsg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function show(Market $market)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function edit(Market $market)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Market $market)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, Market $market)
    {
        $market->delete();

        $successMsg = trans('global.messages.success.delete', ['name' => trans('cruds.markets.title_singular')]);
        return redirect()->route('admin.markets.index', app()->getLocale())->withSuccess($successMsg);
    }
}
