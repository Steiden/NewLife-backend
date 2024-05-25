<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertAddressController extends Controller
{
    public function index()
    {
        try {
            $advertAddress = DB::statement('SELECT * FROM advert_address');
            return response()->json(['success' => true, 'data' => $advertAddress], 200);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $advertAddress = DB::statement('SELECT * FROM advert_address WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $advertAddress], 200);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $advertAddress = DB::statement('INSERT INTO advert_address (address) VALUES (?)', [$request->address]);
            return response()->json(['success' => true, 'data' => $advertAddress], 200);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $advertAddress = DB::statement('UPDATE advert_address SET address = ? WHERE id = ?', [$request->address, $id]);
            return response()->json(['success' => true, 'data' => $advertAddress], 200);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $advertAddress = DB::statement('DELETE FROM advert_address WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $advertAddress], 200);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
