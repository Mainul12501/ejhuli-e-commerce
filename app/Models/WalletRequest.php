<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletRequest extends Model
{
    const APPROVED = 2;
    const ARCHIVED = 3;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','request_id','mobile','amount','txn_id','payment_method','status'];
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at'];
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
    protected $dates = ['created_at', 'updated_at'];
    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
        'request_id' => 'string',
        'mobile' => 'int',
        'amount' => 'string',
        'txn_id' => 'string',
        'payment_method' => 'string',
        'status' => 'int',
        'created_at' => 'date:d/m/Y'
    ];

    /**
     * This function adds money in wallet
     * @param $walletRequest
     * @param $userId
     * @param $wallerRequestId
     * @return collection
     */
    public static function addMoneyInWallet($walletRequest,$userId,$wallerRequestId)
    {
        $walletData = [
            'user_id' => $userId,
            'request_id' => $wallerRequestId,
            'payment_method'=> $walletRequest->payment_method,
            'mobile'=> $walletRequest->mobile_no,
            'txn_id'=> $walletRequest->txn_id,
            'amount' => $walletRequest->wallet_amount
        ];
        return self::create($walletData);
    }
    /**
     * This function returns all the wallet requets
     * @param $request
     * @purpose admin
     * @return collection
     */
    public static function listWalletRequests($request)
    {
        $searchStatus = $request->search_status;
        $searchName = $request->search_name;
        $walletRequestId = $request->request_id;
        return self::select('wallet_requests.id','wallet_requests.request_id','wallet_requests.user_id', 'wallet_requests.mobile','wallet_requests.txn_id','wallet_requests.payment_method',
            'wallet_requests.amount','wallet_requests.created_at','wallet_requests.status','customers.first_name','customers.last_name')
            ->join('customers','wallet_requests.user_id','customers.user_id')
            ->when($searchName, function ($searchNameQuery) use ($searchName) {
                return $searchNameQuery->where('customers.first_name', 'like','%'. $searchName . '%');
            })
            ->when($walletRequestId, function ($searchNameQuery) use ($walletRequestId) {
                return $searchNameQuery->where('wallet_requests.request_id', 'like',$walletRequestId . '%');
            })
            ->when($searchStatus, function ($statusQuery) use ($searchStatus) {
                return $statusQuery->where('wallet_requests.status',$searchStatus);
            })
            ->orderBy('wallet_requests.id', 'DESC')
            ->get();
    }

    /**
     * This function returns the wallet requests for a customer
     * @param $customerId
     * @param $length
     * @return collection
     */
    public static function getCustomerWalletRequests($customerId,$length)
    {
        return self::select('wallet_requests.id','wallet_requests.request_id','wallet_requests.user_id','wallet_requests.txn_id','wallet_requests.payment_method',
            'wallet_requests.amount','wallet_requests.created_at','wallet_requests.status')
            ->where('wallet_requests.user_id',$customerId)
            ->latest('wallet_requests.created_at')
            ->when($length, function ($wltQuery) use ($length) {
                return $wltQuery->limit($length);
            })
            ->get();
    }

    /**
     * This function returns the wallet request info
     * @param $requestId
     * @return collection object
     */
    public static function getWalletRequestInfo($requestId)
    {
        return WalletRequest::select('wallet_requests.*','customers.first_name')
            ->join('customers','wallet_requests.user_id','customers.user_id')
            ->where('wallet_requests.id',$requestId)
            ->first();
    }
}
