<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Customer;
use Illuminate\Http\Request;

class CustomerController extends AdminBaseController
{
    /**
     * This function loads the customer list page
     * @return view
     */
    public function index()
    {
        return view('admin.customers.customers');
    }

    /**
     * This function returns the list of customer list
     * @param Request $request
     * @return json
     * @throws \Exception
     */
    public function getCustomerList(Request $request)
    {
        $categories = Customer::getCustomerList($request);
        return datatables($categories)->addIndexColumn()->make(true);
    }
}
