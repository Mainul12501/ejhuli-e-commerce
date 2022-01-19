<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Collection;

class Customer extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','first_name','last_name','email','email_verified','wallet_balance','newsletter'];

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
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'email_verified' => 'int',
        'wallet_balance' => 'string',
        'newsletter' => 'int',
    ];

    /**
     * This function creates new customer
     * @param $userId
     * @param $accountRequest
     * @return collection
     */
    public static function createCustomer($userId,$accountRequest)
    {
        return self::create([
            'user_id' => $userId,
            'first_name' => strstr($accountRequest->email, '@', true),
            'email' => $accountRequest->email,
        ]);
    }

    /**
     * This function returns the information of profile of a customer
     * @return collection
     */
    public static function getCustomerProfile()
    {
        $userId = Auth::id();
        return self::select('customers.*','users.username as customer_contact')
            ->join('users','customers.user_id','users.id')
            ->where('customers.user_id',$userId)
            ->first();
    }

    /**
     * This function gives the current wallet balance
     * @param $userId
     * @return collection
     */
    public static function getCurrentWalletBalance($userId)
    {
        return self::select('wallet_balance')->where('user_id',$userId)->value('wallet_balance');
    }

    /**
     * This function checks if a customer has enough balance in wallet
     * @uses customer
     * @param $userId
     * @param $amountToPay
     * @return bool
     */
    public static function checkEnoughBalanceInWallet($userId,$amountToPay)
    {
        $currentBalance = self::getCurrentWalletBalance($userId);
        if ($currentBalance >= $amountToPay ){
            return true;
        }else{
            return false;
        }
    }

    /**
     * This function returns the list of customers
     * @uses admin panel
     * @param $request
     * @return collection
     */
    public static function getCustomerList($request)
    {
        $customerName = $request->customer_name;
        return self::select('customers.id', 'customers.first_name','customers.last_name','customers.email','users.username as contact')
            ->join('users','customers.user_id','users.id')
            ->where('users.status',1)
            ->when($customerName, function ($nameQuery) use ($customerName) {
                return $nameQuery->where('customers.first_name', 'like',"%$customerName%");
            })
            ->orderBy('customers.id', 'DESC')
            ->get();
    }

    /**
     * This function checks if customer email is verified
     * @param $userId
     * @return boolean
     */
    public static function isAccountVerified($userId)
    {
        if (Customer::where(['user_id' =>$userId,'email_verified' => 1])->exists()){
            return true;
        }else{
            return false;
        }
    }


}
