<?php

namespace App\Models;
use App\Helpers\Text;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $fillable = [
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public static function getIsPasswordValid(string $password) : bool
    {
        if(Text::getIsThereBlankSpace($password))
            return false;
        if(!Text::getIsThereDigit($password))
            return false;
        if(!Text::getIsThereLowerCase($password))
            return false;
        if(!Text::getIsThereUpperCase($password))
            return false;
        if(!Text::getIsThereSpecialCharacters($password))
            return false;
        if(Text::getIsThereRepeatedCharacters($password))
            return false;
        if(!Text::getIsMinimumLength(9, $password))
            return false;
        return true;
    }

}
