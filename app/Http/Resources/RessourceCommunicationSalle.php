<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Psy\Util\Json;

class RessourceCommunicationSalle extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'type' => $this->type,
            'libelle_session' => $this->libelle_session,
            'date_heure' => $this->date_heure,
            'date_fin' => $this->date_fin,
            'status' => $this->status,
            'libelle_salle' => $this->libelle_salle,
            'moderateur' => $this->moderateur,
        ];
    }
}
