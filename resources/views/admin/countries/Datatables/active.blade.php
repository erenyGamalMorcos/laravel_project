<div class="status-toggle main-toggle main-toggle-success {{ ($active) ? 'on' : '' }}" data-id="{{$id}}" id="changeStatus{{$id}}">
    <span></span>
    <input type="hidden" id="country_status{{ $id }}" value="{{ $active}}">
</div>
<script>

    // $(document).ready(function() {
    $(".status-toggle").click(function(e){
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
    // });
</script>
