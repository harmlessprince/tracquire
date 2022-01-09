<?php

namespace App\Http\Controllers\User;

use App\Helper\HttpResponseMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarUploadRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateProfileImageController extends Controller
{
    //
    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function update(AvatarUploadRequest $request, User $user)
    {
        $request->setMethod('PATCH');
        try {
            if ( $request->file('avatar')->isValid()) {
                $user->addMediaFromRequest('avatar')->toMediaCollection('avatar', 'profile');
            }
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), $exception->getCode());
        }
        return $this->sendSuccess(['avatar' => $user->getFirstMediaUrl('avatar')], 'Profile image uploaded successfully!', 200);

    }
}