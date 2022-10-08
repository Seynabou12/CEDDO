<?php

namespace App\Http\Controllers;

use App\Models\Acteur;
use Illuminate\Http\Request;

class ActeurController extends Controller
{
    /**
     * recuperer une acteur ou la liste des acteur
     *
     * @param Request $request
     * @param string $uuid
     * @return void
     */
    public function get(Request $request, string $uuid = null)
    {
        $acteurs = $uuid != null ? Acteur::findByUuid($uuid) : Acteur::all();

        if (isset($request->json))
            return response()->json($acteurs);
        else
            return view("pages/acteur/liste", compact("acteurs"));
    }

    /**
     * ajouter ou modifier une acteur
     *
     * @param Request $request
     * @param string $uuid
     * @return void
     */
    public function save(Request $request, string $uuid = null)
    {
        $request->validate(
            [
                "prenom" => "required"
            ],
            [
                "prenom.required" => "Le Prenom de la acteur est obligatoire",
            ],
            [
                "nom" => "required"
            ],
            [
                "nom.required" => "Le Nom de la acteur est obligatoire",
            ],
            [
                "fonction" => "required"
            ],
            [
                "fonction.required" => "La Fonction de la acteur est obligatoire",
            ],
            [
                "biographie" => "required"
            ],
            [
                "biographie.required" => "La Biographie de la acteur est obligatoire",
            ]
        );

        $acteur = $uuid == null ? new Acteur() : Acteur::findByUuid($uuid);
        $acteur->fill($request->all());
        $acteur->save();
        return redirect()->route("acteur.get")->with("success", "La acteur a été bien enregistrer");
    }

    /**
     * supprimer une acteur
     *
     * @param string $uuid
     * @return void
     */
    public function delete(string $uuid)
    {
        try {
            $acteur =  Acteur::findByUuid($uuid);
            $acteur->delete();
            return redirect()->route("acteur.get")->with("success", "La acteur a été bien supprimer");
        } catch (\Throwable $th) {
            return back()->withErrors("Impossible de supprimer cette acteur");
        }
    }
}
