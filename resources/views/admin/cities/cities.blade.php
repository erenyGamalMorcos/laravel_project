@extends('admin.layouts.master')
@section('title')
    {{ __('translations.Cities')  }}
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('translations.Cities') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ __('translations.Cities') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
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

    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a class="btn ripple btn-primary" data-target="#modaldemo1" data-toggle="modal" href="">{{ __('translations.Add city') }}</a>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">{{ __('translations.Country Name') }}</th>
                                <th class="border-bottom-0">{{ __('translations.City Name English') }}</th>
                                <th class="border-bottom-0">{{ __('translations.City Name Arabic') }}</th>
                                <th class="border-bottom-0">{{ __('translations.Active') }}</th>
                                <th class="border-bottom-0">{{ __('translations.Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            ?>
                            @foreach($cities as $city)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ (app()->getLocale() == 'en') ? $city->country->name_en : $city->country->name_ar }}</td>
                                    <td>{{ $city->name_en  }}</td>
                                    <td>{{ $city->name_ar  }}</td>
                                    <td>
                                        <div class="main-toggle main-toggle-success {{ ($city->active) ? 'on' : '' }}" data-id="{{$city->id}}" id="changeStatus{{ $city->id}}">
                                            <span></span>
                                            <input type="hidden" id="city_status{{ $city->id}}" value="{{ $city->active}}">
                                        </div>
                                    </td>
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                               data-id="{{ $city->id }}" data-city_name_en="{{ $city->name_en }}" data-city_name_ar="{{ $city->name_ar }}"
                                               data-country_id="{{ $city->country->id }}" data-active="{{ $city->active }}" data-toggle="modal"
                                               href="#exampleModal2" title="Edit"><i class="las la-pen"></i></a>

                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                               data-id="{{ $city->id }}" data-name_en="{{  $city->name_en }}"
                                               data-toggle="modal" href="#modaldemo9" title="{{ __('translations.Delete') }}"><i class="las la-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- Basic modal -->
        <!-- Create -->
        <div class="modal" id="modaldemo1">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ __('translations.Add city') }}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('cities.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('translations.City Name English') }}</label>
                                <input type="text" class="form-control" id="name_en" name="name_en">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('translations.City Name Arabic') }}</label>
                                <input type="text" class="form-control" id="name_ar" name="name_ar">
                            </div>

                            <div class="form-group">
                                <select name="country_id" id="country_id" class="form-control" required>
                                    <option value="" selected disabled>{{ __('translations.Select Country') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ (app()->getLocale() == 'en') ? $country->name_en : $country->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ __('translations.Active') }}</label>
                                <br>
                                <input type="radio" id="yes" name="active" value="1">
                                <label for="yes">{{ __('translations.Yes') }}</label><br>
                                <input type="radio" id="no" name="active" value="0">
                                <label for="no">{{ __('translations.No') }}</label><br>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">{{ __('translations.Save') }}</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('translations.Close') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Basic modal -->


        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('translations.Edit City') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="cities/update" method="post" autocomplete="off">
{{--                            {{ method_field('patch') }}--}}
{{--                            {{ csrf_field() }}--}}

{{--                            Equals--}}
                            @csrf
                            @method('patch')
                            <input type="hidden" name="id" id="id" value="">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('translations.City Name English') }}</label>
                                <input type="text" class="form-control" id="name_en" name="name_en">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('translations.City Name Arabic') }}</label>
                                <input type="text" class="form-control" id="name_ar" name="name_ar">
                            </div>

                            <div class="form-group">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{ __('translations.Country Name') }}</label>
                                <select name="country_id" id="country_id" class="form-control" required>
                                    <option value="" selected disabled>{{ __('translations.Select Country') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ (app()->getLocale() == 'en') ? $country->name_en : $country->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ __('translations.Active') }}</label>
                                <br>
                                <input type="radio" id="yes" name="active" value="1">
                                <label for="yes">{{ __('translations.Yes') }}</label><br>
                                <input type="radio" id="no" name="active" value="0">
                                <label for="no">{{ __('translations.No') }}</label><br>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">{{ __('translations.Save') }}</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('translations.Close') }}</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <!-- delete -->

        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ __('translations.Delete City') }}</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal"
                                type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="cities/destroy" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>{{ __('translations.Are you sure to delete this?') }}</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="name_en" id="name_en" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('translations.Cancel') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('translations.Confirm') }}</button>
                        </div>

                </form>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>

    <!-- update -->
    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var city_name_en = button.data('city_name_en')
            var city_name_ar = button.data('city_name_ar')
            var country_id = button.data('country_id')
            var active = button.data('active')
            var $radios = $('input:radio[name=active]');
            if(active === 1) {
                $radios.filter('[value=1]').prop('checked', true);
            }else{
                $radios.filter('[value=0]').prop('checked', true);
            }
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name_en').val(city_name_en);
            modal.find('.modal-body #name_ar').val(city_name_ar);
            modal.find('.modal-body #country_id').val(country_id);
        });

    <!-- delete -->
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name_en = button.data('name_en')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name_en').val(name_en);
        });


        $(document).ready(function() {
            $(".main-toggle").click(function(e){
                e.preventDefault();

                let id = $(this).data("id");
                var active = $("#city_status"+id).val();
                var _token = $("input[name='_token']").val();
                $.ajax({
                    url: "{{ route('city.changeStatus') }}",
                    type:'POST',
                    data: {active:active, id:id, _token:_token},
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            if(data.active){
                                $("#changeStatus"+id).addClass('on');
                                $("#city_status"+id).val(1);
                            }else{
                                $("#changeStatus"+id).removeClass('on');
                                $("#city_status"+id).val(0);
                            }
                            printSuccessMsg(data.success);
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
            function printSuccessMsg (msg) {
                $(".print-success-msg").find("ul").html('');
                $(".print-success-msg").css('display','block');
                $(".print-success-msg").find("ul").append('<li>'+msg+'</li>');
            }
        });
    </script>
@endsection
