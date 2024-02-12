<?php

namespace App\Http\Controllers;

use App\Http\Resources\SiswaResource;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group API Siswa
 * 
 * Apis management
 **/
class SiswaController extends Controller
{
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message
        ];

        return response()->json($response, 200);
    }

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
        $siswa = Siswa::all();
        return $this->sendResponse(SiswaResource::collection($siswa), 'Data Tahun Ajaran.');
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
            'nisn' => 'required',
            'nama' => 'required',
            'id_jurusan' => 'required',
            'id_rombel' => 'required',
            'jk' => 'required',
            'kelas' => 'required',
        ]);
 
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
 
        $siswa = Siswa::create($input);
 
        return $this->sendResponse(new SiswaResource($siswa), 'created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::find($id);
    
        if (is_null($siswa)) {
            return $this->sendError('data siswa tidak ditemukan.');
        }
    
        return $this->sendResponse(new SiswaResource($siswa), "detail data dengan id {$id}");
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
    //     $validator = Validator::make($request->all(), [
    //         'nisn' => 'required',
    //         'nama' => 'required',
    //         'id_jurusan' => 'required',
    //         'id_rombel' => 'required',
    //         'jk' => 'required',
    //         'kelas' => 'required',
    //     ]);
    
 
        // if($validator->fails()){
        //     return $this->sendError('Validation Error.', $validator->errors());
        // }

        $siswa = Siswa::find($id);
        $siswa->update([
            'id_siswa' => $request->id_siswa,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'id_jurusan' => $request->id_jurusan,
            'id_rombel' => $request->id_rombel,
            'jk' => $request->jk,
            'kelas' => $request->kelas,
        ]);
 
        return $this->sendResponse(new SiswaResource($siswa), 'updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return $this->sendResponse(new SiswaResource($siswa), 'deleted successfully');
    }
}
