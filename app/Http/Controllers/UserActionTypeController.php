<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserActionTypeController extends Controller
{
    public function index() {
        try {
            $userActionTypes = DB::statement('SELECT * FROM user_action_types');
            return response()->json(['success' => true, 'data' => $userActionTypes]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function show($id) {
        try {
            $userActionType = DB::statement('SELECT * FROM user_action_types WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $userActionType]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function store(Request $request) {
        try {
            $userActionType = DB::statement('INSERT INTO user_action_types (name) VALUES (?)', [$request->name]);
            return response()->json(['success' => true, 'data' => $userActionType]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id) {
        try {
            $userActionType = DB::statement('UPDATE user_action_types SET name =? WHERE id =?', [$request->name, $id]);
            return response()->json(['success' => true, 'data' => $userActionType]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try {
            $userActionType = DB::statement('DELETE FROM user_action_types WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $userActionType]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
