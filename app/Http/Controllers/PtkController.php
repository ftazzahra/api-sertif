<?php

namespace App\Http\Controllers;

use App\Http\Resources\PtkResource;
use App\Models\Ptk;
use Illuminate\Http\Request;

/**
 * @group API Ptk
 * 
 * Apis management
 **/
class PtkController extends Controller
{
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
        $ptk = Ptk::all();
 
        return $this->sendResponse(PtkResource::collection($ptk), 'Data Tahun Ajaran.');
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
