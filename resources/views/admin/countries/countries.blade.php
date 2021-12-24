@extends('admin.layouts.master')
@section('title')
    {{ __('translations.Countries')  }}
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<!--------yajra datatable------->
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}
{{--    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">--}}
{{--    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">--}}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('translations.Countries') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ __('translations.Countries') }}</span>
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
                        <a class="btn ripple btn-primary" data-target="#modaldemo1" data-toggle="modal" href="">{{ __('translations.Add country') }}</a>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
{{--                        <table class="table table-bordered data-table">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>No</th>--}}
{{--                                <th>Name en</th>--}}
{{--                                <th>Name ar</th>--}}
{{--                                <th>code</th>--}}
{{--                                <th>active</th>--}}
{{--                                <th width="100px">Action</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}

                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">{{ __('translations.Country Name English') }}</th>
                                <th class="border-bottom-0">{{ __('translations.Country Name Arabic') }}</th>
                                <th class="border-bottom-0">{{ __('translations.Country Code') }}</th>
                                <th class="border-bottom-0">{{ __('translations.Active') }}</th>
                                <th class="border-bottom-0">{{ __('translations.Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            ?>
                            @foreach($countries as $country)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $country->name_en }}</td>
                                    <td>{{ $country->name_ar }}</td>
                                    <td>{{ $country->code ?? 'No Data' }}</td>
                                    <td>
                                        <div class="main-toggle main-toggle-success {{ ($country->active) ? 'on' : '' }}" data-id="{{$country->id}}" id="changeStatus{{$country->id}}">
                                            <span></span>
                                            <input type="hidden" id="country_status{{ $country->id }}" value="{{ $country->active}}">
                                        </div>
                                    </td>
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                               data-id="{{ $country->id }}" data-country_name_en="{{ $country->name_en }}" data-country_name_ar="{{ $country->name_ar }}"
                                               data-code="{{ $country->code }}" data-active="{{ $country->active }}" data-toggle="modal"
                                               href="#exampleModal2" title="Edit"><i class="las la-pen"></i></a>

                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                               data-id="{{ $country->id }}" data-name_en="{{  $country->name_en }}"
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
                        <h6 class="modal-title">{{ __('translations.Add country') }}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('countries.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('translations.Country Name English') }}</label>
                                <input type="text" class="form-control" id="name_en" name="name_en">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('translations.Country Name Arabic') }}</label>
                                <input type="text" class="form-control" id="name_ar" name="name_ar">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ __('translations.Country Code') }}</label>
                                <input type="text" class="form-control" id="code" name="code">
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
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('translations.Edit Country') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="countries/update" method="post" autocomplete="off">
{{--                            {{ method_field('patch') }}--}}
{{--                            {{ csrf_field() }}--}}

{{--                            Equals--}}
                            @csrf
                            @method('patch')
                            <input type="hidden" name="id" id="id" value="">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('translations.Country Name English') }}</label>
                                <input type="text" class="form-control" id="name_en" name="name_en">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('translations.Country Name Arabic') }}</label>
                                <input type="text" class="form-control" id="name_ar" name="name_ar">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ __('translations.Country Code') }}</label>
                                <input type="text" class="form-control" id="code" name="code">
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
                        <h6 class="modal-title">{{ __('translations.Delete Country') }}</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal"
                                type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="countries/destroy" method="post">
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
            var country_name_en = button.data('country_name_en')
            var country_name_ar = button.data('country_name_ar')
            var active = button.data('active')
            var code = button.data('code')
            var $radios = $('input:radio[name=active]');
            if(active === 1) {
                $radios.filter('[value=1]').prop('checked', true);
            }else{
                $radios.filter('[value=0]').prop('checked', true);
            }
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name_en').val(country_name_en);
            modal.find('.modal-body #name_ar').val(country_name_ar);
            modal.find('.modal-body #code').val(code);
        })

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
                var active = $("#country_status"+id).val();
                var _token = $("input[name='_token']").val();
                $.ajax({
                    url: "{{ route('country.changeStatus') }}",
                    type:'POST',
                    data: {active:active, id:id, _token:_token},
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            if(data.active){
                                $("#changeStatus"+id).addClass('on');
                                $("#country_status"+id).val(1);
                            }else{
                                $("#changeStatus"+id).removeClass('on');
                                $("#country_status"+id).val(0);
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

    <!--------yajra datatable-------->
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>--}}


{{--    <script type="text/javascript">--}}
{{--        $(function () {--}}

{{--            var table = $('.data-table').DataTable({--}}
{{--                processing: true,--}}
{{--                serverSide: true,--}}
{{--                ajax: "{{ route('countries.index') }}",--}}
{{--                columns: [--}}
{{--                    {data: 'id', name: 'id'},--}}
{{--                    {data: 'name_en', name: 'name_en'},--}}
{{--                    {data: 'name_ar', name: 'name_ar'},--}}
{{--                    {data: 'code', name: 'code'},--}}
{{--                    {data: 'active', name: 'active'},--}}
{{--                    {data: 'action', name: 'action', orderable: false, searchable: false},--}}
{{--                ]--}}
{{--            });--}}

{{--        });--}}
{{--    </script>--}}
@endsection
