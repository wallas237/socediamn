<?php

namespace App\Http\Controllers;

use App\Mail\ReclamationConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Log;

class ReclamationController extends Controller
{
    /**
     * Affiche le formulaire de réclamation
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('reclamation');
    }

    /**
     * Stocke la réclamation dans la base de données
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // return $request->all();
        // ─── VALIDATION DES DONNÉES ───────────────────────────────────────
        $validated = $request->validate([
            'civilite' => 'required|string|in:M.,Mme,Mlle,Dr,Pr',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|string',
            'objet' => 'required',
            'description' => 'required|string',
            
        ]);

        // ─── INSERTION DE LA RÉCLAMATION ──────────────────────────────────
        try {
            $reclamation = DB::table('reclamations')->insertGetId([
                'civilite' => $validated['civilite'],
                'nom' => $validated['nom'],
                'prenom' => $validated['prenom'],
                'email' => $validated['email'],
                'telephone' => $validated['telephone'],
                'objet' => $validated['objet'],
                'description' => $validated['description'],
                'statut' => 'En attente',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // ─── ENVOI DE L'EMAIL DE CONFIRMATION ──────────────────────────
            try {
                Mail::to($validated['email'])->send(new ReclamationConfirmation([
                    'civilite' => $validated['civilite'],
                    'nom' => $validated['nom'],
                    'prenom' => $validated['prenom'],
                    'objet' => $validated['objet'],
                    'numero' => $reclamation,
                ]));
            } catch (\Exception $e) {
                Log::error('Erreur envoi email réclamation: ' . $e->getMessage());
            }

            // ─── REDIRECTION AVEC MESSAGE DE SUCCÈS ────────────────────────
            return response()->json([
                "statusText" => "Votre réclamation a été enregistrée avec succès!",
                "ok" => true,
                "status" => 201
            ], 200);

        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'enregistrement de la réclamation: ' . $e->getMessage());

            return response()->json([
                "message" => "Une erreur est survenue lors de l'enregistrement de votre réclamation. Veuillez réessayer plus tard.",
                "ok" => false,
                "status" => 500
            ], 500);
        }
    }

    /**
     * Affiche la liste des réclamations (pour administration)
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reclamations = DB::table('reclamations')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.reclamations.index', ['reclamations' => $reclamations]);
    }

    /**
     * Affiche les détails d'une réclamation
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $reclamation = DB::table('reclamations')->where('id', $id)->first();

        if (!$reclamation) {
            abort(404, 'Réclamation non trouvée');
        }

        return view('admin.reclamations.show', ['reclamation' => $reclamation]);
    }

    /**
     * Mise à jour du statut d'une réclamation
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'statut' => 'required|string|in:En attente,En traitement,Traitée,Fermée',
        ]);

        try {
            DB::table('reclamations')
                ->where('id', $id)
                ->update([
                    'statut' => $request->statut,
                    'updated_at' => now(),
                ]);

            return redirect()->back()
                ->with('success', '✅ Le statut a été mis à jour.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', '❌ Erreur lors de la mise à jour du statut.');
        }
    }
}
