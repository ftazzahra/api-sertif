<?php

namespace App\Http\Controllers;

use App\Http\Resources\ThnAjar as ResourcesThnAjar;
use App\Models\ThnAjar;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group API Tahun Ajaran
 * 
 * Apis management
 **/

class ThnAjarController extends Controller
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
        $thnAjar = ThnAjar::all();
 
        return $this->sendResponse(ResourcesThnAjar::collection($thnAjar), 'Data Tahun Ajaran.');
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
            'tahun_ajaran' => 'required',
            'status' => 'required'
        ]);
 
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
 
        $thnajar = ThnAjar::create($input);
 
        return $this->sendResponse(new ResourcesThnAjar($thnajar), 'created successfully.');
    }

    /**
     * Display the specified resource.
     *  * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @apiResourceModel App\Models\ThnAjar
     * @apiResourceCollection App\Http\Resources\ThnAjar

     */
   
     public function show($id)
     {
         $tahunajar = ThnAjar::find($id);
     
         if (is_null($tahunajar)) {
             return $this->sendError('tahun ajar tidak ditemukan.');
         }
     
         return $this->sendResponse(new ResourcesThnAjar($tahunajar), "detail data dengan id {$id}");
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
            'tahun_ajaran' => 'required',
            'status' => 'required'
        ]);
    
 
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $thnAjar = ThnAjar::find($id);
        $thnAjar->update([
            'tahun_ajaran' => $request->tahun_ajaran,
            'status' => $request->status,
        ]);
 
        return $this->sendResponse(new ResourcesThnAjar($thnAjar), 'updated successfully.');
        // $thnAjar->tahun_ajaran = $input['tahun_ajaran'];
        // $thnAjar->status = $input['status'];
        // $thnAjar->update();
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $thnAjar = ThnAjar::find($id);
        $thnAjar->delete();

        return $this->sendResponse(new ResourcesThnAjar($thnAjar), 'deleted successfully');
    }
}
