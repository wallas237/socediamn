<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RessourceAjouterDetailSessions extends JsonResource
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
            'libelle_detail_session' => $this->libelle_detail_session,
            'libelle_salle' => $this->libelle_salle,
            'communication_salle_id' => $this->communication_salle_id,
            'orateur'=>$this->orateur,
        ];
    }
}
