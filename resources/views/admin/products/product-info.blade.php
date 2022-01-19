@extends('admin.layout.master')
@section('title','Product Information')
@section('page-content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Manage Products</h2>
                        <div class="clearfix"></div>
                    </div>
                        <div class="x_content">
                            <div class="col-xs-3">
                                <ul class="nav nav-tabs tabs-right">
                                    <li class="active"><a href="#basic_info" data-toggle="tab">Basic Infomation</a></li><li><a href="#gallary" data-toggle="tab">Gallary</a></li>
                                    <li><a href="#categories" data-toggle="tab">Categories</a></li>
                                    <li><a href="#sub_categories" data-toggle="tab">Sub Categories</a></li>
                                    {{--<li><a href="#brands" data-toggle="tab">Brands</a></li>--}}
                                    <li><a href="#tags" data-toggle="tab">Tags</a></li>
                                    <li><a href="#description" data-toggle="tab">Description</a></li>
                                    <li><a href="#additional_info" data-toggle="tab">Additional</a></li>
                                </ul>
                            </div>
                            @if($productItem)
                            <div class="col-xs-9 pull-right">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="basic_info">
                                        <p class="lead">Basic</p>
                                       <table class="table">
                                           <tr>
                                               <th>Product SKU</th>
                                               <td>:</td>
                                               <td>{{$productItem->sku}}</td>
                                           </tr>
                                           <tr>
                                               <th>Product Name</th>
                                               <td>:</td>
                                               <td>{{$productItem->product_name}}</td>
                                           </tr>
                                           <tr>
                                               <th>Regular Price</th>
                                               <td>:</td>
                                               <td>৳ {{$productItem->regular_price}}</td>
                                           </tr>
                                           <tr>
                                               <th>Sale Price</th>
                                               <td>:</td>
                                               <td>৳ {{$productItem->sale_price}}</td>
                                           </tr>
                                           <tr>
                                               <th>Stock</th>
                                               <td>:</td>
                                               <td>{{$productItem->stock}}</td>
                                           </tr>
                                           <tr>
                                               <th>Unit</th>
                                               <td>:</td>
                                               <td>{{$productItem->unit}}</td>
                                           </tr>
                                       </table>
                                    </div>
                                    <div class="tab-pane" id="gallary">
                                        <p class="lead">Gallary</p>
                                        <div class="row">
                                           <div class="col-md-3" style="margin: 10px;">
                                               <div class="card" style="width: 100px;">
                                                   <img class="card-img-top img-responsive" width="200" src="{{asset('storage/uploads/products/'.$productItem->product_image)}}" alt="{{$productItem->product_image}}">
                                                   <div class="card-body">
                                                       <h5 class="card-title">Main Image</h5>
                                                   </div>
                                               </div>
                                           </div>
                                            @if($productItem->product_image_1)
                                            <div class="col-md-3" style="margin: 10px;">
                                                <div class="card" style="width: 100px;">
                                                    <img class="card-img-top img-responsive" width="200" src="{{asset('storage/uploads/products/'.$productItem->product_image_1)}}" alt="{{$productItem->product_image_1}}">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Other Image 1</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if($productItem->product_image_2)
                                                <div class="col-md-3" style="margin: 10px;">
                                                    <div class="card" style="width: 100px;">
                                                        <img class="card-img-top img-responsive" style="width: 200px;" src="{{asset('storage/uploads/products/'.$productItem->product_image_2)}}" alt="{{$productItem->product_image_2}}">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Other Image 2</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="categories">
                                        <p class="lead">Categories</p>
                                        <table class="simple_list">
                                            <tbody>
                                            @if($categories)
                                                @foreach($categories as $category)
                                                    <tr>
                                                        <td>{{$category->category}}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="sub_categories">
                                        <p class="lead">Sub Categories</p>
                                        <table class="simple_list">
                                            <tbody>
                                            @if($subCategories)
                                                @foreach($subCategories as $subcategory)
                                                    <tr>
                                                        <td>{{$subcategory->subcategory}}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="brands">
                                        <p class="lead">Brands</p>
                                        <table class="simple_list">
                                            <tbody>
                                            @if($brands)
                                                @foreach($brands as $brand)
                                                    <tr>
                                                        <td>{{$brand->brand_name}}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tags">
                                        <p class="lead">Tags</p>
                                        <table class="simple_list">
                                            <tbody>
                                            @if($productTags)
                                                @foreach($productTags as $tag)
                                                    <tr>
                                                        <td>{{$tag}}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane" id="description">
                                        <p class="lead">Description</p>
                                        {{$productItem->description}}
                                    </div>
                                    <div class="tab-pane" id="additional_info">
                                        <p class="lead">Additionl Information</p>
                                        {{strip_tags($productItem->additional_info)}}
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript" src="{{asset('assets/js/admin/products/manage-products.js')}}"></script>
@endsection
