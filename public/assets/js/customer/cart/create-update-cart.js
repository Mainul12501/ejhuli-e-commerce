

$(document).ready(function () {
    getCart();
});

function addToCart(arg) {
    var productId = $(arg).attr('data-product-id');
    var productName = $(arg).attr('data-product-name');
    var productPrice = $(arg).attr('data-product-price');
    var productQuantity = $(arg).attr('data-product-qty');
    var productImage = $(arg).attr('data-product-image');
    var addToCartSpinnerId = $(arg).attr('data-spinner-id');
    $('#addToCartSpinner'+addToCartSpinnerId).removeClass('d-none');
    $.ajax({
        type: 'POST',
        url: BASE_URL + 'cart/create-cart',
        data:{
            productId:productId,
            productName:productName,
            productPrice:productPrice,
            productQuantity:productQuantity,
            productImage:productImage,
        },
        success: function (response) {
            if (response.status == 'success'){
                toastr.success(response.message);
                getCart();
            }
        },
        error:function (error) {
            console.log(error);
        },
        complete:function () {
            $('#addToCartSpinner'+addToCartSpinnerId).addClass('d-none');
        }
    });
}

function getCart() {
    $.ajax({
        type: 'GET',
        url: BASE_URL + 'cart/get-cart',
        data: {},
        success: function (response) {
            if (response.status == 'success'){

                setHomePageCartData(response);

                setCartPageData(response);

                setCheckoutPageData(response);

                // for product detail page quantity increase option

                if (response.data.items_count !=0){
                    $(".cart-product-quantity").removeClass('d-none');
                }else{
                    $(".cart-product-quantity").addClass('d-none');
                }
            }
        },
        error: function (error) {
            console.log(error);
        },
    });
}

function removeItem(productId) {
    if (confirm("Are you sure to remove this product from cart? Coupon will be reset(if applied),need to apply again  if you have")){
        $.ajax({
            type: 'POST',
            url: BASE_URL + 'cart/remove-cart-item',
            data: {
                productId: productId,
            },
            success: function (response) {
                if (response.status == 'success') {
                    toastr.success(response.message);
                    // var id = '#cart_quantity'+productId;

                    $('#cart_quantity'+productId).val("1");
                    getCart();
                }
            },
        });
    }
}

function setHomePageCartData(response) {
    var cartDropDown = ``;
    if (response.data.items_count>0){
        $.each(response.data.items,function (key,value) {
            var productName = value.name;
            productName = productName.substring(0, 30) + ((productName > 30 ? " &..." : ""));
            var productImage = BASE_URL+'storage/uploads/products/'+value.attributes.image;
            var productPrice = value.price;
            var productQty = value.quantity;
            cartDropDown += `<li>
                        <a href="javaScript:void(0);" onclick="removeItem(`+value.id+`);" class="item_remove"><i class="ion-close"></i></a>
                        <a href="#"><img src="`+productImage+`" alt="cart_thumb1">`+productName+`</a>
                        <span class="cart_quantity"> `+productQty+` x <span class="cart_amount"> <span class="price_symbole">৳</span></span>`+productPrice+`</span>
                    </li>`;
        });
        $(".cart_list").show();
        $(".cart_list").html(cartDropDown);
        $("#cartHasItems").show();
        $("#cart_empty").hide();
    }else{
        $("#cart_empty").show();
        $("#cartHasItems").hide();
        $(".cart_list").hide();
    }

    $(".cart_count").text(response.data.items_count);
    $(".cart_sub_total").text(response.data.sub_total);
    $(".cart_total_price").text(response.data.sub_total);
}

function setCartPageData(response) {
    var myCart = ``;
    if (response.data.items_count>0){

        myCart += `<table class="table">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody id="my_cart_table_body">`;

        $.each(response.data.items,function (key,value) {
            var productName = value.name;
            productName = productName.substring(0, 50) + ((productName > 50 ? " &..." : ""));
            var productImage = BASE_URL + 'storage/uploads/products/' + value.attributes.image;
            var productPrice = value.price;
            var productQty = value.quantity;
            var total = productPrice*productQty;
            var productUrl = value.attributes.url;

            myCart += ` <tr>
                                <td class="product-thumbnail"><a href="#"><img src="`+productImage+`" alt="product1"></a></td>
                                <td class="product-name" data-title="Product"><a href="${productUrl}">`+productName+`</a></td>
                                <td class="product-price" data-title="Price">৳`+productPrice+`</td>
                                <td class="product-quantity" data-title="Quantity">
                                     <div class="quantity">
                                        <input type="button" onclick="decreaseQty(`+value.id+`);" value="-" class="minus">
                                        <input type="text" name="cart_quantity`+value.id+`" id="cart_quantity`+value.id+`" readonly value="`+productQty+`" title="Qty" class="qty" size="4">
                                        <input type="button" onclick="increaseQty(`+value.id+`);" value="+" class="plus">
                                    </div>
                                </td>
                                <td class="product-subtotal" data-title="Total">৳`+total+`</td>
                                <td class="product-remove" data-title="Remove"><a href="javaScript:void(0);" onclick="removeItem(`+value.id+`);"><i class="ti-close"></i></a></td>
                            </tr>`;
        });
        myCart += `</tbody>

                        </table>`;
        $("#shop_cart_table_section").show();
        $(".cart_sub_total_amount").text('৳' + response.data.sub_total);

        var noofCouponCodeApplied = Object.keys(response.data.conditions).length;
        if(noofCouponCodeApplied>0){
            let coponsAppliedText = ``;
            let discountAmount = 0;
            let coupons = response.data.conditions;
             var couponsApplied = Object.keys(coupons);
             $.each(couponsApplied,function (key,coupon) {
                 coponsAppliedText += coupon+',';
             });
            $.each(coupons,function (condition,conditionValue) {
                discountAmount = discountAmount + conditionValue.parsedRawValue;
            });
            coponsAppliedText = coponsAppliedText.replace(/,\s*$/, "");
            $(".coupon_applied_count").html('<strong>'+coponsAppliedText+' Coupon Applied with discount of ৳ '+discountAmount+'</strong>');
            $("#couponApplied").show();
        }else{
            $("#couponApplied").hide();
        }

        var deliveryCharge = 'Free';
        if (response.data.delivery_charge != null){
            deliveryCharge = '৳'+response.data.delivery_charge;
            $(".cart_total_amount").text('৳' + Math.round(response.data.total+parseFloat(response.data.delivery_charge)));
        }else{
            $(".cart_total_amount").text('৳' + Math.round(response.data.total));
        }
        $(".cart_shiping_charge").text(deliveryCharge);


        $("#cart_table").html(myCart);
    }else{
        $("#shop_cart_table_section").addClass('d-none');
        $("#cart_empty_section").removeClass('d-none');
    }
    $("#cart-loader").attr("style", "display: none !important");
}

function setCheckoutPageData(response) {
    var checkoutOrders = ``;
    var deliveryCharge = ``;
    var total = 0.0;
    checkoutOrders += ` <table class="table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>`;
    $.each(response.data.items,function (key,value) {
        var productName = value.name;
        productName = productName.substring(0, 50) + ((productName > 50 ? " &..." : ""));
        var productImage = BASE_URL + 'storage/uploads/products/' + value.attributes.image;
        var productPrice = value.price;
        var productQty = value.quantity;

         deliveryCharge = 'Free';
        if (response.data.delivery_charge != null){
            deliveryCharge = '৳'+response.data.delivery_charge;
            total = Math.round(response.data.total+parseFloat(response.data.delivery_charge));
        }else{
            total = response.data.total;
        }
        checkoutOrders += ` <tr>
                                <td>`+productName+`<span class="product-qty"> x `+productQty+`</span></td>
                                <td>৳`+productPrice+`</td>
                            </tr>`;
    });
    checkoutOrders += ` </tbody>
                            <tfoot>
                            <tr>
                                <th>SubTotal</th>
                                <td class="product-subtotal">৳`+response.data.sub_total+`</td>
                            </tr>`;
    var noofCouponCodeApplied = Object.keys(response.data.conditions).length;
    if (noofCouponCodeApplied) {
        let coponsAppliedText = ``;
        let discountAmount = 0;
        let coupons = response.data.conditions;
        var couponsApplied = Object.keys(coupons);
        $.each(couponsApplied,function (key,coupon) {
            coponsAppliedText += coupon+',';
        });
        $.each(coupons,function (condition,conditionValue) {
            discountAmount = discountAmount + conditionValue.parsedRawValue;
        });
        coponsAppliedText = coponsAppliedText.replace(/,\s*$/, "");
        checkoutOrders += `<tr>
                                <th>Coupon</th>
                                <td class="coupon_applied_count">`+coponsAppliedText+` Coupon Applied with ৳`+discountAmount+`</td>
                              </tr>`;
    }
    checkoutOrders += `<tr>
                            <th>Delivery Charge</th>
                            <td>`+deliveryCharge+`</td>
                        </tr>
                        <tr>
                            <th>Total</th>
<!--                            <td class="product-subtotal get-total-amount">৳`+total+`</td>-->
                            <td class="product-subtotal">৳`+total+`<input type="hidden" id="shurjoTotalAmount" class="get-total-amount" value="`+total+`"></td>
                        </tr>
                    </tfoot>`;

    $(".order_table").html(checkoutOrders);
}

function increaseQty(productId) {
    var cart_quantity = parseInt($('#cart_quantity'+productId).val());
    cart_quantity = cart_quantity+1;
    $('#cart_quantity'+productId).val(cart_quantity-1);
    updateCart(productId,'plus');
}

function decreaseQty(productId) {
    var cart_quantity = parseInt($('#cart_quantity'+productId).val());
    if (cart_quantity>1){
        cart_quantity = cart_quantity-1;
        $('#cart_quantity'+productId).val(cart_quantity+1);
        updateCart(productId,'minus');
    }
}

function updateCart(productId,action) {
    $.ajax({
        type: 'POST',
        url: BASE_URL + 'cart/update-cart',
        data: {
            action:action,
            productId: productId,
        },
        success: function (response) {
            if (response.status == 'success') {
                toastr.success(response.message);
                getCart();
            }
        },
    });
}

function applyCouponCode() {
    var couponCode = $("#couponCode").val();
    if (couponCode){
        $.ajax({
            type: 'POST',
            url: BASE_URL + 'cart/apply-coupon',
            data: {
                couponCode:couponCode,
            },
            success: function (response) {
                if (response.status == 'success') {
                    toastr.success(response.message);
                }else if (response.status == 'error'){
                    toastr.warning(response.message)
                }
                setTimeout(function () {
                    $(".coupon-code-applied").hide();
                    $(".coupon-code-error").hide();
                },2000);
                $("#couponCode").val("");
                scrollToTopCutomer();
                getCart();
            },
        });
    }
}

function checkLoggedIn() {
    $.ajax({
        type: 'GET',
        url: BASE_URL + 'cart/proceed-to-checkout',
        beforeSend:function(){
            $("#loader").show();
        },
        success: function (response) {
            if (response.status == 'loggedin') {
                window.location.href = BASE_URL+'checkout';
            }else if(response.status == 'error'){
                toastr.warning(response.message);
                $("#loginModal").modal('show');
            }
        },
        complete:function () {
            $("#loader").hide();
        }
    });
}

