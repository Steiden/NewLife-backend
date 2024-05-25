<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
{
    public function index() {
        try {
            $regions = DB::statement('SELECT * FROM regions');
            return response()->json(['success' => true, 'data' => $regions]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function show($id) {
        try {
            $region = DB::statement('SELECT * FROM regions WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $region]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request) {
        try {
            $region = DB::statement('INSERT INTO regions (region) VALUES (?)', [$request->region]);
            return response()->json(['success' => true, 'data' => $region]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id) {
        try {
            $region = DB::statement('UPDATE regions SET region = ? WHERE id = ?', [$request->region, $id]);
            return response()->json(['success' => true, 'data' => $region]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try {
            $region = DB::statement('DELETE FROM regions WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $region]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
