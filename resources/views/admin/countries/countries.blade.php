@extends('admin.layouts.master')
@section('title')
    {{ __('translations.Countries')  }}
@stop
@section('css')
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
                        {!! $dataTable->table(['class' => 'table table-boarded m-2',], true) !!}
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
</script>

    {!! $dataTable->scripts() !!}
@endsection
