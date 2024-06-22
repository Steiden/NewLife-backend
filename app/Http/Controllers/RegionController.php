<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
{
    public function index()
    {
        try {
            $regions = DB::select('SELECT * FROM regions');
            return response()->json(['success' => true, 'data' => $regions]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $region = DB::selectOne('SELECT * FROM regions WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $region]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $region = DB::insert('INSERT INTO regions (name) VALUES (?)', [$request->name]);
            return response()->json(['success' => true, 'data' => $region]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->has('name')) {
                $region = DB::update('UPDATE regions SET name = ? WHERE id = ?', [$request->name, $id]);
            }

            return response()->json(['success' => true, 'data' => $region]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $region = DB::delete('DELETE FROM regions WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $region]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
