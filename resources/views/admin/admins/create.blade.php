@extends('admin.layouts.master')
@section('title')
{{ __('translations.Users') }}
@stop
@section('css')
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0"> {{ __('translations.Add User') }}</h4>
                        <br>
                    </div>
                    <!-- end col -->
                    <div class="col-md-12">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown">
                                <a class="btn btn-primary" href="{{ route('admins.index') }}"> {{__('translations.Back to Users')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title-box -->
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show print-success-msg" role="alert" style="display:none">
                        <ul></ul>
                    </div>

                    <form class="" enctype="multipart/form-data" method="post" action="{{route('admins.store')}}" novalidate="">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.User Name') }}</label>
                                    <input type="text" name="name" class="form-control" required="" placeholder="{{ __('translations.User Name') }}" value="{{ old('name') }}">
                                </div>
                            </div><!--col 1-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.User Phone') }}</label>
                                    <input type="text" name="phone" class="form-control" required="" placeholder="{{ __('translations.User Phone') }}"  value="{{ old('phone') }}">
                                </div>
                            </div><!--col 2-->
                        </div><!--end row1-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.User Email') }}</label>
                                    <input type="text" name="email" class="form-control" required="" placeholder="{{ __('translations.User Email') }}"  value="{{ old('email') }}">
                                </div>
                            </div><!--col 1-->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.User Password') }}</label>
                                    <input type="password" name="password" class="form-control" required="" placeholder="{{ __('translations.User Password') }}">
                                </div>
                            </div><!--col 1-->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.User Type') }}</label>
                                    <select name="type" class="form-control select2-no-search select2-hidden-accessible">
                                        <option value="admin"  @if (old('user_type') == 'admin') selected="selected" @endif  >Admin</option>
                                        <option value="superadmin"  @if (old('user_type') == 'superadmin') selected="selected" @endif>Super Admin</option>
                                        <option value="cutomer"  @if (old('user_type') == 'cutomer') selected="selected" @endif>Customer</option>
                                    </select>
                                </div>
                            </div><!--col 2-->
                        </div><!--end row1-->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ __('translations.Countries') }} </label>
                                    <div>
                                        <select name="country_id" id="country_id" class="form-control select2 select2-hidden-accessible" required>
                                            <option value="" selected disabled>{{ __('translations.Select Country') }}</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}" >{{ (app()->getLocale() == 'en') ? $country->name_en : $country->name_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ __('translations.Cities') }} </label>
                                    <div>
                                        <select name="city_id" id="city_id" class="form-control select2 select2-hidden-accessible" required>
                                            <option value="" selected disabled>{{ __('translations.Select City') }}</option>
{{--                                            @foreach ($cities as $city)--}}
{{--                                                <option value="{{ $city->id }}">{{ (app()->getLocale() == 'en') ? $city->name_en : $city->name_ar }}</option>--}}
{{--                                            @endforeach--}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!-- row3 -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{ __('translations.Active') }}</label>
                                    <br>
                                    <input type="radio" id="yes" name="active" value="1">
                                    <label for="yes">{{ __('translations.Yes') }}</label><br>
                                    <input type="radio" id="no" name="active" value="0">
                                    <label for="no">{{ __('translations.No') }}</label><br>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="fallback dropzone">
                                    <input name="image" type="file" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            {{__('translations.Save')}}
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            {{__('translations.Cancel')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#country_id').on('change', function(){

                var country_id = $('#country_id').val();
                var _token = $("input[name='_token']").val();
                $.ajax({
                    url: "{{ route('admin.getCitiesByCountries') }}",
                    type:'GET',
                    data: {country_id:country_id, _token:_token},
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            $.each(data.cities, function (key, value) {
                                $("#city_id").append('<option value="' + key + '">' + value + '</option>');
                            });
                        }else{
                            printErrorMsg(data.error);
                        }
                    }
                });
            });
            function printErrorMsg (msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }
        });
    </script>
@endsection
