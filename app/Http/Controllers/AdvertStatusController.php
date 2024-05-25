<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertStatusController extends Controller
{
    public function index() {
        try {
            $advertStatuses = DB::statement('SELECT * FROM advert_statuses');
            return response()->json(['success' => true, 'data' => $advertStatuses]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function show($id) {
        try {
            $advertStatus = DB::statement('SELECT * FROM advert_statuses WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $advertStatus]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request) {
        try {
            $advertStatus = DB::statement('INSERT INTO advert_statuses (status) VALUES (?)', [$request->status]);
            return response()->json(['success' => true, 'data' => $advertStatus]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id) {
        try {
            $advertStatus = DB::statement('UPDATE advert_statuses SET status = ? WHERE id = ?', [$request->status, $id]);
            return response()->json(['success' => true, 'data' => $advertStatus]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try {
            $advertStatus = DB::statement('DELETE FROM advert_statuses WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $advertStatus]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
