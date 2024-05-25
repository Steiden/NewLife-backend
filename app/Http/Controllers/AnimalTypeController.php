<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnimalTypeController extends Controller
{
    public function index() {
        try {
            $animalTypes = DB::statement('SELECT * FROM animal_types');
            return response()->json(['success' => true, 'data' => $animalTypes]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function show($id) {
        try {
            $animalType = DB::statement('SELECT * FROM animal_types WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $animalType]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request) {
        try {
            $animalType = DB::statement('INSERT INTO animal_types (type) VALUES (?)', [$request->type]);
            return response()->json(['success' => true, 'data' => $animalType]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id) {
        try {
            $animalType = DB::statement('UPDATE animal_types SET type = ? WHERE id = ?', [$request->type, $id]);
            return response()->json(['success' => true, 'data' => $animalType]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id) {
        try {
            $animalType = DB::statement('DELETE FROM animal_types WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $animalType]);
        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
