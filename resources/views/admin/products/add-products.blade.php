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
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="addEditProductForm" name="addEditProductForm" enctype="multipart/form-data" class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="productSku">SKU <span id="field-required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="productSku" id="productSku" value="{{$productInfo->sku??''}}" class="form-control col-md-7 col-xs-12">
                                    <div  id="productSkuError" class="error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="productName">Name <span id="field-required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="productName" id="productName" value="{{$productInfo->product_name??''}}"  class="form-control col-md-7 col-xs-12">
                                    <div  id="productNameError" class="error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Regular Price <span id="field-required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  type="text" name="regularPrice" id="regularPrice" value="{{$productInfo->regular_price??''}}" class="form-control col-md-7 col-xs-12" >
                                    <div  id="regularPriceError" class="error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Sale Price</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  type="text" name="salePrice" id="salePrice"  value="{{$productInfo->sale_price??''}}"  class="form-control col-md-7 col-xs-12" >
                                    <div  id="salePriceError" class="error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="productSlug">Slug <span id="field-required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="productSlug" id="productSlug" value="{{$productInfo->product_slug??''}}"  class="form-control col-md-7 col-xs-12">
                                    <div  id="productSlugError" class="error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Stock <span id="field-required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  type="text" name="productStock" id="productStock" value="{{$productInfo->stock??''}}"  class="form-control col-md-7 col-xs-12" >
                                    <div  id="productStockError" class="error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Unit <span id="field-required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  type="text" name="productUnit" id="productUnit"  value="{{$productInfo->unit??''}}" class="form-control col-md-7 col-xs-12" >
                                    <div  id="productUnitError" class="error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Image <span id="field-required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file"  name="productImage" id="productImage"  class="form-control col-md-7 col-xs-12"  >
                                    <input type="hidden" name="preProductImage" id="preProductImage" value="{{$productInfo->product_image??''}}" >
                                    <div id="productImageError" class="error"></div>
                                    <div style="color: #21c167;font-size: 12px;">Image size :540x600</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Other Image-1 </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file"  name="otherImage1" id="otherImage1"  class="form-control col-md-7 col-xs-12"  >
                                    <input type="hidden" name="preOtherImage1" id="preOtherImage1" value="{{$productInfo->product_image_1??''}}">
                                    <div  id="otherImage1Error" class="error"></div>
                                    <div style="color: #21c167;font-size: 12px;">Image size :540x600</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Other Image-2 </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file"  name="otherImage2" id="otherImage2"  class="form-control col-md-7 col-xs-12"  >
                                    <input type="hidden" name="preOtherImage2" id="preOtherImage2"  value="{{$productInfo->product_image_2??''}}" >
                                    <div  id="otherImage2Error" class="error"></div>
                                    <div style="color: #21c167;font-size: 12px;">Image size :540x600</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Categories <span id="field-required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="productCategory[]" id="productCategory" multiple class="form-control select2 col-md-7 col-xs-12" style="width: 100%;">
                                        <option value="" disabled>Select</option>
                                        @if($categories)
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div id="productCategoryError" class="error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Categories <span id="field-required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="productSubCategory[]" id="productSubCategory" multiple  class="form-control col-md-7 col-xs-12" style="width: 100%;">
                                        <option value="" disabled>Select</option>
                                    </select>
                                    <div id="productSubCategoryError" class="error"></div>
                                </div>
                            </div>
                            {{--<div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Brands <span id="field-required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="productBrands[]" id="productBrands" multiple  class="form-control col-md-7 col-xs-12" style="width: 100%;">
                                        <option value="" disabled>Select</option>
                                        @if($brands)
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div id="productBrandsError" class="error"></div>
                                </div>
                            </div>--}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tags <span id="field-required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="product_tags[]" id="product_tags" multiple class="form-control select2 col-md-7 col-xs-12" style="width: 100%;">
                                        <option value="" disabled>Select</option>
                                        @if($tags)
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->tag}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div id="product_tagsError" class="error"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Display <span id="field-required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="productDisplay[]" id="productDisplay" multiple  class="form-control col-md-7 col-xs-12" style="width: 100%;">
                                        <option value="" disabled>Select</option>
                                        <option value="1">New Arrival</option>
                                        <option value="2">Featured</option>
                                    </select>
                                    <div id="productDisplayError" class="error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Short Description <span id="field-required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea  name="productDescription" id="productDescription"  class="form-control col-md-7 col-xs-12">{{$productInfo->description??''}}</textarea>
                                    <div id="productDescriptionError" class="error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Additonal Information </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea  name="additionalInfo" id="additionalInfo"  class="form-control col-md-7 col-xs-12">{{$productInfo->additional_info??''}}</textarea>
                                  {{--  <script>
                                        CKEDITOR.replace('additionalInfo1');
                                    </script>--}}
                                    <div id="additionalInfoError" class="error"></div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input type="hidden" name="editId" id="editId" value="{{$productInfo->id??''}}"/>
                                    <button type="submit" name="addEditProductBtn" id="addEditProductBtn" class="btn btn-success">Save Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="editCategoryIds" id="editCategoryIds" value="{{$categoryIds??''}}">
    <input type="hidden" name="editSubCategoryIds" id="editSubCategoryIds" value="{{$subCategoryIds??''}}">
    <input type="hidden" name="brandIds" id="brandIds" value="{{$brandIds??''}}">
    <input type="hidden" name="productDisplayIds" id="productDisplayIds" value="{{$productInfo->product_display??''}}">
    <input type="hidden" name="taggedIds" id="taggedIds" value="{{$taggedIds??''}}">

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
$(document).ready(function() {
  $('#additionalInfo').summernote();
  $('#productDescription').summernote();
});
</script>

    <script type="text/javascript" src="{{asset('assets/js/admin/products/products.js')}}"></script>
@endsection
