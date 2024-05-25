<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserActionController extends Controller
{
    public function index() {
        try {
            $userActions = DB::statement('SELECT * FROM user_actions');
            return response()->json(['success' => true, 'data' => $userActions]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function show($id) {
        try {
            $userAction = DB::statement('SELECT * FROM user_actions WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $userAction]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request) {
        try {
            $userAction = DB::statement('INSERT INTO user_actions (name) VALUES (?)', [$request->name]);
            return response()->json(['success' => true, 'data' => $userAction]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id) {
        try {
            $userAction = DB::statement('UPDATE user_actions SET name =? WHERE id =?', [$request->name, $id]);
            return response()->json(['success' => true, 'data' => $userAction]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try {
            $userAction = DB::statement('DELETE FROM user_actions WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $userAction]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
