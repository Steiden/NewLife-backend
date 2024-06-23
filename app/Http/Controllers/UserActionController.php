<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserActionController extends Controller
{
    public function index()
    {
        try {
            $userActions = DB::select('SELECT * FROM user_actions');
            return response()->json(['success' => true, 'data' => $userActions]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $userAction = DB::selectOne('SELECT * FROM user_actions WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $userAction]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $userAction = DB::insert('INSERT INTO user_actions (user_action_type_id, user_id, created_at) VALUES (?, ?, ?)', [$request->user_action_type_id, $request->user_id, now()]);
            return response()->json(['success' => true, 'data' => $userAction]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->has('user_action_type_id')) {
                $userAction = DB::update('UPDATE user_actions SET user_action_type_id = ? WHERE id = ?', [$request->user_action_type_id, $id]);
            }

            if ($request->has('user_id')) {
                $userAction = DB::update('UPDATE user_actions SET user_id = ? WHERE id = ?', [$request->user_id, $id]);
            }

            return response()->json(['success' => true, 'data' => $userAction]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $userAction = DB::delete('DELETE FROM user_actions WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $userAction]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
