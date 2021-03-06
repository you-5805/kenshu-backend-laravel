<?php

namespace App\Services;

use App\Models\Post;

use App\Services\DestroyPostServiceInterface;
use Illuminate\Validation\UnauthorizedException;

class DestroyPostService implements DestroyPostServiceInterface
{
    public function execute($post_id, $current_user_id)
    {
        /** @var Post|null */
        $post = Post::findOrFail($post_id);

        if ($post->user->id !== $current_user_id) {
            throw new UnauthorizedException();
        }

        $post->delete();
    }
}
