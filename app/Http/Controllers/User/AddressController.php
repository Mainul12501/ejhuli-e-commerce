<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\Address\AddressRequest;
use App\Models\User\Country;
use App\Models\User\CustomerAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class AddressController extends UserBaseController
{
    /**
     * This function loads the customer address
     * @return view
     */
   public function index()
   {
       $addresses = CustomerAddress::getMyAddresses();
       return view('customer.addresses.addresses',['addresses'=>$addresses]);
   }

    /**
     * This function shows the form to create address
     * @return view
     */
   public function addAddress()
   {
       $countries = Country::all();
       return view('customer.addresses.create-update-address',['countries'=>$countries]);
   }
    /**
     * This function shows the form to edit address
     * @return view
     */
   public function editAddress($addressId)
   {
       $countries = Country::all();
       $address = CustomerAddress::getAddressInfo($addressId);
       return view('customer.addresses.create-update-address',['countries'=>$countries,'address'=>$address]);
   }
    /**
     * This function creates/updates the address
     * @param AddressRequest $addressRequest
     * @return json
     */
    public function createUpdateAddress(AddressRequest $addressRequest)
    {
        $createUpdate = CustomerAddress::createUpdateAddress($addressRequest);
        $response = Response::json(['status'=>'success','message'=>'Address details saved successfully']);
        return $response;
    }
    /**
     * This function deletes the address from database
     * @return view
     */
   public function deleteAddress(Request $deleteRequest)
   {
       $userId = Auth::id();
       CustomerAddress::where(['id'=> $deleteRequest->addressId,'user_id'=>$userId])->delete();
       $response = Response::json(['status'=>'success','message'=>'Address deleted successfully']);
       return $response;
   }
}
