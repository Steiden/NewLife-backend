<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserBlockingController extends Controller
{
    public function index()
    {
        try {
            $userBlockings = DB::select('SELECT * FROM user_blockings');
            return response()->json(['success' => true, 'data' => $userBlockings]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $userBlocking = DB::select('SELECT * FROM user_blockings WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $userBlocking]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $userBlocking = DB::insert('INSERT INTO user_blockings (period, reason, user_id) VALUES (?, ?, ?)', [$request->period, $request->reason, $request->user_id]);
            return response()->json(['success' => true, 'data' => $userBlocking]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->has('period')) {
                $userBlocking = DB::update('UPDATE user_blockings SET period = ? WHERE id = ?', [$request->period, $id]);
            }

            if ($request->has('reason')) {
                $userBlocking = DB::update('UPDATE user_blockings SET reason = ? WHERE id = ?', [$request->reason, $id]);
            }

            if ($request->has('user_id')) {
                $userBlocking = DB::update('UPDATE user_blockings SET user_id = ? WHERE id = ?', [$request->user_id, $id]);
            }

            return response()->json(['success' => true, 'data' => $userBlocking]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $userBlocking = DB::delete('DELETE FROM user_blockings WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $userBlocking]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
