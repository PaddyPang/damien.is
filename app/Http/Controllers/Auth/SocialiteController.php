<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Exception;
use Illuminate\Http\Response;
use Redirect;
use Socialite;

class SocialiteController extends Controller
{
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Providers available to authenticate.
     *
     * @var array
     */
    protected $availableProviders = ['github', 'google'];

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @param $provider
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        if (! in_array($provider, $this->availableProviders, true)) {
            abort(404);
        }

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @param $provider
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        if (! in_array($provider, $this->availableProviders, true)) {
            abort(404);
        }

        try {
            $socialite = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return Redirect::route('auth.oauth', $provider);
        }

        $user = User::where($provider, $socialite->id)->first();
        if (! $user) {
            if (! env('ALLOW_SIGNUP')) {
                abort(404);
            }

            $user = User::where('email', $socialite->email)->first();

            if (! $user) {
                $user = new User();
                $user->name = $socialite->nickname ?: $socialite->name;
                $user->email = $socialite->email;
                $user->avatar = $socialite->avatar;
            }

            $user->$provider = $socialite->id;
            $user->save();
        }

        Auth::login($user);

        return Redirect::intended($this->redirectTo);
    }
}
