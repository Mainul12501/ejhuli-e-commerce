
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wallet Request Detail</title>
    <style>
        body{
            font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align:center;
            color:#777;
        }

        body h1{
            font-weight:300;
            margin-bottom:0px;
            padding-bottom:0px;
            color:#000;
        }

        body h3{
            font-weight:300;
            margin-top:10px;
            margin-bottom:20px;
            font-style:italic;
            color:#555;
        }

        body a{
            color:#06F;
        }

        .invoice-box{
            max-width:800px;
            margin:auto;
            padding:30px;
            box-shadow:0 0 10px rgba(0, 0, 0, .15);
            font-size:16px;
            line-height:24px;
            font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color:#555;
        }

        .invoice-box table{
            width:100%;
            line-height:inherit;
            text-align:left;
        }

        .invoice-box table td{
            padding:5px;
            vertical-align:top;
        }

        .invoice-box table tr td:nth-child(2){
            text-align:right;
        }

        .invoice-box table tr.top table td{
            padding-bottom:20px;
        }

        .invoice-box table tr.top table td.title{
            font-size:45px;
            line-height:45px;
            color:#333;
        }

        .invoice-box table tr.information table td{
            padding-bottom:40px;
        }

        .invoice-box table tr.heading td{
            background:#eee;
            border-bottom:1px solid #ddd;
            font-weight:bold;
        }

        .invoice-box table tr.details td{
            padding-bottom:20px;
        }

        .invoice-box table tr.item td{
            border-bottom:1px solid #eee;
        }

        .invoice-box table tr.item.last td{
            border-bottom:none;
        }

        .invoice-box table tr.total td:nth-child(2){
            border-top:2px solid #eee;
            font-weight:bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td{
                width:100%;
                display:block;
                text-align:center;
            }

            .invoice-box table tr.information table td{
                width:100%;
                display:block;
                text-align:center;
            }
        }
    </style>
</head>
<body>
<div class="invoice-box">
    <center>
        <img src="{{ asset('assets/images/admin_website_logo.png') }}"/>
    </center>
    <h1 style="text-align: center;font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif ">Wallet Request Detail</h1>
    <table cellpadding="0" cellspacing="0" style="margin-top: 15px;">

        <tr class="item">
            <td>Wallet Request ID</td>
            <td>
                <strong>{{$requestInfo->request_id}}</strong>

            </td>
        </tr>
        <tr class="item">
            <td>
                Transaction Id
            </td>
            <td>
                <strong>{{$requestInfo->txn_id}}</strong>
            </td>
        </tr>
        <tr class="item">
            <td>
                Payment Method
            </td>
            <td>
                <strong>{{$requestInfo->payment_method}}</strong>
            </td>
        </tr>
        <tr class="item">
            <td>Status</td>
            <td>
                @if($requestInfo->status == 1)
                    <strong>Pending</strong>
                @elseif($requestInfo->status == 2)
                    <strong>Approved</strong>
                @elseif($requestInfo->status == 3)
                    <strong>Archived</strong>
                @endif
            </td>
        </tr>
        <tr class="item">
            <td>From</td>
            <td><strong>{{$requestInfo->first_name}}</strong></td>
        </tr>
        <tr class="item">
            <td>Contact</td>
            <td><strong>{{$requestInfo->mobile}}</strong></td>
        </tr>
        <tr class="item">
            <td>Date</td>
            <td><strong>{{date('F j, Y, g:i a',strtotime($requestInfo->created_at))}}</strong></td>
        </tr>
        <tr class="item">
            <td>Amount</td>
            <td><strong>৳{{$requestInfo->amount}}</strong></td>
        </tr>
    </table>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
</html>
