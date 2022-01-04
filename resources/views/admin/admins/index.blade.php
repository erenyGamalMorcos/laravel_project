@extends('admin.layouts.master')
@section('title')
    {{ __('translations.Users')  }}
@stop
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('translations.Users')  }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translations.Users')  }}</span>
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
                        <a class="btn ripple btn-primary" href="{{ route('admins.create') }}">{{ __('translations.Add User') }}</a>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">{{ __('translations.User Name') }}</th>
                                <th class="border-bottom-0">{{ __('translations.User Email') }}</th>
                                <th class="border-bottom-0">{{ __('translations.User Type') }}</th>
                                <th class="border-bottom-0">{{ __('translations.Active') }}</th>
                                <th class="border-bottom-0">{{ __('translations.Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            ?>
                            @foreach($admins as $admin)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email  }}</td>
                                    <td>{{ $admin->type  }}</td>
                                    <td>
                                        <div class="main-toggle main-toggle-success {{ ($admin->active) ? 'on' : '' }}" data-id="{{$admin->id}}" id="changeStatus{{ $admin->id}}">
                                            <span></span>
                                            <input type="hidden" id="user_status{{ $admin->id}}" value="{{ $admin->active}}">
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('admins.destroy',$admin->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('admins.show', $admin->id) }}">{{ __('translations.Show') }}</a>
                                            <a class="btn btn-primary" href="{{ route('admins.edit', $admin->id) }}">{{ __('translations.Edit') }}</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">{{ __('translations.Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
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
    <script>
        $(document).ready(function() {
            $(".main-toggle").click(function(e){
                e.preventDefault();

                let id = $(this).data("id");
                var active = $("#user_status"+id).val();
                var _token = $("input[name='_token']").val();
                $.ajax({
                    url: "{{ route('admin.changeStatus') }}",
                    type:'GET',
                    data: {active:active, id:id, _token:_token},
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            if(data.active){
                                $("#changeStatus"+id).addClass('on');
                                $("#user_status"+id).val(1);
                            }else{
                                $("#changeStatus"+id).removeClass('on');
                                $("#user_status"+id).val(0);
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
