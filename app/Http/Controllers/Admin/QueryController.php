<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Query;
use Illuminate\Http\Request;
use Response;

class QueryController extends AdminBaseController
{
    /**
     * This function returns the views to list queryies
     * raised by customer from website
     * @return View
     */
    public function index()
    {
        return view('admin.query.queries');
    }

    /**
     * This function returns the queries raised by customers form websites
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     * @throws \Exception
     */
    public function listQueries(Request $request)
    {
        $queries = Query::listQueries($request);
        return datatables($queries)->addIndexColumn()->make(true);
    }

    /**
     * This function deletes the query
     * @param Request $request
     * @return json
     */
    public function deleteQuery(Request $request)
    {
        Query::where('id', $request->id)->delete();
        return Response::json(['success' => true,'message' => 'Popup details updated successfully']);
    }
}
