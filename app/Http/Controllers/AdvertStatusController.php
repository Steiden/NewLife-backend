<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertStatusController extends Controller
{
    public function index()
    {
        try {
            $advertStatuses = DB::select('SELECT * FROM advert_statuses');
            return response()->json(['success' => true, 'data' => $advertStatuses]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $advertStatus = DB::selectOne('SELECT * FROM advert_statuses WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $advertStatus]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $advertStatus = DB::insert('INSERT INTO advert_statuses (name) VALUES (?)', [$request->name]);
            return response()->json(['success' => true, 'data' => $advertStatus]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->has('name')) {
                $advertStatus = DB::update('UPDATE advert_statuses SET name = ? WHERE id = ?', [$request->name, $id]);
            }

            return response()->json(['success' => true, 'data' => $advertStatus]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $advertStatus = DB::delete('DELETE FROM advert_statuses WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $advertStatus]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
