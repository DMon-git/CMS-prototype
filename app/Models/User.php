<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use \Auth;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $arrRolesDescription = [
                                    "user"  => 1,
                                    "admin" => 2 
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 
     */
    public function hasRole($role)
    {
        if (!auth()->check()) {
            return false;
        }

        if (!isset($this->arrRolesDescription[$role]) ) {
            return false;
        }

        $needRole = $this->arrRolesDescription[$role];
        $userRole = intval(auth()->user()->role);

        if ($needRole !== $userRole) {
            return false;
        }

        return true;
    }
}
