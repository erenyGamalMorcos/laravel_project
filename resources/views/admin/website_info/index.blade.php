@extends('admin.layouts.master')
@section('title')
    {{ __('translations.Website Info') }}
@stop
@section('css')
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0"> {{ __('translations.Website Info') }}</h4>
                        <br>
                    </div>
                    <!-- end col -->
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

                    @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show print-success-msg" role="alert" style="display:none">
                        <ul></ul>
                    </div>

                    <form class="" enctype="multipart/form-data" method="post" action="{{route('info.update')}}" novalidate="">
                        @csrf
                        @method('PUT')
                        @foreach($infos as $info)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('translations.'.$info->option) }}</label>
                                        <input type="hidden" value="{{ $info->type }}">
                                        <input type="hidden" name="id" value="{{ $info->type }}">

                                    @if ($info->type == 'string')
                                            <input type="text" name="{{ $info->option }}" class="form-control" placeholder="{{ __('translations.'.$info->option) }}" value="{{ $info->value }}">
                                        @elseif($info->type == 'integer')
                                            <input type="number" name="{{ $info->option }}" class="form-control" placeholder="{{ __('translations.'.$info->option) }}" value="{{ $info->value }}">
                                        @elseif($info->type == 'text')
                                            <textarea name="{{ $info->option }}" class="form-control" rows="3">{{ $info->value }}</textarea>
                                        @elseif($info->type == 'image')
                                            <input name="{{ $info->option }}" type="file" >
                                            <br>
                                            @if( $info->value )
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="card-title">{{ __('translations.'.$info->option) }}</label>
                                                            <div>
                                                                <img src="{{ asset('/website_info'). '/' .  $info->value }}" width="500px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- row3 -->
                                            @endif
                                        @endif
                                    </div>
                                </div><!--col 1-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">{{ __('translations.Active') }}</label>
                                        <br>
                                        <input type="radio" id="yes" name="active_{{ $info->id }}" value="1" @if ($info->active == 1) checked="checked" @endif>
                                        <label for="yes">{{ __('translations.Yes') }}</label><br>
                                        <input type="radio" id="no" name="active_{{ $info->id }}" value="0" @if ($info->active == 0) checked="checked" @endif>
                                        <label for="no">{{ __('translations.No') }}</label><br>
                                    </div>
                                </div>
                            </div>
                        @endforeach

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
@endsection
