<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = DB::select('SELECT * FROM users');
            return response()->json(['success' => true, 'data' => UserResource::collection($users)]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $user = DB::selectOne('SELECT * FROM users WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => new UserResource($user)]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $user = DB::insert('INSERT INTO users (second_name, first_name, patronymic, telephone, email, login, password, is_banned, role_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)', [$request->second_name, $request->first_name, $request->patronymic, $request->telephone, $request->email, $request->login, $request->password, $request->is_banned, $request->role_id]);
            return response()->json(['success' => true, 'data' => $user]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->has('second_name')) {
                $user = DB::update('UPDATE users SET second_name = ? WHERE id = ?', [$request->second_name, $id]);
            }

            if ($request->has('first_name')) {
                $user = DB::update('UPDATE users SET first_name = ? WHERE id = ?', [$request->first_name, $id]);
            }

            if ($request->has('patronymic')) {
                $user = DB::update('UPDATE users SET patronymic = ? WHERE id = ?', [$request->patronymic, $id]);
            }

            if ($request->has('telephone')) {
                $user = DB::update('UPDATE users SET telephone = ? WHERE id = ?', [$request->telephone, $id]);
            }

            if ($request->has('email')) {
                $user = DB::update('UPDATE users SET email = ? WHERE id = ?', [$request->email, $id]);
            }

            if ($request->has('login')) {
                $user = DB::update('UPDATE users SET login = ? WHERE id = ?', [$request->login, $id]);
            }

            if ($request->has('password')) {
                $user = DB::update('UPDATE users SET password = ? WHERE id = ?', [$request->password, $id]);
            }

            if ($request->has('is_banned')) {
                $user = DB::update('UPDATE users SET is_banned = ? WHERE id = ?', [$request->is_banned, $id]);
            }

            if ($request->has('role_id')) {
                $user = DB::update('UPDATE users SET role_id = ? WHERE id = ?', [$request->role_id, $id]);
            }

            return response()->json(['success' => true, 'data' => $user]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $user = DB::delete('DELETE FROM users WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $user]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
