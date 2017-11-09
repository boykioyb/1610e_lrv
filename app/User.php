<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\UserRole;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Check current user has input role id
     * @author ThienTH
     * @param $roleId int
     * @return boolean
     */
    public function checkRole($roleId){
        // Get count of user roles which bigger than input role id
        $roleCount = UserRole::where('user_id', $this->id)
                            ->where('role_id', '>=', $roleId)
                            ->count();
        return $roleCount >= 1 ? true : false;
    }
}
