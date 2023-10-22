<?php
declare(strict_types=1);

namespace App\Services;

use App\DTO\Chat\SendMessageDTO;
use App\Events\MessageSent;
use App\Models\ChatHistory;
use DB;
use Illuminate\Support\Collection;
use Throwable;

class ChatService
{
    private const DEFAULT_HISTORY_LIMIT = 25;

    /**
     * @param SendMessageDTO $dto
     * @return ChatHistory|false
     * @throws Throwable
     */
    public function sendMessage(SendMessageDTO $dto): ChatHistory|false
    {
        return DB::transaction(static function () use ($dto) {
            $sentMessage = (new ChatHistory([
                'user_id' => $dto->userId,
                'message' => $dto->message
            ]));

            if ($sentMessage->save()) {
                broadcast(new MessageSent($sentMessage))->toOthers();

                return $sentMessage;
            }

            return false;
        });
    }

    /**
     * @return Collection
     */
    public function getHistory(): Collection
    {
        return ChatHistory::query()->limit(self::DEFAULT_HISTORY_LIMIT)->orderByDesc('id')->get();
    }
}
