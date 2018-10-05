<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\File;
use App\User;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
    }

	public function update($username)
    {
        if(request('username'))
            User::updateUserName($username);

        if(request('email'))
			User::updateEmail($username, $email);

		if(request('password'))
            User::updatePassword($username, bcrypt($password));

        return back();
    }

    public function read(User $username)
    {
        return User::where('username', $username)->get();
    }

    public function destroy(User $username)
    {
        Manager::where('username', $username)->delete();
    }
}
