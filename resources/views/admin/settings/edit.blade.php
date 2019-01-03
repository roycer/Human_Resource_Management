@extends('layouts.app')

@section('page-title')
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="{{ $pageIcon }}"></i> {{ $pageTitle }}</h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}">@lang('app.menu.home')</a></li>
                <li class="active">{{ $pageTitle }}</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@push('head-script')
<link rel="stylesheet" href="{{ asset('plugins/bower_components/custom-select/custom-select.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css') }}">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">@lang('modules.accountSettings.updateTitle')</div>

                <div class="vtabs customvtab m-t-10">

                    @include('sections.admin_setting_menu')

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    {!! Form::open(['id'=>'editSettings','class'=>'ajax-form','method'=>'PUT']) !!}
                                    <div class="form-group">
                                        <label for="company_name">@lang('modules.accountSettings.companyName')</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name"
                                               value="{{ $global->company_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="company_email">@lang('modules.accountSettings.companyEmail')</label>
                                        <input type="email" class="form-control" id="company_email" name="company_email"
                                               value="{{ $global->company_email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="company_phone">@lang('modules.accountSettings.companyPhone')</label>
                                        <input type="tel" class="form-control" id="company_phone" name="company_phone"
                                               value="{{ $global->company_phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">@lang('modules.accountSettings.companyWebsite')</label>
                                        <input type="text" class="form-control" id="website" name="website"
                                               value="{{ $global->website }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">@lang('modules.accountSettings.companyLogo')</label>

                                        <div class="col-md-12">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"
                                                     style="width: 200px; height: 150px;">
                                                    @if(is_null($global->logo))
                                                        <img src="https://placeholdit.imgix.net/~text?txtsize=25&txt=@lang('modules.accountSettings.uploadLogo')&w=200&h=150"
                                                             alt=""/>
                                                    @else
                                                        <img src="{{ asset('user-uploads/app-logo/'.$global->logo) }}"
                                                             alt=""/>
                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                     style="max-width: 200px; max-height: 150px;"></div>
                                                <div>
                                <span class="btn btn-info btn-file">
                                    <span class="fileinput-new"> @lang('app.selectImage') </span>
                                    <span class="fileinput-exists"> @lang('app.change') </span>
                                    <input type="file" name="logo" id="logo"> </span>
                                                    <a href="javascript:;" class="btn btn-danger fileinput-exists"
                                                       data-dismiss="fileinput"> @lang('app.remove') </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="m-t-20">@lang('modules.themeSettings.loginScreenBackground')</label>

                                        <div class="col-md-12 m-b-20">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"
                                                     style="width: 200px; height: 150px;">
                                                    @if(is_null($global->login_background))
                                                        <img src="https://placeholdit.imgix.net/~text?txtsize=25&txt=@lang('modules.themeSettings.uploadImage')&w=200&h=150"
                                                             alt=""/>
                                                    @else
                                                        <img src="{{ asset('user-uploads/login-background.jpg') }}"
                                                             alt=""/>
                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                     style="max-width: 200px; max-height: 150px;"></div>
                                                <div>
                                    <span class="btn btn-info btn-file">
                                    <span class="fileinput-new"> @lang('app.selectImage') </span>
                                    <span class="fileinput-exists"> @lang('app.change') </span>
                                    <input type="file" name="login_background" id="login_background"> </span>
                                                    <a href="javascript:;" class="btn btn-danger fileinput-exists"
                                                       data-dismiss="fileinput"> @lang('app.remove') </a>
                                                </div>
                                            </div>
                                            <div class="note">Recommended size: 1500 X 1056 (Pixels)</div>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="address">@lang('modules.accountSettings.companyAddress')</label>
                                        <textarea class="form-control" id="address" rows="5"
                                                  name="address">{{ $global->address }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="address">@lang('modules.accountSettings.defaultCurrency')</label>
                                        <select name="currency_id" id="currency_id" class="form-control">
                                            @foreach($currencies as $currency)
                                                <option
                                                        @if($currency->id == $global->currency_id) selected @endif
                                                value="{{ $currency->id }}">{{ $currency->currency_symbol.' ('.$currency->currency_code.')' }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="address">@lang('modules.accountSettings.defaultTimezone')</label>
                                        <select name="timezone" id="timezone" class="form-control select2">
                                            @foreach($timezones as $tz)
                                                <option @if($global->timezone == $tz) selected @endif>{{ $tz }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="address">@lang('modules.accountSettings.changeLanguage')</label>
                                        <select name="locale" id="locale" class="form-control select2">
                                            <option @if($global->locale == "en") selected @endif value="en">English
                                            </option>
                                            @foreach($languageSettings as $language)
                                                <option value="{{ $language->language_code }}" @if($global->locale == $language->language_code) selected @endif >{{ $language->language_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        {{--<a href="javascript:;" id="getLoaction" class="btn btn-warning m-b-10"><i class="ti-location-pin"></i> @lang('modules.accountSettings.getLocation')</a>--}}
                                        <label for="address">@lang('modules.accountSettings.getLocation')</label>

                                        <input type="text" class="form-control" id="gmap_geocoding_address">
                                        <input type="hidden" id="latitude" name="latitude"
                                               value="{{ $global->latitude }}">
                                        <input type="hidden" id="longitude" name="longitude"
                                               value="{{ $global->longitude }}">

                                        <div id="gmap_geocoding" class="gmaps"></div>
                                    </div>


                                    <button type="submit" id="save-form"
                                            class="btn btn-success waves-effect waves-light m-r-10">
                                        @lang('app.update')
                                    </button>
                                    <button type="reset"
                                            class="btn btn-inverse waves-effect waves-light">@lang('app.reset')</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- .row -->

@endsection

@push('footer-script')
<script src="{{ asset('plugins/bower_components/custom-select/custom-select.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDw9cQQsGxYkPicGbigZG1koUGRC4TAbSs&libraries=places"></script>


<script>
    $(".select2").select2({
        formatNoMatches: function () {
            return "{{ __('messages.noRecordFound') }}";
        }
    });

    $('#save-form').click(function () {
        $.easyAjax({
            url: '{{route('admin.settings.update', ['1'])}}',
            container: '#editSettings',
            type: "POST",
            redirect: true,
            file: true
        })
    });

    $(document).ready(function () {
        $("#getLoaction").click(function () {
            $('body').block({
                message: '<p style="margin:0;padding:8px;font-size:24px;">Just a moment...</p>'
                , css: {
                    color: '#fff'
                    , border: '1px solid #fb9678'
                    , backgroundColor: '#fb9678'
                }
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
                $("#locationMsg").html('');
            }
        });
    });


    function showPosition(position) {
        $('#latitude').val(position.coords.latitude);
        $('#longitude').val(position.coords.longitude);
        initialize();
        $('body').unblock();
    }

</script>

<script>
    //Get Latitude And Longitude
    var geocoder = new google.maps.Geocoder();

    function geocodePosition(pos) {
        geocoder.geocode(
                {
                    latLng: pos
                }, function (responses) {
                    if (responses && responses.length > 0) {
                        updateMarkerAddress(responses[0].formatted_address);
                    } else {
                        updateMarkerAddress('Cannot determine address at this location.');
                    }
                });
    }

    function updateMarkerStatus(str) {
        //document.getElementById('markerStatus').innerHTML = str;
    }

    function updateMarkerPosition(latLng) {
        $('#latitude').val(latLng.lat());
        $('#longitude').val(latLng.lng());
    }

    function updateMarkerAddress(str) {

        //  $('#currentlocation').val(str);

    }

    function initialize() {
        //Latitude longitude of default

        var clat = $('#latitude').val();
        var clong = $('#longitude').val();

        clat = parseFloat(clat);
        clong = parseFloat(clong);

        var latLng = new google.maps.LatLng(clat, clong);

        var mapOptions = {
            center: latLng,
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById('gmap_geocoding'),
                mapOptions);

        var input = document.getElementById('gmap_geocoding_address');

        var autocomplete = new google.maps.places.Autocomplete(input);

        //autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        marker = new google.maps.Marker({
            map: map,
            position: latLng,
            title: 'ReferSell',
            map: map,
            draggable: true
        });
        updateMarkerPosition(latLng);
        geocodePosition(latLng);

        // Add dragging event listeners.
        google.maps.event.addListener(marker, 'dragstart', function () {
            updateMarkerAddress('Dragging...');
        });

        google.maps.event.addListener(marker, 'drag', function () {
            updateMarkerStatus('Dragging...');
            updateMarkerPosition(marker.getPosition());
        });

        google.maps.event.addListener(marker, 'dragend', function () {

            updateMarkerStatus('Drag ended');
            geocodePosition(marker.getPosition());
        });
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            infowindow.close();
            var place = autocomplete.getPlace();

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(10);  // Why 17? Because it looks good.
            }

            /* var image = new google.maps.MarkerImage(
             place.icon,
             new google.maps.Size(71, 71),
             new google.maps.Point(0, 0),
             new google.maps.Point(17, 34),
             new google.maps.Size(35, 35));
             marker.setIcon(image);*/
            marker.setPosition(place.geometry.location);
            updateMarkerPosition(place.geometry.location);

            var address = '';

        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
            var radioButton = document.getElementById(id);
            google.maps.event.addDomListener(radioButton, 'click', function () {
                autocomplete.setTypes(types);
            });
        }

    }

    $('#gmap_geocoding_address').keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });


    @if(!is_null($global->latitude))
    initialize();
    @endif

</script>
@endpush

