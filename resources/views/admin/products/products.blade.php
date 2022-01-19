@extends('admin.layout.master')
@section('title','Products')
@section('page-content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Products</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a href="{{route('addProducts')}}"  data-toggle="tooltip" data-placement="top" title="Add Product" ><i class="fa fa-plus-circle" style="font-size: 25px;"></i></a></li>
                            <li><a href="javaScript:void(0)" onclick="showUploadProductModal();"  data-toggle="tooltip" data-placement="top" title="Upload Product" ><i class="fa fa-upload" style="font-size: 25px;"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <form class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Search </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="productSearch" id="productSearch" placeholder="Products" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    </form>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action" id="product-table" style="width: 100%">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">Sr.No</th>
                                    <th class="column-title">Name</th>
                                    <th class="column-title">SKU</th>
                                    <th class="column-title">Regular Price</th>
                                    <th class="column-title">Sale Price</th>
                                    <th class="column-title">Stock</th>
                                    <th class="column-title">Stock Status</th>
                                    <th class="column-title">Unit</th>
                                    <th class="column-title">Rating</th>
                                    <th class="column-title">Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="productInfoModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Product Information</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action" style="width: 100%">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">Sr.No</th>
                                <th class="column-title">Categories</th>
                            </tr>
                            </thead>
                            <tbody id="product_info_categories"></tbody>
                        </table>
                        <table class="table table-striped jambo_table bulk_action" style="width: 100%">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">Sr.No</th>
                                <th class="column-title">Sub Categories</th>
                            </tr>
                            </thead>
                            <tbody id="product_info_sub_categories"></tbody>
                        </table>
                        <table class="table table-striped jambo_table bulk_action" style="width: 100%">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">Sr.No</th>
                                <th class="column-title">Images</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td id="productImgLabel"></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td id="productImg1Label"></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td id="productImg2Label"></td>
                            </tr>
                            </tbody>
                        </table>
                        <div id="description">
                            <h5>Product Description : </h5>
                            <div id="description_content"></div><div class="clearfix"></div>
                        </div>
                        <div id="additionalInfo">
                            <h5>Other Infomation : </h5>
                            <div id="other_info_content"></div><div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="uploadProductModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload Products</h4>
                </div>
                <div class="modal-body">
                    <form id="uploadProductForm" name="uploadProductForm" enctype="multipart/form-data"  class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_file">Product File <span id="field-required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="product_file" id="product_file" onchange="validateFileUpload();" class="form-control col-md-7 col-xs-12">
                                <div id="product_fileError" class="error"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_images">Product Images <span id="field-required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="product_images[]" id="product_images" multiple class="form-control col-md-7 col-xs-12">
                                <div id="product_imagesError" class="error"></div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" name="uploadProductBtn" id="uploadProductBtn" class="btn btn-success">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="pull-left"><a href="{{asset('uploads/demo-product-import/product-demo-import.csv')}}">Download sample CSV</a> </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('assets/js/admin/products/products-list.js')}}"></script>

@endsection
