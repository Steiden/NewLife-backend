<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        try {
            $users = DB::statement('SELECT * FROM users');
            return response()->json(['success' => true, 'data' => $users]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function show($id) {
        try {
            $users = DB::statement('SELECT * FROM users WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $users]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request) {
        try {
            $users = DB::statement('INSERT INTO users (name, email) VALUES (?, ?)', [$request->name, $request->email]);
            return response()->json(['success' => true, 'data' => $users]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id) {
        try {
            $users = DB::statement('UPDATE users SET name = ?, email = ? WHERE id = ?', [$request->name, $request->email, $id]);
            return response()->json(['success' => true, 'data' => $users]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
