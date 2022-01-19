
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 | {{ config('app.name') }} </title>
    <style id="" media="all">
        *{-webkit-box-sizing:border-box;box-sizing:border-box}body{padding:0;margin:0}#notfound{position:relative;height:100vh}#notfound .notfound{position:absolute;left:50%;top:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.notfound{max-width:520px;width:100%;text-align:center;line-height:1.4}.notfound .notfound-404{height:190px}.notfound .notfound-404 h1{font-family:montserrat,sans-serif;font-size:146px;font-weight:700;margin:0;color:#232323}.notfound .notfound-404 h1>span{display:inline-block;width:120px;height:120px;background-image:url(../img/emoji.png);background-size:cover;-webkit-transform:scale(1.4);-ms-transform:scale(1.4);transform:scale(1.4);z-index:-1}.notfound h2{font-family:montserrat,sans-serif;font-size:22px;font-weight:700;margin:0;text-transform:uppercase;color:#232323}.notfound p{font-family:montserrat,sans-serif;color:#787878;font-weight:300}.notfound a{font-family:montserrat,sans-serif;display:inline-block;padding:12px 30px;font-weight:700;background-color: #ff324d;color:#fff;border-radius:40px;text-decoration:none;-webkit-transition:.2s all;transition:.2s all}  .notfound a:hover{opacity:.8}@media only screen and (max-width:767px){.notfound .notfound-404{height:115px}  .notfound .notfound-404 h1{font-size:86px}  .notfound .notfound-404 h1>span{width:86px;height:86px}}
    </style>
</head>
<body>
<div id="notfound">
    <div class="notfound">
        <center>
            <img src="{{ asset('assets/images/admin_website_logo.png') }}"/>
        </center>
        <div class="notfound-404">
            <h1>404</h1>
        </div>
        <h2>Oops! Page Not Be Found</h2>
        <p>Sorry but the page you are looking for does not exist, have been removed. name changed or is temporarily unavailable</p>
        <a href="{{ route('viewHome') }}">Back to homepage</a>
    </div>
</div>
<script>
    setTimeout(function() {
        window.location.href = "{{ route('viewHome') }}";
    },5000)
</script>
</body>
</html>
