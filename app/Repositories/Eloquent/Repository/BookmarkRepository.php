<?php

namespace App\Repositories\Eloquent\Repository;

use App\Exceptions\PostAlreadyBookmarkedException;
use App\Models\Bookmark;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\False_;
use function PHPUnit\Framework\throwException;

class BookmarkRepository extends BaseRepository
{
    public function __construct(Bookmark $model)
    {
        parent::__construct($model);
    }

    /**
     *
     */
    public function bookmarkPost(array $payload): ?bool
    {
        $user = auth('api')->user();
        $post = $payload['post'];
        if ($this->hasPostBooked($user, $post)) {
            return false;
        }
        $user->bookmarks()->create([
            'post_id' => $post->id,
        ]);
        return true;
    }

    public function hasPostBooked($user, $post): bool
    {
        return $user->bookmarks()->where('post_id', $post->id)->exists();
        // return $user->bookmarks()->newPivotStatementForId($post->id)->exists();
    }
}
