<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{

    public function edit()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function update(UserRequest $request)
    {

        $request->validate([
            'profile_info' => 'required'
        ]);

        $user = Auth::user();

        $user->update(
            $request->validationData()
        );

        return redirect()
            ->back()
            ->with('message', 'Berhasil menyimpan perubahan');

    }
}
