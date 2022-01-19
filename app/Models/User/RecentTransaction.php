<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RecentTransaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','amount','status'];

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = ['created_at','updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['updated_at'];

    /**
     * fields will be Carbon-ized
     * @var array
     */
    protected $dates = ['created_at','updated_at'];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
        'amount' => 'numeric',
        'status' => 'int',
        'created_at' => 'datetime:Y-m-d h:i A',
        'updated_at' => 'datetime',
    ];

    /**
     * This function returns the recent transactions
     * @return collection
     */
    public static function getRecentTransactions()
    {
        $userId = Auth::id();
        return self::where('user_id',$userId)->latest('id')->get();
    }
}
