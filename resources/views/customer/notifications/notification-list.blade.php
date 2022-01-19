@extends('customer.layout.master-page-support')
@section('title','Notifications')
@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 hide-in-mobile">
            @include('customer.layout.customer-menus')
        </div>
        <div class="col-md-9" style="padding: 5px;">
            <div class="section customer-home-section pt-1">
                <div class="wallet-card">
                    <h3>Notifications</h3>
                    <div class="notifications-list-container">
                        <div class="spinner-red pt-5" id="spinner-loader" ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customer-js')
<script>
    $(document).ready(function (){
        getUserNotifications();
    });

    function getUserNotifications() {
        $.ajax({
            url: BASE_URL + 'customer/notification/all-notification',
            method: 'GET',
            success: function (response) {
                let userNotifications = `<ul class="listview image-listview flush">`;
                if (response.notifications.length){
                    $.each(response.notifications,function (key,notification){
                        userNotifications += `<li>
                                        <a href="javaScript:void(0)" onclick="markAsRead('`+notification.id+`');" class="item">
                                            <div class="icon-box bg-primary">
                                                <i class="ti-bell" style="color: white"></i>
                                            </div>
                                            <div class="in">
                                                <div>
                                                    <div class="text-small mb-05">`+notification.data.message+`</div>
                                                    <div class="text-xsmall">`+notification.created_at+`</div>
                                                </div>`;
                        if (notification.read_at == null) {
                            userNotifications += `<div class="text-small mb-05 text-right">
                                                    <div class="price"> <i class="fa fa-genderless"></i></div>
                                                </div>`;
                        }
                        userNotifications  += `</div>
                                        </a>
                                     </li>`;
                    });
                }else{
                    userNotifications += `<small>You did not receive any notification(s)</small>`;
                }
                userNotifications += `</ul>`;
                $(".notifications-list-container").html(userNotifications);
            }
        });
    }
    /**
     * This function marks single notification message to read
     * @param notificationId
     */
    function markAsRead(notificationId) {
        $.ajax({
            url: BASE_URL + 'customer/notification/mark-read',
            method: 'POST',
            data: {
                notificationId:notificationId,
            },
            success: function (response) {
                if (response.success){
                    toastr.success(response.message);
                    getUserNotifications();
                    getNotifications();
                }
            }
        });
    }
</script>
@endsection
