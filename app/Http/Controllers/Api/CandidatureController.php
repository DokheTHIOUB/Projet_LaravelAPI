<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Candidature;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{


    public function index(Candidature $candidature)
    {
        try {
            return response()->json([
                'status_code' => 200,
                'status_message' => 'Voici la liste de tout les candidatures',
                'candidature' => Candidature::all(),
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }


    public function store(Request $request)
    {
        $candidature = new Candidature();

        $candidature->formation_id = $request->formation_id;
        $candidature->user_id = auth()->user()->id;
        $candidature->save();

        return response()->json([
            'status_code' => 200,
            'status_message' => 'candidature enregistrer',
            'status_body' => $candidature
        ]);

    }


    public function Statut(Candidature $candidature)
    {
        try { 
            if ($candidature->statut=== 'refuser'){ 
            $candidature->update(["statut" => 'accepter']);
            $candidature->save();
            return response()->json([
                'status_code' => 200,
                'status_message' => " la candidature a été accepté ",
            ]);
        }
            else {
                $candidature->update(["statut" => 'refuser']);
                $candidature->save();
            }
        } catch (Exception $e) {
            return response()->json($e)([
                'status_message' => " la candidature a été refusé ",
            ]);
          
        }
    }

    
    public function AccepterCandidature(Candidature $candidature)
    {
        try {
            if ($candidature->statut=== 'accepter') {
                return response()->json([
                    'status_code' => 200,
                    'status_message' => 'Voici la liste des candidatures acceptées',
                    'candidature' => Candidature::where('accepter')->get(),
                ]);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }


    public function RefuserCandidature(Candidature $candidature)
    {
        try {
            if ($candidature->statut=== 'accepter') {
                return response()->json([
                    'status_code' => 200,
                    'status_message' => 'Voici la liste des candidatures acceptées',
                    'candidature' => Candidature::where('accepter')->get(),
                ]);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

}


