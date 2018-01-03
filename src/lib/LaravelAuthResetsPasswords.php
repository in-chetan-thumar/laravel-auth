<?php

namespace InChetanThumar\LaravelAuth\lib;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;

trait LaravelAuthResetsPasswords {
    
    use ResetsPasswords;

    public function showResetForm(Request $request, $token = null)
    {
        return view('laravel-auth::auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function resetPassword($user, $password)
    {
        $user->password = $password;

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);
    }
}
