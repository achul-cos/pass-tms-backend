<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Penumpang;
use App\Http\Requests\StorePenumpangRequest;
use App\Http\Requests\UpdatePenumpangRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PenumpangResource; 
use App\Http\Resources\V1\PenumpangCollection; 

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new PenumpangCollection(Penumpang::paginate());
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
    public function store(StorePenumpangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Penumpang $penumpang)
    {
        // Menggunakan pembungkus "data":{...}
        return new PenumpangResource($penumpang);

        // Tanpa pembungkus "data":{...}
        //return (new PenumpangResource($penumpang))->toArray(request());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penumpang $penumpang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenumpangRequest $request, Penumpang $penumpang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penumpang $penumpang)
    {
        //
    }
}
