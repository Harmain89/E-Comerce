@extends('admin/layout')
@section('title', 'Add Coupon')

@section('content')
<h1>Add Coupons</h1>
<div class="mt-4">
    <a type="button" class="btn btn-primary" href="coupon">Back</a>
</div>

<div class="card mt-2">
    <div class="card-header">Create A new Coupon</div>
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center title-2">Pay Invoice</h3>
        </div>
        <hr>
        <form action="" method="">
            <div class="form-group">
                <label for="coupon_title" class="control-label mb-1">Coupon Title</label>
                <input id="coupon_title" name="coupon_title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            <div class="form-group">
                <label for="coupon_code" class="control-label mb-1">Coupon Code</label>
                <input id="coupon_code" name="coupon_code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            <div class="form-group">
                <label for="coupon_value" class="control-label mb-1">Coupon</label>
                <input id="coupon_value" name="coupon_value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            <div>
                <button id="save" type="" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-save fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">Save</span>
                    <span id="payment-button-sending" style="display:none;">Saving…</span>
                </button>
            </div>
        </form>


                <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Launch demo modal
        </button>

    </div>
</div>


<script>

    $(document).ready(function () {

        $('#save').click(function (e) {
            e.preventDefault();

            var coupon_title = $('#coupon_title').val();
            var coupon_code = $('#coupon_code').val();
            var coupon_value = $('#coupon_value').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: " {{ url('admin/coupon_create') }} ",
                data: {
                    coupon_title: coupon_title,
                    coupon_code: coupon_code,
                    coupon_value: coupon_value
                },
                async : true,
                dataType: "json",
                success: function (response) {
                    // console.log(response.msg);
                    $('#exampleModalCenterTitle').html(response.msg);
                    $('#exampleModalCenter').modal('show');
                }
            });

        });


    });



</script>


@endsection()
