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
    public function save(Request $request)
    {

        $input = $request->all();
        $fileName = time() . $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $input['photo'] = '/storage/' . $path;

        $user = Acteur::create([
            'prenom'=>$input['prenom'],
            'nom'=>$input['nom'],
            'fonction'=>$input['fonction'],
            'biographie'=>$input['biographie'],
            'photo'=>$input['photo'],
        ]);
       
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
