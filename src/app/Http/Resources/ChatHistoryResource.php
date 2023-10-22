<?php
declare(strict_types=1);

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => $this->user->name,
            'message' => $this->message,
            'time' => Carbon::createFromTimeString($this->created_at)
                ->format(Carbon::DEFAULT_TO_STRING_FORMAT)
        ];
    }
}
