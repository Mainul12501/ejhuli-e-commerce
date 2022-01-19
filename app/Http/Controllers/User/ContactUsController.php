<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Query\QueryRequest;
use App\Mail\QueryPostedMail;
use App\Models\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Response;

class ContactUsController extends Controller
{
    /**
     *
     * @param QueryRequest $queryRequest
     */
    public function contactUs(QueryRequest $queryRequest)
    {
        $user = [
            'name' => $queryRequest->name,
            'email' => $queryRequest->email,
            'subject' => $queryRequest->subject,
            'message' => $queryRequest->message,
        ];
        try {
            Query::create($user);
            Mail::to($user['email'])->send(new QueryPostedMail($user));
            return Response::json(['success' => true,'message' => 'We have received your message, will contact you soon']);
        }catch (\Exception $exception){}
    }
}
