<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth:admin")->except([
            "index", "show"
        ]);
    }
    public function index()
    {
        return view("admin.users.index")->with([
            "users" => User::latest()->paginate(10),
        ]);
    }
    public function update(Request $request, User $user)
    {
        //
        $user->update([
            "active" => 1,
            "code" => null
        ]);
        return redirect()->back()->withSuccess("User updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->back()->withSuccess("User deleted");
    }
}
