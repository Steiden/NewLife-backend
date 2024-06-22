<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertPhotoController extends Controller
{
    public function index()
    {
        try {
            $advertPhotos = DB::select('SELECT * FROM advert_photos');
            return response()->json(['success' => true, 'data' => $advertPhotos], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $advertPhoto = DB::selectOne('SELECT * FROM advert_photos WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $advertPhoto], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $advertPhoto = DB::insert('INSERT INTO advert_photos (image, advert_id), VALUES (?, ?)', [$request->image, $request->advert_id]);
            return response()->json(['success' => true, 'data' => $advertPhoto], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->has('image')) {
                $advertPhoto = DB::update('UPDATE advert_photos SET image = ? WHERE id = ?', [$request->image, $id]);
            }

            if ($request->has('advert_id')) {
                $advertPhoto = DB::update('UPDATE advert_photos SET advert_id = ? WHERE id = ?', [$request->advert_id, $id]);
            }

            return response()->json(['success' => true, 'data' => $advertPhoto], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $advertPhoto = DB::delete('DELETE FROM advert_photos WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $advertPhoto], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
