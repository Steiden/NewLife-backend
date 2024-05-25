<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserBlockingController extends Controller
{
    public function index() {
        try {
            $userBlockings = DB::statement('SELECT * FROM user_blockings');
            return response()->json(['success' => true, 'data' => $userBlockings]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request) {
        try {
            $userBlocking = DB::statement('INSERT INTO user_blockings (user_id, blocked_user_id) VALUES (?, ?)', [$request->user_id, $request->blocked_user_id]);
            return response()->json(['success' => true, 'data' => $userBlocking]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function show($id) {
        try {
            $userBlocking = DB::statement('SELECT * FROM user_blockings WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $userBlocking]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id) {
        try {
            $userBlocking = DB::statement('UPDATE user_blockings SET user_id = ?, blocked_user_id = ? WHERE id = ?', [$request->user_id, $request->blocked_user_id, $id]);
            return response()->json(['success' => true, 'data' => $userBlocking]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try {
            $userBlocking = DB::statement('DELETE FROM user_blockings WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $userBlocking]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
