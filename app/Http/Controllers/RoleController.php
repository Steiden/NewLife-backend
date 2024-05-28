<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index() {
        try {
            $roles = DB::select('SELECT * FROM roles');
            return response()->json(['success' => true, 'data' => $roles]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request) {
        try {
            $role = DB::insert('INSERT INTO roles (name) VALUES (?)', [$request->name]);
            return response()->json(['success' => true, 'data' => $role]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id) {
        try {
            $role = DB::update('UPDATE roles SET name =? WHERE id =?', [$request->name, $id]);
            return response()->json(['success' => true, 'data' => $role]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try {
            $role = DB::delete('DELETE FROM roles WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $role]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
