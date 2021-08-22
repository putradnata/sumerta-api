<?php

namespace App\Http\Controllers;

use App\Models\Banjar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BanjarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAllData = Banjar::all();

        return response()->json($getAllData, http_response_code(200));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banjar = new Banjar();

        $request =  (object) $banjar->getDefaultValues();

        return response()->json($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'nama.required' => 'Nama Banjar Wajib Diisi',
            'alamat.required' => 'Alamat Banjar Wajib Diisi',
        ];

        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'alamat' => 'required'
        ], $message);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $insertBanjar = Banjar::create($request->all());

        if($insertBanjar){
            return response()->json('Data telah Disimpan', http_response_code(200));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banjar  $banjar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getSpecificData = Banjar::findOrFail($id);

        if($getSpecificData){
            return response($getSpecificData);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banjar  $banjar
     * @return \Illuminate\Http\Response
     */
    public function edit(Banjar $banjar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banjar  $banjar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banjar $banjar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banjar  $banjar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banjar $banjar)
    {
        //
    }
}
