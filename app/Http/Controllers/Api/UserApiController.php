<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserApi\LoginUserApiRequest;
use App\Http\Requests\Api\UserApi\RegisterUserApiRequest;
use App\Models\User;
use Arman\LaravelHelper\Api\Api;
use Arman\LaravelHelper\Api\StatusCodes;
use Arman\LaravelHelper\Auth\WithAuth;
use Arman\LaravelHelper\Exceptions\ErrorMessageException;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller {

    use WithAuth;

    public function register(RegisterUserApiRequest $request): \Illuminate\Http\JsonResponse {
        $user = new User();
        $user[COL_USER_NAME] = $request[P_NAME];
        $user[COL_USER_USERNAME] = $request[P_USERNAME];
        $user[COL_USER_EMAIL] = $request[P_EMAIL];
        $user[COL_USER_PASSWORD] = $request[P_PASSWORD];
        $user->save();

        $apiToken = $user->createToken("API TOKEN")->plainTextToken;

        return Api::cast([P_USER => $user->only(COL_USER_ID, COL_USER_AVATAR, COL_USER_NAME, COL_USER_USERNAME), P_API_TOKEN => $apiToken]);
    }

    /**
     * @throws ErrorMessageException
     */
    public function login(LoginUserApiRequest $request): \Illuminate\Http\JsonResponse {
        $user = User::where('email', $request[P_EMAIL])->firstOrError();

        if (!($user && Hash::check($request[COL_USER_PASSWORD], $user[COL_USER_PASSWORD]))) {
            throw new ErrorMessageException('ایمیل یا رمز عبور اشتباه است.', StatusCodes::Bad_request);
        }

        $apiToken = $user->createToken("API TOKEN")->plainTextToken;

        return Api::cast([P_USER => $user->only(COL_USER_ID, COL_USER_AVATAR, COL_USER_NAME, COL_USER_USERNAME), P_API_TOKEN => $apiToken]);
    }

    public function logout(): \Illuminate\Http\JsonResponse {
        $user = $this->auth();
        $user->currentAccessToken()->delete();

        return Api::ok();
    }
}
