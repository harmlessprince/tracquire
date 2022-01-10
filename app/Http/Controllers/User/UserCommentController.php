<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


/**
 * @group Comment
 * @authenticated
 * API endpoints for managing users
 */

class UserCommentController extends Controller
{
     /**
     * All User Comments
     * @apiResourceCollection App\Http\Resources\Comment\CommentCollection
     * @apiResourceModel App\Models\Comment
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
}
