@extends('admin.layouts.master')
@section('title')
{{ __('translations.Sub Sub Categories') }}
@stop
@section('css')
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0"> {{ __('translations.Add Sub Sub Category') }}</h4>
                        <br>
                    </div>
                    <!-- end col -->
                    <div class="col-md-12">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown">
                                <a class="btn btn-primary" href="{{ route('sub_sub_categories.index', ['category_id'=>$category_id, 'sub_category_id'=>$sub_category_id]) }}"> {{__('translations.Back to Sub Sub Categories')}}</a>
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

                    <form class=""  method="post" action="{{route('sub_sub_categories.store', ['category_id'=>$category_id, 'sub_category_id'=>$sub_category_id])}}" novalidate="">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="category_id" value="{{ $category_id }}">
                                    <input type="hidden" name="sub_category_id" value="{{ $sub_category_id }}">
                                    <label>{{ __('translations.Sub Sub Category Name En') }}</label>
                                    <input type="text" name="sub_sub_category_name_en" class="form-control" required="" placeholder="{{ __('translations.Sub Sub Category Name En') }}" value="{{ old('sub_sub_category_name_en') }}">
                                </div>
                            </div><!--col 1-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Sub Category Name Ar') }}</label>
                                    <input type="text" name="sub_sub_category_name_ar" class="form-control" required="" placeholder="{{ __('translations.Sub Category Name Ar') }}" value="{{ old('sub_sub_category_name_ar') }}">
                                </div>
                            </div><!--col 1-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Sub Sub Category Description En') }}</label>
                                    <textarea name="description_en" class="form-control" placeholder="{{ __('translations.Sub Sub Category Description En') }}">{{ old('description_en') }}</textarea>
                                </div>
                            </div><!--col 1-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Sub Sub Category Description Ar') }}</label>
                                    <textarea name="description_ar" class="form-control" placeholder="{{ __('translations.Sub Sub Category Description Ar') }}">{{ old('description_ar') }}</textarea>
                                </div>
                            </div><!--col 1-->
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
@endsection
