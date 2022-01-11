<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookmarkRequest;
use App\Http\Requests\UpdateBookmarkRequest;
use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Post\PostResource;
use App\Models\Bookmark;
use App\Models\Post;
use App\Repositories\Eloquent\Repository\BookmarkRepository;

class BookmarkController extends Controller
{
    private $bookmarkRepository;

    public function __construct(BookmarkRepository $bookmarkRepository)
    {
        $this->bookmarkRepository = $bookmarkRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('api')->user();
        return $this->sendSuccess([new PostCollection($user->bookmarks), 'Bookmarks fetched successfully']);
    }


    /**
     * Bookmark Post
     *
     * @param \App\Http\Requests\StoreBookmarkRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
        $result = $this->bookmarkRepository->bookmarkPost(['post' => $post]);
        if (!$result) {
            return $this->sendError('You have already bookmarked this post', 400);
        }
        return $this->sendSuccess([], 'Post has been successfully added to you bookmark');
    }


    /**
     * Remove Post From Bookmark
     *
     * @param \App\Models\Bookmark $bookmark
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function destroy(Bookmark $bookmark)
    {
        $bookmark->deleteOrFail();
        return $this->sendSuccess([], 'Post has been successfully removed');
    }
}
