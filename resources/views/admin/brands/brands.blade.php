@extends('admin.layout.master')
@section('title','Brands')
@section('page-content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_title">
                        <h2>Brands</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a href="javaScript:void(0);" onclick="showAddEditBrandModel();" data-toggle="tooltip" data-placement="top" title="Add Brands" ><i class="fa fa-plus-circle" style="font-size: 25px;"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <form class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Search </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="brandNameSearch" id="brandNameSearch" placeholder="Brand Name" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="brandStatus" id="brandStatus" class="form-control">
                                    <option value="">All</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action" id="brand-table" style="width: 100%">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">Sr.No</th>
                                    <th class="column-title">Brand ID</th>
                                    <th class="column-title">Brand Logo</th>
                                    <th class="column-title">Brand Name</th>
                                    <th class="column-title">Description</th>
                                    <th class="column-title">Status</th>
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
    <div id="addEditBrandModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Brands</h4>
                </div>
                <div class="modal-body">
                    <form id="addEditBrandForm" name="addEditBrandForm" enctype="multipart/form-data"  class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="brandName">Brand Name <span id="field-required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="brandName" id="brandName" placeholder="Brand Name" class="form-control col-md-7 col-xs-12">
                                <div  id="brandNameError" class="error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="brandName">Brand Slug <span id="field-required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="brandSlug" id="brandSlug" placeholder="Brand Slug" class="form-control col-md-7 col-xs-12">
                                <div  id="brandSlugError" class="error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Brand Logo </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="brandLogo" id="brandLogo"  class="form-control col-md-7 col-xs-12">
                                <input type="hidden" name="preBrandLogo" id="preBrandLogo"  class="form-control col-md-7 col-xs-12">
                                <div  id="brandLogoError" class="error"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea type="text" name="description" id="description" placeholder="Description" class="form-control col-md-7 col-xs-12"></textarea>
                                <div style="color: red;" id="descriptionError" class="error"></div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="editId" id="editId" value=""/>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" name="addEditBrandBtn" id="addEditBrandBtn" class="btn btn-success">Submit</button>
                                <button type="button" style="display: none;" name="addEditBrandBtnLoader" id="addEditBrandBtnLoader" class="btn btn-success"> <i class="fa fa-spinner fa-spin"></i>Saving...</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('assets/js/admin/brands/brands-list.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/admin/brands/brands.js')}}"></script>
@endsection
