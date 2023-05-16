<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class DeactivateAccountController extends Controller
{

    public function destroy(Request $request)
    {
        $user = $request->user();
        $userId = $request->user()->id;
        $user->token()->revoke();
        User::where('id', $userId)->delete();
        return $this->sendSuccess([], 'Account deactivated successfully');
    }
}
