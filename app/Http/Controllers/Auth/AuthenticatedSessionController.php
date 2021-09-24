<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

<<<<<<< HEAD
        $request->session()->regenerate();

        //generate a loop to not run php artisan websockets:serve
<<<<<<< HEAD
     
=======
        $request->session()->regenerate();     
>>>>>>> bcb6fa6b947b3b0f85fe0fd1a6ccb0c5ce7f8495

=======
/**        Route::group(['prefix' => 'internal', 'middleware' => ['jwt.verify','admin']], function(){
                Route::get('sockets/serve', function(){
                    \Illuminate\Support\Facades\Artisan::call('websockets:serve');
                });
            });
*/
>>>>>>> 2117950115c8ac985a3b2850b2869c348d364f43
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
