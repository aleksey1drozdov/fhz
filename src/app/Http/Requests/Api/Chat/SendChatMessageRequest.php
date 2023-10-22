<?php
declare(strict_types=1);

namespace App\Http\Requests\Api\Chat;

use Illuminate\Foundation\Http\FormRequest;

class SendChatMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message' => [
                'required',
                'string',
                'max:256',
            ]
        ];
    }
}
