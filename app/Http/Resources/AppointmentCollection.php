<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AppointmentCollection extends ResourceCollection
{
    public static $wrap = null;
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->transform(function ($appointment) {
            return [
                'id' => $appointment->id,
                'title' => $appointment->title,
                'description' => $appointment->note,
                'start' => $appointment->start,
                'end' => $appointment->end,
                'company' => $appointment->user->company->name,
                'city' => $appointment->user->company->city,
                'street' => $appointment->user->company->street,
            ];
        })->toArray();
    }
}
