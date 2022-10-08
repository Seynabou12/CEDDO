<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * recuperer un livre ou la liste des livres
     *
     * @param Request $request
     * @param string $uuid
     * @return void
     */
    public function get(Request $request, string $uuid = null)
    {
        $livres = $uuid != null ? Livre::findByUuid($uuid) : Livre::all();
        $categories = Categorie::all();

        if (isset($request->json))
            return response()->json($livres);
        else
            return view("pages/livre/liste", compact("livres", "categories"));
    }


    /**
     * ajouter ou modifier un livre
     *
     * @param Request $request
     * @param string|null $uuid
     * @return void
     */
    public function save(Request $request, string $uuid = null)
    {
        $request->validate(
            [
                "datePublication" => "required"
            ],
            [
                "datePublication.required" => "Le datePublication de la acteur est obligatoire",
            ],
            [
                "publication" => "required"
            ],
            [
                "publication.required" => "Le publication de la acteur est obligatoire",
            ],
            [
                "imageCouverture" => "required"
            ],
            [
                "imageCouverture.required" => "La imageCouverture de la acteur est obligatoire",
            ],
            [
                "description" => "required"
            ],
            [
                "description.required" => "La description de la acteur est obligatoire",
            ],
            [
                "nombrePage" => "required"
            ],
            [
                "nombrePage.required" => "La nombrePage de la acteur est obligatoire",
            ],
            [
                "langue" => "required"
            ],
            [
                "langue.required" => "La langue de la acteur est obligatoire",
            ],
            [
                "pdf" => "required"
            ],
            [
                "pdf.required" => "La pdf de la acteur est obligatoire",
            ],
            [
                "isbn" => "required"
            ],
            [
                "isbn.required" => "La isbn de la acteur est obligatoire",
            ],
            [
                "date" => "required"
            ],
            [
                "date.required" => "La date de la acteur est obligatoire",
            ]
        );
        //&& $request->service_id == null
        if ($request->categorie_id == null) {
            return back()->withErrors("Vous devez selectionner une categorie ou un service");
        }
        $livre = $uuid == null ? new Livre() : Livre::findByUuid($uuid);
        $livre->fill($request->all());
        $livre->save();
        return redirect()->route("livre.get")->with("success", "Le livre a été bien enregistré");
    }


    /**
     * supprimer un service
     *
     * @param string $uuid
     * @return void
     */
    public function delete(string $uuid)
    {
        try {
            $livre = Livre::findByUuid($uuid);
            $livre->delete();
            return redirect()->route("livre.get")->with("success", "Le livre a été bien supprimer");
        } catch (\Throwable $th) {
            return back()->withErrors("Impossible de  supprimer ce livre");
        }
    }
}
