<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $categorie = new Categorie([
            'nomcategorie' => $request->input('nomcategorie'),
            'imagecategorie' => $request->input('imagecategorie')
        ]);
        $categorie->save();
        return response()->json($categorie, 201);
    }

    public function show($id)
    {
        $categorie = Categorie::find($id);
        if ($categorie) {
            return response()->json($categorie);
        } else {
            return response()->json(['error' => 'Categorie not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $categorie = Categorie::find($id);
        if ($categorie) {
            $categorie->update($request->all());
            return response()->json($categorie, 200);
        } else {
            return response()->json(['error' => 'Categorie not found'], 404);
        }
    }

    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        if ($categorie) {
            $categorie->delete();
            return response()->json('Categorie supprimée !');
        } else {
            return response()->json(['error' => 'Categorie not found'], 404);
        }
    }
}
