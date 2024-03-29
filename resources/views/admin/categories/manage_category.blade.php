@extends('admin/layout')
@section('title', 'Manage Category')

@section('content')
<h1>Manage Category</h1>
<div class="mt-4">
    <a type="button" class="btn btn-primary" href="category">Back</a>
</div>

<div class="card mt-2">
    <div class="card-header">Credit Card</div>
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center title-2">Pay Invoice</h3>
        </div>
        <hr>
        <form action="" method="">
            <div class="form-group">
                <label for="category" class="control-label mb-1">Category</label>
                <input id="category" name="category" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
            </div>
            <div class="form-group">
                <label for="category_slug" class="control-label mb-1">Category Slug</label>
                <input id="category_slug" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
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

            var category = $('#category').val();
            var category_slug = $('#category_slug').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: " {{ url('admin/category_create') }} ",
                data: {
                    category: category,
                    category_slug: category_slug
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
