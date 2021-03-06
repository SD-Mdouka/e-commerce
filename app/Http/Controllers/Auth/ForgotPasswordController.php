<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
     protected function sendResetLinkResponse(Request $request, $response)
    {
         return redirect("/login")
                ->with(['errorLink' => 'Activate your account
                    <a href="' . route('code.resend', $request->email) . '">
                        Resend activation link
                    <a>
                '])->withEmail($request->email);
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response(['message' => $response], 422);
    }
        protected $redirectTo = "/login";
}