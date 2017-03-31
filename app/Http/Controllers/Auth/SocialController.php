<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Social;
use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @param string $driver
     * @return
     */
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @param string $socialDriver
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($socialDriver)
    {
        $user = Socialite::driver($socialDriver)->user();

        $social = Social::where('provider_user_id', $user->id)
            ->where('provider', $socialDriver)
            ->first();

        if ($social != null) {
            $account = User::find($social->user_id);
            Auth::login($account);
        } else {
            $newSocial = new Social();
            $newSocial->provider_user_id = $user->id;
            $newSocial->provider = $socialDriver;

            $account = User::where('email', $user->getEmail())->first();

            if (!$account) {
                $account = User::create([
                    'email' => $user->email,
                    'name' => $user->name,
                    'gender' => $user->user['gender'] == 'male',
                    'actived' => 1,
                ]);
            }

            $newSocial->user_id = $account->id;
            $newSocial->save();

            Auth::login($account);
        }

        return redirect('/admin');
    }
}
