@extends('admin.layouts.master')
@section('title')
    {{ __('translations.Show Users') }}
@stop

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">{{ __('translations.Users') }}</h4>
                        <br>
                    </div>
                    <!-- end col -->
                    <div class="col-md-12">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown">
                                <a class="btn btn-primary" href="{{ route('admins.index') }}"> {{__('translations.Back to Users')}}</a>
                                <br>
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="card-title">{{ __('translations.User Name') }}</label>
                                <div>
                                    {{ $admin->name }}
                                </div>
                            </div>
                        </div><!--col 1-->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="card-title">{{ __('translations.User Phone') }}</label>
                                <div>
                                    {{ $admin->phone }}
                                </div>
                            </div>
                        </div><!--col 2-->
                    </div><!--end row1-->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="card-title">{{ __('translations.User Email') }}</label>
                                <div>
                                    {{ $admin->email }}
                                </div>
                            </div>
                        </div><!--col 2-->
                    </div><!--end row1-->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="card-title">{{ __('translations.User Type') }}</label>
                                <div>
                                    {{ $admin->type }}
                                </div>
                            </div>
                        </div><!--col 2-->
                    </div><!--end row1-->


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="card-title">{{ __('translations.Countries') }}</label>
                                <div>
                                    {{ app()->getLocale() == 'en' ? $admin->country->name_en : $admin->country->name_ar }}
                                </div>
                            </div>
                        </div><!--col 2-->
                    </div><!--end row1-->


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="card-title">{{ __('translations.Cities') }}</label>
                                <div>
                                    {{ app()->getLocale() == 'en' ? $admin->city->name_en : $admin->city->name_ar }}
                                </div>
                            </div>
                        </div><!--col 2-->
                    </div><!--end row1-->

                @if( $admin->image )
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="card-title">{{ __('translations.Profile Picture') }}</label>
                                    <div>
                                        <img src="{{ asset('/admins'). '/' .  $admin->image }}" width="500px">
                                    </div>
                                </div>
                            </div>
                        </div><!-- row3 -->
                    @endif
                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection
