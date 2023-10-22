<?php
declare(strict_types=1);

namespace App\DTO\Chat;

use Spatie\DataTransferObject\DataTransferObject;

class SendMessageDTO extends DataTransferObject
{
    public string $message;
    public int $userId;
}
