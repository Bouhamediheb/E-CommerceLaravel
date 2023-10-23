<?php
namespace App\Http\Controllers;
use App\Models\Scategorie;
use Illuminate\Http\Request;
class ScategorieController extends Controller
{
public function index()
{
$scategories = Scategorie::with('categories')->get();
return $scategories;
}

public function store(Request $request)
{
$scategorie = new Scategorie([
'nomscategorie' => $request->input('nomscategorie'),
'imagescategorie' => $request->input('imagescategorie'),
'categorieID' => $request->input('categorieID'),
]);
$scategorie->save();
return response()->json($scategorie,201);
}


public function show($id)
{
$scategorie = Scategorie::find($id);
return response()->json($scategorie);
}


public function update(Request $request, $id)
{
$scategorie = Scategorie::find($id);
$scategorie->update($request->all());
return response()->json($scategorie,200);
}

public function destroy($id)
{
$scategorie = Scategorie::find($id);
$scategorie->delete();
return response()->json('Scategorie supprimée !');
}


public function showSCategorieByCAT($idcat)
{
    $Scategorie= Scategorie::where('categorieID', $idcat)->with('categories')->get();
    return response()->json($Scategorie);
}



}