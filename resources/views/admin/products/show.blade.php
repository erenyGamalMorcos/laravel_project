@extends('admin.layouts.master')
@section('title')
    {{ __('translations.Products') }}
@stop
@section('css')
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0"> {{ __('translations.Edit Product') }}</h4>
                        <br>
                    </div>
                    <!-- end col -->
                    <div class="col-md-12">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown">
                                <a class="btn btn-primary" href="{{ route('products.index') }}"> {{__('translations.Back to Products')}}</a>
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

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Product Name En') }}</label>
                                    <br>
                                    {{ $product->product_name_en }}
                                </div>
                            </div><!--col 1-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Product Name Ar') }}</label>
                                    <br>
                                    {{ $product->product_name_ar }}
                                </div>
                            </div><!--col 1-->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Price') }}</label>
                                    <br>
                                    {{ $product->original_price }}
                                </div>
                            </div><!--col 1-->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Discount') }}</label>
                                    <br>
                                    {{ $product->discount_price }}
                                </div>
                            </div><!--col 1-->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{ __('translations.In Stock') }}</label>
                                    <br>
                                    {{ $product->in_stock }}
                                </div>
                            </div><!--col 1-->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{ __('translations.Status') }}</label>
                                    <br>
                                    {{ $product->status }}
                                </div>
                            </div><!--col 1-->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{ __('translations.Category') }}</label>
                                    <br>
                                    {{ $category_name }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{ __('translations.Sub Category') }}</label>
                                    <br>
                                    {{ $sub_category_name }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{ __('translations.Sub Sub Category') }}</label>
                                    <br>
                                    {{ $sub_sub_category_name }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Product Description En') }}</label>
                                    <br>
                                    {{ $product->description_en }}
                                </div>
                            </div><!--col 1-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Product Description Ar') }}</label>
                                    <br>
                                    {{ $product->description_ar }}
                                </div>
                            </div><!--col 1-->
                        </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection

@section('js')
@endsection
