<?php

namespace App\Http\Controllers;

use App\Http\Resources\WalasResources;
use App\Models\Walas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group API Walas 
 * 
 * Apis management
 **/
class WalasController extends Controller
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
        $walas = Walas::all();
        return $this->sendResponse(WalasResources::collection($walas), 'Data Tahun Ajaran.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /* Store a newly created resource in storage.
     * 
     * @bodyParam tahun_ajaran string required Tahun of Ajaran. Example: 2020. 
     * @bodyParam Status string required Status of Tahun Ajaran. Example: Aktif. 
     * @apiResourceModel App\Models\ThnAjar
     * @param \Illuminate\Http\Request $request
     * @return ThnAjar
     * 
     */
    public function store(Request $request)
    {
        $input = $request->all();
 
        $validator = Validator::make($input, [
            'id_ptk' => 'required',
            'id_tahun_ajaran' => 'required'
        ]);
 
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
 
        $walas = Walas::create($input);
 
        return $this->sendResponse(new WalasResources($walas), 'created successfully.');
    }

     /**
     * Display the specified resource.
     *  * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @apiResourceModel App\Models\Walas
     * @apiResourceCollection App\Http\Resources\WalasResources

     */
   
     public function show($id)
     {
         $walas = Walas::find($id);
     
         if (is_null($walas)) {
             return $this->sendError('data walas tidak ditemukan.');
         }
     
         return $this->sendResponse(new WalasResources($walas), "detail data dengan id {$id}");
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
                'id_ptk' => 'required',
                'id_tahun_ajaran' => 'required'
            ]);
        
    
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $walas = Walas::find($id);
            $walas->update([
                'id_ptk' => $request->id_ptk,
                'id_tahun_ajaran' => $request->id_tahun_ajaran,
            ]);
    
            return $this->sendResponse(new WalasResources($walas), 'updated successfully.');
            // $thnAjar->tahun_ajaran = $input['tahun_ajaran'];
        // $thnAjar->status = $input['status'];
        // $thnAjar->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $walas = Walas::find($id);
        $walas->delete();

        return $this->sendResponse(new WalasResources($walas), 'deleted successfully');
    }
}
