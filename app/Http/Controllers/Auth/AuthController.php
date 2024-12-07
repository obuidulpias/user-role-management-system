<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Models\User;
use App\Repositories\Auth\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = new AuthRepository($user);
    }
    /**
     * Signup Here
     * @param \App\Http\Requests\Auth\SignupRequest;
     */
    public function signup(SignupRequest $request)
    {
        return $this->user->create($request);
    }
    /**
     * Summary of login
     * @param \App\Http\Requests\Auth\LoginRequest;
     * @return mixed|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        return $this->user->login($request);
    }
    /**
     * Summary of logout
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function logout()
    {
        return $this->user->logout();
    }
    /**
     * Summary of userDetails
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function users()
    {
        return $this->user->users();
    }
}
