<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','name','email'];

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * fields will be Carbon-ized
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
        'name' => 'string',
        'email' => 'string',
    ];

    public static function getAdminProfileDetail($userId)
    {
        return self::select('admins.name','admins.email','users.username as contact','users.profile_pic')
            ->join('users','admins.user_id','users.id')
            ->where('admins.user_id',$userId)
            ->first();
    }
}
