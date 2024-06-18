<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertController extends Controller
{
    public function index()
    {
        try {
            $adverts = DB::select('SELECT * FROM adverts');
            return response()->json(['success' => true, 'data' => AdvertResource::collection($adverts)], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        }
    }

    public function show($id)
    {
        try {
            $advert = DB::select('SELECT * FROM adverts WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => new AdvertResource($advert)], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $advert = DB::insert('INSERT INTO adverts (title, description, animal_type_id, advert_address_id, user_id, advert_status_id) VALUES (?, ?, ?, ?, ?, ?)', [$request->title, $request->description, $request->animal_type_id, $request->advert_address_id, $request->user_id, $request->advert_status_id]);
            return response()->json(['success' => true, 'data' => $advert], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->has('title')) {
                $advert = DB::update('UPDATE adverts SET title = ? WHERE id = ?', [$request->title, $id]);
            }

            if ($request->has('description')) {
                $advert = DB::update('UPDATE adverts SET description = ? WHERE id = ?', [$request->description, $id]);
            }

            if ($request->has('animal_type_id')) {
                $advert = DB::update('UPDATE adverts SET animal_type_id = ? WHERE id = ?', [$request->animal_type_id, $id]);
            }

            if ($request->has('advert_address_id')) {
                $advert = DB::update('UPDATE adverts SET advert_address_id = ? WHERE id = ?', [$request->advert_address_id, $id]);
            }

            if ($request->has('advert_status_id')) {
                $advert = DB::update('UPDATE adverts SET advert_status_id = ? WHERE id = ?', [$request->advert_status_id, $id]);
            }

            return response()->json(['success' => true, 'data' => $advert], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $advert = DB::delete('DELETE FROM adverts WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $advert], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        }
    }
}
