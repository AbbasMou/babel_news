<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * Register a new user
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */

    public function register(Request $request)
    {

        // Create a new user with data from the request.
        return User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))



        ]);
    }

    /**
     * Log in a user and return a JWT token.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        //try to log in ; if  credenntials not valid , return unauthorized response
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => 'Invalid credentials'
            ], Response::HTTP_UNAUTHORIZED);
        }

        // Get the authenticated user.
        $user = Auth::user();

        //create the token 
        $token = $user->createToken('token')->plainTextToken;

        // Set a JWT token as a cookie with a 1-hour duration.
        $cookie = cookie('jwt', $token, 60); //token duration is 1 hour

        return response([
            'message' => 'success'
        ])->withCookie($cookie); //backend will grab the cookie that incldes the jwt token , however frontend will take the success message 
    }


    /**
     * Get the currently authenticated user.
     *
     * @return \App\Models\User
     */
    public function user()
    {
        return Auth::user();
    }



    /**
     * Log out the user and remove the JWT token cookie.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $cookie = Cookie::forget('jwt');
        return response([
            'message' => 'Success'
        ])->withCookie($cookie);
    }
}
