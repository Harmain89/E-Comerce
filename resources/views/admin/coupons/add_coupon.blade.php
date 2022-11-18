@extends('admin/layout')
@section('title', 'Add Coupon')

@section('content')
<h1>Add Coupons</h1>
<div class="mt-4">
    <a type="button" class="btn btn-primary" href="coupon">Back</a>
</div>

<div class="card mt-2">
    {{ session('message') }}
    <div class="card-header">Create A new Coupon</div>
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center title-2">Coupon Codes</h3>
        </div>
        <hr>
        <form class="needs-validation" action="" method="">
            <div class="form-group">
                <label for="coupon_title" class="control-label mb-1">Coupon Title</label>
                <input id="coupon_title" name="coupon_title" type="text" class="form-control" >
                {{-- @error('title')

                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ session('error') }}</strong>
                    </div>

                @enderror --}}
            </div>
            <div class="form-group">
                <label for="coupon_code" class="control-label mb-1">Coupon Code</label>
                <input id="coupon_code" name="coupon_code" type="text" class="form-control" >
            </div>
            <div class="form-group">
                <label for="coupon_value" class="control-label mb-1">Coupon</label>
                <input id="coupon_value" name="coupon_value" type="text" class="form-control" >
            </div>
            <div>
                <button id="save" type="" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-save fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">Save</span>
                    <span id="payment-button-sending" style="display:none;">Saving…</span>
                </button>
            </div>
        </form>
        <div id="demoprint"></div>



        {{-- <form class="row g-3">
            <div class="col-12">
              <label for="coupon_title" class="form-label font-weight-bold">Coupon Title</label>
              <input type="text" name="coupon_title" class="form-control" id="coupon_title" placeholder="Coupon Title">
            </div>
            <div class="col-12">
              <label for="coupon_code" class="form-label">Coupon Code</label>
              <input type="text" name="coupon_code" class="form-control" id="coupon_code" placeholder="Coupon Code">
            </div>
            <div class="col-12">
              <label for="coupon_value" class="form-label">Coupon</label>
              <input type="text" name="coupon_value" class="form-control" id="coupon_value" placeholder="Coupon">
            </div>
            <div class="col-12">
              <button type="" id="save" class="btn btn-lg btn-info btn-block">Save</button>
            </div>
        </form> --}}


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

            var html;

            if(coupon_title == '') {
                html += "title is missing";
                $('#demoprint').html(html);
            }
            else if(coupon_code == '') {
                html += "code is missing";
                $('#demoprint').html(html);
            }
            if(coupon_value == '') {
                html += "Value is missing";
                $('#demoprint').html(html);
            }
            else {

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
            }


        });


    });



</script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('save', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>


@endsection()
