@extends('admin.layouts.master')
@section('title')
    {{ __('translations.Categories') }}
@stop
@section('css')
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0"> {{ __('translations.Edit Categories') }}</h4>
                        <br>
                    </div>
                    <!-- end col -->
                    <div class="col-md-12">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown">
                                <a class="btn btn-primary" href="{{ route('categories.index') }}"> {{__('translations.Back to Categories')}}</a>
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

                    <form  method="post" action="{{route('categories.update', $category->id)}}" novalidate="">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input hidden="hidden" name="id" value="{{$category->id}}">
                                    <label>{{ __('translations.Category Name En') }}</label>
                                    <input type="text" name="category_name_en" class="form-control" required="" placeholder="{{ __('translations.Category Name En') }}" value="{{ $category->category_name_en }}">
                                </div>
                            </div><!--col 1-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Category Name Ar') }}</label>
                                    <input type="text" name="category_name_ar" class="form-control" required="" placeholder="{{ __('translations.Category Name Ar') }}" value="{{ $category->category_name_ar }}">
                                </div>
                            </div><!--col 1-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Category Description En') }}</label>
                                    <textarea name="description_en" class="form-control" placeholder="{{ __('translations.Category Description En') }}">{{ $category->description_en }}</textarea>

                                </div>
                            </div><!--col 1-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('translations.Category Description Ar') }}</label>
                                    <textarea name="description_ar" class="form-control" placeholder="{{ __('translations.Category Description Ar') }}">{{ $category->description_ar }}</textarea>
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
