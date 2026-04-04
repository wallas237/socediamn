<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reclamation extends Model
{
    use HasFactory;

    // ═══ CONFIGURATION DU MODÈLE ═════════════════════════════════════════════════
    
    /**
     * Tableau des attributs qui peuvent être assignés en masse
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'civilite',
        'nom',
        'prenom',
        'email',
        'telephone',
        'objet',
        'description',
        'statut',
        'notes_admin',
    ];

    /**
     * Tableau des attributs qui doivent être castés
     * 
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'date_traitement' => 'datetime',
    ];

    // ═══ ACCESSEURS ══════════════════════════════════════════════════════════════

    /**
     * Obtient le nom complet du réclamant
     * 
     * @return string
     */
    public function getNomCompletAttribute()
    {
        return "{$this->prenom} {$this->nom}";
    }

    /**
     * Obtient la civilité formatée
     * 
     * @return string
     */
    public function getCiviliteFormateeAttribute()
    {
        $civilites = [
            'M.' => 'Monsieur',
            'Mme' => 'Madame',
            'Mlle' => 'Mademoiselle',
            'Dr' => 'Docteur',
            'Pr' => 'Professeur',
        ];

        return $civilites[$this->civilite] ?? $this->civilite;
    }

    /**
     * Obtient l'objet formaté (titre lisible)
     * 
     * @return string
     */
    public function getObjetFormatAttribute()
    {
        $objets = [
            'Qualite_service' => 'Qualité du service',
            'Probleme_technique' => 'Problème technique',
            'Inscription' => 'Inscription',
            'Accreditation' => 'Accréditation',
            'Certification' => 'Certification',
            'Autre' => 'Autre',
        ];

        return $objets[$this->objet] ?? $this->objet;
    }

    /**
     * Obtient la couleur du badge de statut
     * 
     * @return string
     */
    public function getCouleurStatutAttribute()
    {
        $couleurs = [
            'En attente' => 'warning',    // jaune
            'En traitement' => 'info',    // bleu
            'Traitée' => 'success',       // vert
            'Fermée' => 'secondary',      // gris
        ];

        return $couleurs[$this->statut] ?? 'secondary';
    }

    // ═══ SCOPES ══════════════════════════════════════════════════════════════════

    /**
     * Scope pour filtrer les réclamations en attente
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEnAttente($query)
    {
        return $query->where('statut', 'En attente');
    }

    /**
     * Scope pour filtrer les réclamations récentes (7 derniers jours)
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRecentes($query)
    {
        return $query->where('created_at', '>=', now()->subDays(7));
    }

    /**
     * Scope pour rechercher par email ou nom
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('email', 'like', "%{$search}%")
            ->orWhere('nom', 'like', "%{$search}%")
            ->orWhere('prenom', 'like', "%{$search}%");
    }
}
