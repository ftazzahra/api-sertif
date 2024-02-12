<?php

namespace App\Http\Controllers;

use App\Http\Resources\JurusanResource;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group API Jurusan
 * 
 * Apis management
 **/
class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * Gets a data Jurusan
     * 
     * @queryParam page_size int required Size per page. Defaults to 20. Example: 20
     * @queryParam page int Page to view. Example: 3
     * 
     * 
     * @apiResourceModel App\Models\Jurusan
     * 
     * @return ResourceCollection
     */
    public function index(Request $request)
    {
        $jurusan = Jurusan::all();
        // $jurusan = Jurusan::query()->Paginate($request->page_size ?? 20);
        // return JurusanResource::collection($jurusan);
        return new JurusanResource(true, 'list data', $jurusan);
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
     * @bodyParam nama_jurusan string required Name of Jurusan. Example: Rekayasa Internet. 
     * @bodyParam Singkatan string required Singkatan of Jurusan. Example: RIT. 
     * @apiResourceModel App\Models\Jurusan
     * @param \Illuminate\Http\Request $request
     * @return JurusanResource
     * 
     */
    public function store(Request $request)
    {
        
        $valid = Validator::make($request->all(), [
            'nama_jurusan' => 'required',
            'singkatan' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json($valid->errors(), 422);
        }

        $jurusan = Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'singkatan' => $request->singkatan,
        ]);

        return new JurusanResource(true, 'store success', $jurusan);
    }

    /**
     * Display the specified resource.
     * 
     * @urlParam id int required Jurusan ID
     * @apiResourceModel App\Models\Jurusan
     * 
     * 
     */
    public function show(string $id)
    {
        $jurusan = Jurusan::find($id);
        return new JurusanResource(true, 'detail data', $jurusan);
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
        $jurusan = Jurusan::find($id);
        $jurusan->update([
            'nama_jurusan' => $request->nama_jurusan,
            'singkatan' => $request->singkatan,
        ]);
        return new JurusanResource(true, 'update success', $jurusan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        return new JurusanResource(true, 'deleted success', $jurusan);
    }
}
