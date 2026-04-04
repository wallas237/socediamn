<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CommunicationSalle extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($item) {
                return [
                    'id' => $item->id,
                    'type' => $item->type,
                    'libelle_session' => $item->libelle_session,
                    'date_heure' => $item->date_heure,
                    'date_fin' => $item->date_fin,
                    'status' => $item->status,
                    'libelle_salle' => $item->libelle_salle,
                    'moderateur' => $item->moderateur,
                ];
            }),
        ];
        //parent::toArray($request);
    }
}
