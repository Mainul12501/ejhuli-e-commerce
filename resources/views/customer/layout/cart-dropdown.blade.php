<div class="cart_box  dropdown-menu dropdown-menu-right">
    <ul class="cart_list">

    </ul>
    <div class="cart_footer" id="cartHasItems" style="display:none;">
        <p class="cart_total"><strong>Subtotal:</strong>
            <span class="cart_price"><span class="price_symbole">৳</span></span><span class="cart_sub_total">0</span>
        </p>
        <p class="cart_buttons"><a href="{{route('viewCart')}}" class="btn btn-fill-line view-cart">View Cart</a>
    </div>
    <div class="cart_footer" id="cart_empty">
       <div style="margin-top: 20px;">
           <div class="row justify-content-center">
               <div class="col-md-8">
                   <div class="text-center order_complete">
                       <i class="ti-shopping-cart"></i>
                       <div class="heading_s1">
                           <h3>Your cart is empty !</h3>
                       </div>
                       <p>You cart is empty, Click continue shopping</p>
                       <p class="cart_buttons">
                           <a href="{{route('viewHome')}}" class="btn btn-sm btn-fill-out">Shop Now</a>
                       </p>
                   </div>
               </div>
           </div>
       </div>
    </div>
</div>
