<div class="modal fade subscribe_popup" id="onload-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row no-gutters">
                    <div class="col-sm-7">
                        <div class="popup_content text-left">
                            <div class="popup-text">
                                <div class="heading_s1">
                                    <h3>{{ $popup->title }}</h3>
                                </div>
                                <p>{{ $popup->description }}</p>
                                <a class="btn btn-fill-out btn-radius" href="{{ $popup->link }}" >Check</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <img src="{{asset('storage/uploads/media/'. $popup->popup_image)}}" style="margin-left: 50px;" width="250"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
