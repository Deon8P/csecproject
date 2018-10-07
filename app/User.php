<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function authorizeRoles($roles)
{
    if (is_array($roles)) {
        return $this->hasAnyRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }
         return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }

    /**
    * Check multiple roles
    * @param array $roles
    */

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn(‘name’, $roles)->first();
    }

    /**
    * Check one role
    * @param string $role
    */

    public function hasRole($role)
    {
        return null !== $this->roles()->where(‘name’, $role)->first();
    }

    public static function updateUserName($username)
    {
        User::where('username', $username)->update(['username' => $username]);
    }

    public static function updateEmail($username, $email)
    {
        User::where('username', $username)->update(['email' => $email]);
    }

    public static function updatePassword($username, $password)
    {
        User::where('username', $id)->update(['password' => bcrypt($password)]);
    }

    public function swapping($user) {
        $new_sessid   = \Session::getId(); //get new session_id after user sign in
        $last_session = \Session::getHandler()->read($user->last_sessid); // retrive last session

        if ($last_session) {
            if (\Session::getHandler()->destroy($user->last_sessid)) {
                // session was destroyed
            }
        }

        $user->last_sessid = $new_sessid;
        $user->save();
    }
}
