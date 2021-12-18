<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShotRequest;
use App\Http\Requests\UpdateShotRequest;
use App\Models\Shot;

class ShotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShotRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShotRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shot  $shot
     * @return \Illuminate\Http\Response
     */
    public function show(Shot $shot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shot  $shot
     * @return \Illuminate\Http\Response
     */
    public function edit(Shot $shot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShotRequest  $request
     * @param  \App\Models\Shot  $shot
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShotRequest $request, Shot $shot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shot  $shot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shot $shot)
    {
        //
    }
}
