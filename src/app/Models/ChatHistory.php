<?php
declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;


/**
 * App\Models\ChatHistory
 *
 * @property int $id
 * @property string $message
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User|null $user
 * @method static Builder|ChatHistory newModelQuery()
 * @method static Builder|ChatHistory newQuery()
 * @method static Builder|ChatHistory query()
 * @method static Builder|ChatHistory whereCreatedAt($value)
 * @method static Builder|ChatHistory whereId($value)
 * @method static Builder|ChatHistory whereMessage($value)
 * @method static Builder|ChatHistory whereUpdatedAt($value)
 * @method static Builder|ChatHistory whereUserId($value)
 * @mixin Eloquent
 */
class ChatHistory extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'user_id'];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
