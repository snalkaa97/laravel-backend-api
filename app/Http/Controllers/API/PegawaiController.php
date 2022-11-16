<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PegawaiModel;
use Illuminate\Support\Facades\Validator;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pegawai = PegawaiModel::all();
        return response()->json([
            'data' => $pegawai,
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pegawai',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $pegawai = PegawaiModel::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nip' => $request->nip,
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan,
            'unit_kerja' => $request->unit_kerja,
         ]);

         if(!empty($pegawai)){
             return response()
                 ->json(['data' => $pegawai, 'status'=>'success']);
            } else {
             return response()
                 ->json(['status' => 'error']);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $item = PegawaiModel::findOrFail($id);
        $item->update($data);

        if(!empty($item)){
            return response()
                ->json(['data' => $item, 'status'=>'success']);
           } else {
            return response()
                ->json(['status' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $item = PegawaiModel::findOrFail($id);
        $item->delete();

        return response()
        ->json(['status'=>'success']);
    }
}
