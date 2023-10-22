<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\DTO\Chat\SendMessageDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Chat\SendChatMessageRequest;
use App\Http\Resources\ChatHistoryResource;
use App\Services\ChatService;
use Auth;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Throwable;

class ChatController extends Controller
{
    /**
     * @param SendChatMessageRequest $request
     * @return ChatHistoryResource
     * @throws Throwable
     * @throws UnknownProperties
     */
    public function send(SendChatMessageRequest $request): ChatHistoryResource
    {
        $sentMessage = (new ChatService())->sendMessage(new SendMessageDTO(
            message: $request->input('message') ?? '',
            userId: Auth::user()->id
        ));

        return new ChatHistoryResource($sentMessage);
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function history(): AnonymousResourceCollection
    {
        return ChatHistoryResource::collection(
            (new ChatService())->getHistory()
        );
    }
}
