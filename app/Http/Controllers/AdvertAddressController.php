<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertAddressResource;
use App\Models\AdvertAddress;
use Database\Factories\AdvertAddressFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertAddressController extends Controller
{
    public function index()
    {
        try {
            $advertAddress = DB::select('SELECT * FROM advert_address');
            return response()->json(['success' => true, 'data' => $advertAddress], 200);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $advertAddress = DB::selectOne('SELECT * FROM advert_address WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $advertAddress], 200);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $result = DB::insert('INSERT INTO advert_address (street_name, house_number, locality_id) VALUES (?, ?, ?)', [$request->street_name, $request->house_number, $request->locality_id]);
            $advertAddresses = DB::select('SELECT * FROM advert_address WHERE street_name = ? AND house_number = ? AND locality_id = ?', [$request->street_name, $request->house_number, $request->locality_id]);
            $advertAddress = array_pop($advertAddresses);
            return response()->json(['success' => true, 'data' => new AdvertAddressResource($advertAddress)], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->has('street_name')) {
                $advertAddress = DB::update('UPDATE advert_address SET street_name = ? WHERE id = ?', [$request->street_name, $id]);
            }

            if ($request->has('house_number')) {
                $advertAddress = DB::update('UPDATE advert_address SET house_number = ? WHERE id = ?', [$request->house_number, $id]);
            }

            if ($request->has('locality_id')) {
                $advertAddress = DB::update('UPDATE advert_address SET locality_id = ? WHERE id = ?', [$request->locality_id, $id]);
            }

            return response()->json(['success' => true, 'data' => $advertAddress], 200);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $advertAddress = DB::delete('DELETE FROM advert_address WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $advertAddress], 200);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
