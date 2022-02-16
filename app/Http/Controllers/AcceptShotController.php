<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Models\Post;
use App\Models\Shot;
use Illuminate\Http\Request;

/**
 * @group Shot Acceptance
 *
 * @authenticated
 *
 * API endpoints for accepting shot and canceling shot
 */
class AcceptShotController extends Controller
{
    /**
     * Accept Shot
     *
     * This endpoint is used for accepting shot by a post creator.
     *
     *
     * @urlParam post int required the post ID
     * @urlParam shot int required the shot been accepted ID
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function acceptShot(Request $request, Shot $shot)
    {
        $this->authorize('acceptShot', $shot);
//        $shot->post()->update([
//            'status' => PostStatus::CLOSED,
//        ]);
        $shot->update([
            'accepted' => true,
            'accepted_at' => now()
        ]);
        $this->sendSuccess([], 'Shot successfully accepted');
    }
    /**
     * Decline Shot
     *
     * This endpoint is used for accepting shot by a post creator.
     *
     *
     * @urlParam post int required the post ID
     * @urlParam shot int required the shot been accepted ID
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function declineShot(Request $request, Shot $shot, Post $post)
    {
        $this->authorize('decline-shot', $shot);
//        $shot->post()->update([
//            'status' => PostStatus::OPEN,
//        ]);
        $shot->update([
            'accepted' => false,
            'accepted_at' => null
        ]);
        $this->sendSuccess([], 'Shot successfully declined');
    }
}
