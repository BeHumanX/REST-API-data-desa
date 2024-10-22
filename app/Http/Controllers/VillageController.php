<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Models\Village;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desa = Village::all()->paginate(10);
        return response()->json(['status' => 'success', 'data' => $desa, 'message' => 'Data Desa Berhasil Diambil'], 200);
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
        $validate = Validator::make($request->all(), [
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'district_code' => 'required|exists:indonesia_districts,code',
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'message' => $validate->errors()], 400);
        }

        Village::create($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data Desa Berhasil Ditambahkan'], 201);
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'district_code' => 'required|exists:indonesia_districts,code',
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => 'error', 'message' => $validate->errors()], 400);
        }
        Village::findorFail($id)->update($request->all());
        return response()->json(['status' => 'error', 'message' => 'Data Desa Tidak Ditemukan'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Village::findorFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Data Desa Berhasil Dihapus'], 200);
    }
}
