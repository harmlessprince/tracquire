<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeactivateAccountController extends Controller
{

    public function destroy(Request $request)
    {
        $this->validate($request, [
            'password' => ['required', 'string', 'max:200']
        ]);
        $user = $request->user();
        if (!Hash::check($request->password, $user->password)) {
            return $this->respondError('The password supplied is incorrect');
        }
        $userId = $request->user()->id;
        $user->token()->revoke();
        User::where('id', $userId)->delete();
        return $this->sendSuccess([], 'Account deactivated successfully');
    }
}
