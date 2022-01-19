<div class="col-lg-3 col-md-4 col-sm-6 col-3">
    <div class="categories_wrap">
        <button type="button" data-toggle="collapse" data-target="#navCatContent" aria-expanded="false" class="categories_btn">
            <i class="linearicons-menu"></i><span>All Categories</span>
        </button>
        <div id="navCatContent" class="{{Request::segment(1) == ""?"nav_cat":""}} navbar collapse">
            <ul>
                @if($menuCategories)
                    @foreach($menuCategories as $categories)
                        @if($categories['sub_categories'])
                        <li class="dropdown dropdown-mega-menu">
                            <a class="dropdown-item nav-link dropdown-toggler" href="{{route('viewProductByCatSubCat',[$categories['category_slug'],''])}}" data-toggle="dropdown"><i class="{{$categories['icon_class']?$categories['icon_class']:'linearicons-film-play'}}"></i> <span>{{$categories['category']}}</span></a>
                            <div class="dropdown-menu">
                                <ul class="mega-menu d-lg-flex">
                                    <li class="mega-menu-col col-lg-7">
                                        <ul class="d-lg-flex">
                                            @foreach($categories['sub_categories'] as $subcategory)
                                            <li class="mega-menu-col col-lg-6">
                                                <ul>
                                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('viewProductByCatSubCat',[$categories['category_slug'],$subcategory['slug']])}}">{{$subcategory['subcategory']}}</a></li>
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @else
                            <li><a class="dropdown-item nav-link nav_item" href="{{route('viewProductByCatSubCat',[$categories['category_slug'],''])}}"><i class="{{$categories['icon_class']?$categories['icon_class']:'linearicons-film-play'}}"></i>  <span>{{$categories['category']}}</span></a></li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
