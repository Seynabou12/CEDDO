<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategorieController extends Controller
{


    /**
     * recuperer une categorie ou la liste des categorie
     *
     * @param Request $request
     * @param string $uuid
     * @return void
     */
    public function get(Request $request, string $uuid = null)
    {
        $categories = $uuid != null ? Categorie::findByUuid($uuid) : Categorie::all();

        if (isset($request->json))
            return response()->json($categories);
        else
            return view("pages/categorie/liste", compact("categories"));
    }

    /**
     * ajouter ou modifier une categorie
     *
     * @param Request $request
     * @param string $uuid
     * @return void
     */
    public function save(Request $request, string $uuid = null)
    {
        $request->validate(
            [
                "libelle" => "required"
            ],
            [
                "libelle.required" => "Le Nom de la categorie est obligatoire",
            ]
        );

        $categorie = $uuid == null ? new Categorie() : Categorie::findByUuid($uuid);
        $categorie->fill($request->all());
        $categorie->save();
        return redirect()->route("categorie.get")->with("success", "La categorie a été bien enregistrer");
    }

    /**
     * supprimer une categorie
     *
     * @param string $uuid
     * @return void
     */
    public function delete(string $uuid)
    {
        try {
            $categorie =  Categorie::findByUuid($uuid);
            $categorie->delete();
            return redirect()->route("categorie.get")->with("success", "La categorie a été bien supprimer");
        } catch (\Throwable $th) {
            return back()->withErrors("Impossible de supprimer cette categorie");
        }
    }
}
