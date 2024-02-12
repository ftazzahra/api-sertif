<?php

namespace App\Http\Controllers;

use App\Http\Resources\RombelResource;
use App\Models\Rombel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group API Rombel
 * 
 * Apis management
 **/
class RombelController extends Controller
{
     /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            "success" => true,
            "data" => $result,
            "message" => $message,
        ];

        return response()->json($response, 200);
    }

    /**
    * return error response.
    *
* @return \Illuminate\Http\Response
    */
    public function sendError($error, $errorMessages = [], $code = 404) 
    {   
        $response = [
            "success" => false,
            "message" => $error,
        ];

        if (!empty($errorMessages)) {
            $response["data"] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombel = Rombel::all();
        return $this->sendResponse(RombelResource::collection($rombel), 'data rombel');
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
        $input = $request->all();
 
        $validator = Validator::make($input, [
            'nama_rombel' => 'required',
            'max_rombel' => 'required',
            'id_walas' => 'required',
            'id_tahun_ajaran' => 'required',
        ]);
 
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
 
        $rombel = Rombel::create($input);
 
        return $this->sendResponse(new RombelResource($rombel), 'created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rombel = Rombel::find($id);
    
        if (is_null($rombel)) {
            return $this->sendError('data walas tidak ditemukan.');
        }
    
        return $this->sendResponse(new RombelResource($rombel), "detail data dengan id {$id}");
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
       // $input = $request->all();
 
       $validator = Validator::make($request->all(), [
            'nama_rombel' => 'required',
            'max_rombel' => 'required',
            'id_walas' => 'required',
            'id_tahun_ajaran' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $rombel = Rombel::find($id);
        $rombel->update([
            'nama_rombel' => $request->nama_rombel,
            'max_rombel' => $request->max_rombel,
            'id_walas' => $request->id_walas,
            'id_tahun_ajaran' => $request->id_tahun_ajaran,
        ]);

        return $this->sendResponse(new RombelResource($rombel), 'updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rombel = Rombel::find($id);
        $rombel->delete();

        return $this->sendResponse(new RombelResource($rombel), 'deleted successfully');
    }
}
