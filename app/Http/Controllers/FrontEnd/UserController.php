<?php

namespace App\Http\Controllers\FrontEnd;

use App\Consts;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Services\UserService;
use App\Models\AffiliateHistory;
use App\Models\AffiliatePayment;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        if (!Auth::guard('web')->check()) {
            return redirect()->route('frontend.login');
        }

        $user = Auth::guard('web');
        $detail = UserService::getUsers(['id' => $user->id()])->first();

        $this->responseData['detail'] = $detail;

        return $this->responseView('frontend.pages.user.index');
    }

    public function loginForm()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->back()->with('successMessage', __('Login successfully!'));
        }

        return view('frontend.pages.login');
    }

    public function signup(UserRegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $params = $request->all();
            $params['status'] = Consts::STATUS['active'];
            if ($params['affiliate_code'] != '') {
                $affiliate = User::where('affiliate_code', $params['affiliate_code'])->first();
                if ($affiliate) {
                    $params['affiliate_id'] = $affiliate->id;
                } else {
                    abort(422, __('Affiliate code is not existed!'));
                    // throw new Exception(__('Affiliate code is not existed!'));
                }
            }

            $user = UserService::createUser($params);
            DB::commit();

            Auth::guard('web')->login($user);

            session()->flash('successMessage', 'Signup successfully!');
            return $this->sendResponse($user, __('Signup successfully!'));
        } catch (Exception $ex) {
            DB::rollBack();
            abort(422, __($ex->getMessage()));
        }
    }

    public function login(LoginRequest $request)
    {
        $current = $request->input('current') ?? route('frontend.home');
        $referer = $request->input('referer') ?? '';
        $url = $current == route('frontend.login') ? $referer : $current;

        if (Auth::guard('web')->check()) {
            return $this->sendResponse('', 'success');
        }

        try {
            $email = $request->email;
            $password = $request->password;
            $attempt = Auth::guard('web')->attempt([
                'email' => $email,
                'password' => $password,
                'status' => Consts::USER_STATUS['active']
            ]);

            if (!$attempt) {
                abort(401, __('Login failed!'));
            }

            session()->flash('successMessage', 'Login successfully!');
            return $this->sendResponse(['url' => $url], 'success');
        } catch (Exception $ex) {
            abort(422, __($ex->getMessage()));
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->back()->with('successMessage', __('Logout successfully!'));
    }

}
