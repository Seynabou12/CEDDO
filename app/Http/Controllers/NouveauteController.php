<?php

namespace App\Http\Controllers;

use App\Models\Nouveaute;
use Illuminate\Http\Request;

class NouveauteController extends Controller
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
        $nouveautes = $uuid != null ? Nouveaute::findByUuid($uuid) : Nouveaute::all();

        if (isset($request->json))
            return response()->json($nouveautes);
        else
            return view("pages/nouveaute/index", compact("nouveautes"));
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
        $fileName = time() . $request->file('imageCouverture')->getClientOriginalName();
        $path = $request->file('imageCouverture')->storeAs('image', $fileName, 'public');
        $input['imageCouverture'] = '/storage/' . $path;

        $nouveaute = Nouveaute::create([
            'titre' => $input['titre'],
            'contexte' => $input['contexte'],
            'nombrePage' => $input['nombrePage'],
            'imageCouverture' => $input['imageCouverture'],
            'nomAuteur' => $input['nomAuteur'],
            'biographie' => $input['biographie'],
        ]);
        
        return redirect()->route("nouveaute.get")->with("success", "La nouveaute a été bien enregistrer");
    }
}
