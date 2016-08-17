<?php

namespace Damien\Http\Controllers\Auth;

use Auth;
use Damien\Http\Controllers\Controller;
use Damien\Models\User;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Redirect;
use Response;
use Socialite;
use Validator;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'blog';
    protected $redirectAfterLogout = 'sudo';
    protected $allowedProvider = ['github', 'google'];

    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @param $provider
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        if (! in_array($provider, $this->allowedProvider, true)) {
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
        if (! in_array($provider, $this->allowedProvider, true)) {
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
