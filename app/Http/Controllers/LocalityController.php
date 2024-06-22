<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocalityController extends Controller
{
    public function index()
    {
        try {
            $localities = DB::select('SELECT * FROM localities');
            return response()->json(['success' => true, 'data' => $localities]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $locality = DB::selectOne('SELECT * FROM localities WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $locality]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $locality = DB::insert('INSERT INTO localities (name, region_id) VALUES (?, ?)', [$request->name, $request->region_id]);
            return response()->json(['success' => true, 'data' => $locality]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->has('name')) {
                $locality = DB::update('UPDATE localities SET name = ? WHERE id = ?', [$request->name, $id]);
            }

            if ($request->has('region_id')) {
                $locality = DB::update('UPDATE localities SET region_id = ? WHERE id = ?', [$request->region_id, $id]);
            }

            return response()->json(['success' => true, 'data' => $locality]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $locality = DB::delete('DELETE FROM localities WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $locality]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
