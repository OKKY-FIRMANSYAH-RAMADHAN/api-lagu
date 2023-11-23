<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lagu;

class LaguController extends Controller
{
    public function getAllData()
    {
        $laguData = Lagu::join('okky_genre_lagu', 'okky_lagu.genre', '=', 'okky_genre_lagu.idGenre')->orderBy('idLagu', 'desc')->get();

        return response()->json($laguData, 200);
    }

    public function getDataById($id)
    {
        $lagu = Lagu::find($id);

        if (!$lagu) {
            return response()->json(['message' => 'Data Lagu Tidak Ditemukan'], 404);
        }

        return response()->json($lagu, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'judul' => 'required',
            'penyanyi' => 'required',
            'tahun' => 'required|numeric',
            'genre' => 'required',
            'album' => 'required',
            'durasi' => 'required'
        ]);

        $lagu = Lagu::create($validatedData);

        return response()->json(['message' => 'Data Lagu Berhasil Ditambahkan', 'data' => $lagu], 201);
    }
    public function update(Request $request, $id)
    {
        $validatedData = $this->validate($request, [
            'judul' => 'required',
            'penyanyi' => 'required',
            'tahun' => 'required|numeric',
            'genre' => 'required',
            'album' => 'required',
            'durasi' => 'required'
        ]);

        $lagu = Lagu::find($id);

        if (!$lagu) {
            return response()->json(['message' => 'Data Lagu Tidak Ditemukan'], 404);
        }

        $lagu->update($validatedData);

        return response()->json([
            'message' => 'Berhasil Mengubah Data Lagu',
            'data' => $lagu
        ], 200);
    }

    public function destroy($id)
    {
        $lagu = Lagu::find($id);

        if (!$lagu) {
            return response()->json('Data Lagu Tidak Ditemukan', 404);
        }

        $lagu->delete();

        return response()->json([
            'message' => 'Data Lagu Berhasil Dihapus'
        ], 200);
    }
}
