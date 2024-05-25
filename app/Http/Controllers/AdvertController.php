<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertController extends Controller
{
    public function index() {
        try {
            $adverts = DB::statement('SELECT * FROM adverts');
            return response()->json(['success' => true, 'data' => $adverts], 200);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        }
    }

    public function show($id) {
        try {
            $advert = DB::statement('SELECT * FROM adverts WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $advert], 200);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request) {
        try {
            $advert = DB::statement('INSERT INTO adverts (title, description) VALUES (?, ?)', [$request->title, $request->description]);
            return response()->json(['success' => true, 'data' => $advert], 200);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request, $id) {
        try {
            $advert = DB::statement('UPDATE adverts SET title = ?, description = ? WHERE id = ?', [$request->title, $request->description, $id]);
            return response()->json(['success' => true, 'data' => $advert], 200);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        }
    }

    public function destroy($id) {
        try {
            $advert = DB::statement('DELETE FROM adverts WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $advert], 200);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        }
    }
}
