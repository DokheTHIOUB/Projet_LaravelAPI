<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use Exception;
use Illuminate\Http\Request; 


class FormationController extends Controller
{

    //liste des formations
    public function index(Formation $formation)
    {
        try {
            return response()->json([
                'status_code' => 200,
                'status_message' => 'Voici la liste des formations',
                'formation' => Formation::all(),
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    //Ajouter des formations
    public function store(Request $request)
    {
        
        try {
            $formation = new Formation();
            $formation->nom_formation = $request->nom_formation;
            $formation->description = $request->description;
            $formation->duree = $request->duree;
            $formation->save();
            return response()->json([
                'status_code' => 200, //Pour montrer que la réquete a été effectuer
                'status_message' => 'La formation a été ajouté',
                'formation' => $formation
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

     //Modifier des formations
    public function update(Request $request, formation $formation)
    {
        try {
            $formation->nom_formation = $request->nom_formation;
            $formation->description = $request->description;
            $formation->duree= $request->duree;
            $formation->save();
            return response()->json([
                'status_code' => 200,
                'status_message' => 'La formation a été modifié',
                'formation' => $formation
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

     //SUPPRIMER des formations

    public function destroy(Formation $formation)
    {
        try {
            $formation->delete();
           
            return response()->json([
                'status_code' => 200,
                'status_message' => 'La formation a été supprimé',
                'formation' => $formation
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
}
