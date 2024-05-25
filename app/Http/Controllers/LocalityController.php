<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocalityController extends Controller
{
    public function index() {
        try {
            $localities = DB::statement('SELECT * FROM localities');
            return response()->json(['success' => true, 'data' => $localities]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function show($id) {
        try {
            $locality = DB::statement('SELECT * FROM localities WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $locality]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request) {
        try {
            $locality = DB::statement('INSERT INTO localities (locality) VALUES (?)', [$request->locality]);
            return response()->json(['success' => true, 'data' => $locality]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id) {
        try {
            $locality = DB::statement('UPDATE localities SET locality = ? WHERE id = ?', [$request->locality, $id]);
            return response()->json(['success' => true, 'data' => $locality]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try {
            $locality = DB::statement('DELETE FROM localities WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $locality]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
