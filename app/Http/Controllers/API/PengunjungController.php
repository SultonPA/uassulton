<?php

namespace App\Http\Controllers\API;


use App\Models\pengunjung;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PengunjungController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index']]);
    }
    public function index()
    {
        $data = pengunjung::all();
        return response()->json($data, 200);

    }
    public function show($id)
    {
        $data = pengunjung::where('id', $id)->first();
        if (!empty($data)) {
            return $data;
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);

    }
    public function destroy($id)
    {
        $data = pengunjung::where('id', $id)->first();
        if (empty($data)) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        $data->delete();
        return response()->json([

            'message' => 'data berhasil dihapus'
        ], 200);
    }
    public function store(Request $request )
    {
        $validate = Validator::make($request->all(), [
                'nama_pengunjung' => 'required'
                , 'alamat' => 'required',
                'jenis_kelamin' => 'required',
                'no_telp' => 'required',
                 'no_ktp' => 'required'
        ]);
        if ($validate->passes()) {
           return pengunjung::create($request->all());

}
            return response()->json(['message' => 'Data Gagal Disimpan']);

    }
    public function update(Request $request, $id)
     {

        $data = pengunjung::where('id', $id)->first();
        if (!empty($data)) {
            $validate = Validator::make($request->all(), [
                'nama_pengunjung' => 'required'
                , 'alamat' => 'required',
                'jenis_kelamin' => 'required',
                'no_telp' => 'required',
                 'no_ktp' => 'required'
        ]);
        if ($validate->passes()) {
           $data->update($request->all());

            return response()->json(['message' => 'Data berhasil di update',
                                     'data' => $data ]);
        } else {
        return response()->json(['message' => 'data tidak ditemukan',
                                  'data' => $validate->errors()->all()]);
        }
    }
    return response()->json(['message' => 'data tidak ditemukan'], 404);
}
}
