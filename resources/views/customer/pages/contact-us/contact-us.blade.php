@extends('customer.layout.master-page-support')
@section('title','Contact Us')
@section('page-content')
    <!-- STAT SECTION FAQ -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="term_conditions">
                        <h4>Contact Us</h4>
                        <p>It is a long established fact that a reader will be distracted by the reada
                            ble content of a page when looking at its layout. The point of using Lor
                            em Ipsum is that it</p>
                    </div>
                    <form id="contactUsForm">
                        <div class="form-row">
                            <div class="form-group col-lg-4">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="required">
                            </div>
                            <div class="form-group col-lg-4">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" required="required">
                            </div>
                            <div class="form-group col-lg-4">
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required="required">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <textarea name="message" id="message" class="form-control" placeholder="Message" rows=""required="required"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <button class="btn btn-fill-line" type="submit">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION FAQ -->
@endsection
@section('customer-js')
    <script src="{{ asset('assets/js/customer/contacts/contact.js') }}"></script>
@endsection
