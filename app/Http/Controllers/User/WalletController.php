<?php

namespace App\Http\Controllers\User;

use App\Models\WalletRequest;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class WalletController extends UserBaseController
{
    /**
     * This function loads the wallet requests view
     * @return View
     */
    public function index()
    {
        $currentPage = 'wallet';
        return view('customer.wallet.wallet-requests',[
            'currentPage' => $currentPage,
        ]);
    }

    /**
     * This function returns wallet requests for a customer
     * @param Request $walletListRequest
     * @return json
     */
    public function getMyWalletRequests(Request $walletListRequest)
    {
        $customerId = Auth::id();
        $walletRequests = WalletRequest::getCustomerWalletRequests($customerId,$walletListRequest->length);
        return Response::json(['status'=>'success','data'=> $walletRequests]);
    }

    /**
     * This function loads the wallet request detail page and shows the details
     * @param $requestId
     * @return View
     */
    public function getWalletRequestInfo($requestId)
    {
        $requestInfo = WalletRequest::getWalletRequestInfo($requestId);
        if ($requestInfo){
            return view('customer.wallet.wallet-request-info',['requestInfo' => $requestInfo]);
        }
        abort(404);
    }

    /**
     * This function downloads the wallet request detail pdf
     * @param $requestId
     * @return mixed
     */
    public function downloadWalletRequestInfo($requestId)
    {
        $requestInfo = WalletRequest::getWalletRequestInfo($requestId);
        $pdf = PDF::loadView('customer.wallet.download-wallet-request-info',['requestInfo' => $requestInfo]);
        return $pdf->download('invoice.pdf');
    }
}
