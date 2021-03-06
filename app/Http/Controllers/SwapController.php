<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Enums\SwapType;
use App\Http\Requests\StoreSwapRequest;
use App\Http\Resources\SwapResource;
use App\Models\Post;
use App\Repositories\Eloquent\Repository\PostRepository;
use App\Repositories\Eloquent\Repository\SwapRepository;
use App\Repositories\Eloquent\Repository\UserRepository;
use Illuminate\Http\Request;

/**
 * @group Complete Give Or Swap
 *
 * @authenticated
 *
 * API endpoints for completing give or swap transactions
 *
 */
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

    /**
     * View Complete Transaction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $swap = $this->swapRepository->findById($id);
        abort_if(!$swap, 400, 'Give has already been completed on this post');
        return $this->sendSuccess([new SwapResource($swap->load('receiver', 'owner'))], 'Give completed successfully');
    }

    /**
     * Complete Give
     *
     * @return \Illuminate\Http\Response
     */
    public function storeGive(StoreSwapRequest $request)
    {
        $post = $this->postRepository->findById($request->post_id);
        abort_if($post->swap()->exists(), 400, 'Give has already been completed on this post');
        $post->update([
            'status' => PostStatus::CLOSED,
        ]);
        $give = $this->createSwap(SwapType::GIVE, $request);
        return $this->sendSuccess([new SwapResource($give)], 'Give completed successfully');
    }

    /**
     * Complete Swap
     * @return \Illuminate\Http\Response
     */
    public function storeSwap(StoreSwapRequest $request)
    {
        $post = $this->postRepository->findById($request->post_id);
        abort_if($post->swap()->exists(), 400, 'Swap has already been completed on this post');
        $post->update([
            'status' => PostStatus::CLOSED,
        ]);
        $swap = $this->createSwap(SwapType::SWAP, $request);
        return $this->sendSuccess([new SwapResource($swap)], 'Swap completed successfully');
    }

    public function createSwap(string $type, $request)
    {
        $receiver = $this->userRepository->findByUserName($request->receiver_username);
        return $this->swapRepository->create(['type' => $type, 'owner_id' => auth()->id(), 'post_id' => $request->post_id, 'receiver_id' => $receiver->id]);
    }
}
