<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Http\Requests\StoreSwapRequest;
use App\Models\Post;
use App\Repositories\Eloquent\Repository\PostRepository;
use App\Repositories\Eloquent\Repository\SwapRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use Illuminate\Http\Request;

class SwapController extends Controller
{
    private $swapRepository;
    private $postRepository;
    private $userRepository;

    public function __construct(SwapRepository $swapRepository, PostRepository $postRepository, UserRepository $userRepository)
    {
        $this->swapRepository = $swapRepository;
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    public function store(StoreSwapRequest $request)
    {
        $post = $this->postRepository->findById($request->post_id);
        $post->update([
            'status' => PostStatus::CLOSED,
        ]);
        $swap = $this->swapRepository->create($request->validated());
        return $this->sendSuccess([], 'Swap completed successfully');
    }
}
