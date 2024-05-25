<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertPhotoController extends Controller
{
    public function index() {
        try {
            $advertPhotos = DB::statement('SELECT * FROM advert_photos');
            return response()->json(['success' => true, 'data' => $advertPhotos], 200);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id) {
        try {
            $advertPhoto = DB::statement('SELECT * FROM advert_photos WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $advertPhoto], 200);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request) {
        try {
            $advertPhoto = DB::statement('INSERT INTO advert_photos (photo) VALUES (?)', [$request->photo]);
            return response()->json(['success' => true, 'data' => $advertPhoto], 200);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id) {
        try {
            $advertPhoto = DB::statement('UPDATE advert_photos SET photo = ? WHERE id = ?', [$request->photo, $id]);
            return response()->json(['success' => true, 'data' => $advertPhoto], 200);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id) {
        try {
            $advertPhoto = DB::statement('DELETE FROM advert_photos WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $advertPhoto], 200);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
