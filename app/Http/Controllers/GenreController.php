<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function getAllData()
    {
        $genreData = Genre::all();

        return response()->json($genreData, 200);
    }

    public function getDataById($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json(['message' => 'Data Genre Tidak Ditemukan'], 404);
        }

        return response()->json($genre, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'namaGenre' => 'required|max:255'
        ]);

        $genre = Genre::create($validatedData);

        return response()->json([
            'message' => 'Berhasil Menambah Data Genre',
            'data' => $genre
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validate($request, [
            'namaGenre' => 'required|max:255'
        ]);

        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json(['message' => 'Data Genre Tidak Ditemukan'], 404);
        }

        $genre->namaGenre = $validatedData['namaGenre'];
        $genre->save();

        return response()->json([
            'message' => 'Berhasil Mengubah Data Genre',
            'data' => $genre
        ], 200);
    }

    public function destroy($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json(['message' => 'Data Genre Tidak Ditemukan'], 404);
        }

        $genre->delete();

        return response()->json([
            'message' => 'Data Genre Berhasil Dihapus'
        ], 200);
    }
}
