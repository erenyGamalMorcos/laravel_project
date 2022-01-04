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
                        <h4 class="page-title m-0"> {{ __('translations.Add Product') }}</h4>
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

                    <form class=""  method="post" action="{{route('products.store')}}" novalidate="">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Product Name En') }}</label>
                                    <input type="text" name="product_name_en" class="form-control" required="" placeholder="{{ __('translations.Product Name En') }}" value="{{ old('product_name_en') }}">
                                </div>
                            </div><!--col 1-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Product Name Ar') }}</label>
                                    <input type="text" name="product_name_ar" class="form-control" required="" placeholder="{{ __('translations.Product Name Ar') }}" value="{{ old('product_name_ar') }}">
                                </div>
                            </div><!--col 1-->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Price') }}</label>
                                    <input type="text" name="original_price" class="form-control" required="" placeholder="{{ __('translations.Price') }}" value="{{ old('original_price') }}">
                                </div>
                            </div><!--col 1-->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Discount') }}</label>
                                    <input type="text" name="discount_price" class="form-control" required="" placeholder="{{ __('translations.Discount') }}" value="{{ old('discount_price') }}">
                                </div>
                            </div><!--col 1-->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{ __('translations.In Stock') }}</label>
                                    <br>
                                    <input type="radio" id="yes" name="in_stock" value="1">
                                    <label for="yes">{{ __('translations.Yes') }}</label><br>
                                    <input type="radio" id="no" name="in_stock" value="0">
                                    <label for="no">{{ __('translations.No') }}</label><br>
                                </div>
                            </div><!--col 1-->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{ __('translations.Status') }}</label>
                                    <br>
                                    <input type="radio" id="yes" name="status" value="1">
                                    <label for="yes">{{ __('translations.Yes') }}</label><br>
                                    <input type="radio" id="no" name="status" value="0">
                                    <label for="no">{{ __('translations.No') }}</label><br>
                                </div>
                            </div><!--col 1-->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{ __('translations.Category') }}</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="" selected disabled>{{ __('translations.Select Category') }}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ (app()->getLocale() == 'en') ? $category->category_name_en : $category->category_name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{ __('translations.Sub Category') }}</label>
                                    <select name="sub_category_id" id="sub_category_id" class="form-control" >
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{ __('translations.Sub Sub Category') }}</label>
                                    <select name="sub_sub_category_id" id="sub_sub_category_id" class="form-control" >
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Product Description En') }}</label>
                                    <textarea name="description_en" class="form-control" placeholder="{{ __('translations.Product Description En') }}">{{ old('description_en') }}</textarea>
                                </div>
                            </div><!--col 1-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Product Description Ar') }}</label>
                                    <textarea name="description_ar" class="form-control" placeholder="{{ __('translations.Product Description Ar') }}">{{ old('description_ar') }}</textarea>
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
<script>
    $(document).ready(function() {
        $('#category_id').on('change', function(){

            var category_id = $('#category_id').val();
            var _token = $("input[name='_token']").val();
            $.ajax({
                url: "{{ route('category.getSubCategoryByCategoryID') }}",
                type:'GET',
                data: {category_id:category_id, _token:_token},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        $("#sub_category_id").empty().append('<option value="" selected disabled>--Select--</option>');
                        $.each(data.sub_categories, function (key, value) {
                            $("#sub_category_id").append('<option value="' + key + '">' + value + '</option>');
                        });
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });
        });

        $('#sub_category_id').on('change', function(){

            var sub_category_id = $('#sub_category_id').val();
            var _token = $("input[name='_token']").val();
            $.ajax({
                url: "{{ route('sub_category.getSubSubCategoryBySubCategoryID') }}",
                type:'GET',
                data: {sub_category_id:sub_category_id, _token:_token},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        $("#sub_sub_category_id").empty().append('<option value="" selected disabled>--Select--</option>');;
                        $.each(data.sub_sub_categories, function (key, value) {
                            $("#sub_sub_category_id").append('<option value="' + key + '">' + value + '</option>');
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
