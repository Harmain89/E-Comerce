@extends('admin/layout')
@section('title', 'Coupon')

@section('content')

<div class="row">
    <div class="col-6">
        <h1 class="float-left">Manage Coupon</h1>
    </div>
    <div class="col-6">
        <a href="manage_category" class="float-right">
            {{-- <button type="button" class="btn btn-success">
                Add Category
            </button> --}}
        </a>
    </div>
</div>

<div class="row m-t-30">
    <div class="col-md-12">

        {{-- DATA TABLE --}}
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                {{-- <h3 class="title-5 m-b-35">data table</h3> --}}
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="rs-select2--light rs-select2--md">
                            <select class="js-select2" name="property">
                                <option selected="selected">All Properties</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <div class="rs-select2--light rs-select2--sm">
                            <select class="js-select2" name="time">
                                <option selected="selected">Today</option>
                                <option value="">3 Days</option>
                                <option value="">1 Week</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <button class="au-btn-filter">
                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                    </div>
                    <div class="table-data__tool-right">
                        <a href="{{ route('admin.manage_coupon') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add coupon</a>
                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                            <select class="js-select2" name="type">
                                <option selected="selected">Export</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2" id="datatablesSimple">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>
                                    <label class="au-checkbox">
                                        <input type="checkbox">
                                        <span class="au-checkmark"></span>
                                    </label>
                                </th>
                                <th>Coupon Title</th>
                                <th>Coupon Code</th>
                                <th>Coupon Value</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)

                                <tr class="tr-shadow" id="coupon-{{ $item->id }}">
                                    <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="d-none" id="rowid"> {{ $item->id }} </td>
                                    <td> {{ $item->title }} </td>
                                    <td>
                                        <span class="block-email"> {{ $item->code }} </span>
                                    </td>
                                    <td>
                                        <span class="block-email"> {{ $item->value }} </span>
                                    </td>
                                    <td class="desc"> {{ $item->created_at }} </td>
                                    <td> {{ $item->updated_at }} </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item coupon-edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit text-info"></i>
                                            </button>
                                            <button class="item coupon-delete" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete text-danger"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>

        {{-- <span class="d-none" id="togetid"></span> --}}
        <input class="d-none" type="text" name="" id="togetid">
        <span class="d-none" id="togetvalue"></span>


        {{-- SCRIPTS WILL BE HERE ! --}}

        <script>
            $(document).ready(function () {

                $("#datatablesSimple").on('click','.coupon-edit',function(e){
                    e.preventDefault();

                    // get the current row
                    var currentRow = $(this).closest("tr");
                    var currentRowid = $(this).closest("tr").attr("id");

                    var row_id = currentRow.find("td:eq(1)").text(); // get current row 1st TD value
                    var coupon_title = currentRow.find("td:eq(2)").text(); // get current row 2nd TD value
                    var coupon_code = currentRow.find("td:eq(3)").text(); // get current row 3nd TD
                    var coupon_value = currentRow.find("td:eq(4)").text(); // get current row 3nd TD
                    var data = row_id + coupon_title + "\n" + coupon_code + "\n" + coupon_value;

                    // alert(data);

                    $('#togetvalue').text($.trim(currentRowid));
                    $('#togetid').val($.trim(row_id));

                    $('#couponEditTitle').text(coupon_title);

                    var c_t = $.trim(coupon_title);
                    $('#coupon-title').val(c_t);

                    var c_c = $.trim(coupon_code);
                    $('#coupon-code').val(c_c);

                    var c_v = $.trim(coupon_value);
                    $('#coupon-value').val(c_v);

                    // $('#show_image').attr("src",image);


                    var fg = $(`#datatablesSimple table #${currentRowid}`).find("td:eq(2)").text();
                    console.log(fg);

                    $('#couponEdit').modal('show');
                    // $('input[@type="text"]')[0].focus();
                    // $('input:text#show_name').focus();
                    // document.getElementById("show_name").focus();


                });


                $('#save-coupon-edit').click(function (e) {
                    e.preventDefault();

                    var togetid = $('#togetid').val();
                    var coupon_title = $('#coupon-title').val();
                    var coupon_code = $('#coupon-code').val();
                    var coupon_value = $('#coupon-value').val();

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "post",
                        url: " {{ route('admin.coupon_edit') }} ",
                        data: {
                            togetid: togetid,
                            coupon_title: coupon_title,
                            coupon_code: coupon_code,
                            coupon_value: coupon_value
                        },
                        async : true,
                        dataType: "json",
                        success: function (response) {
                            console.log(response.msg);
                            // console.log(response.msg2);

                            $('#couponEdit').modal('hide');
                            $('#exampleModalCenterTitle').html(response.msg);
                            $('#exampleModalCenter').modal('show');

                            var togetvalue = $('#togetvalue').text();
                            $(`#datatablesSimple table #${togetvalue}`).find("td:eq(2)").text(coupon_title);
                            $(`#datatablesSimple table #${togetvalue}`).find("td:eq(3)").text(coupon_code);
                            $(`#datatablesSimple table #${togetvalue}`).find("td:eq(4)").text(coupon_value);

                        }
                    });

                });


                // DELETE FUNCTION

                $("#datatablesSimple").on('click','.coupon-delete',function(e){
                    e.preventDefault();

                    // get the current row
                    let currentRow = $(this).closest("tr");

                    var row_id = currentRow.find("td:eq(1)").text(); // get current row 1st TD value

                    var coupon_title = currentRow.find("td:eq(2)").text(); // get current row 2nd TD value
                    var data = row_id;

                    // alert(data);

                    $('#couponDelete').modal('show');

                    $('#delete-coupon').click(function (e) {
                        e.preventDefault();

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "post",
                            url: " {{ route('admin.coupon_delete') }} ",
                            data: {
                                row_id: row_id,
                                coupon_title: coupon_title
                            },
                            async : true,
                            dataType: "json",
                            success: function (response) {

                                $('#exampleModalCenterTitle').html(response.msg);
                                $('#exampleModalCenter').modal('show');

                                $('#couponDelete').modal('hide');
                                console.log(response.errormsg);

                            }
                        });
                    });


                    $('#canceldelete').click(function (e) {
                        e.preventDefault();
                        row_id = '';
                    });


                });

                // FOR REMOVING TR ON DELETING CATEGORY
                $("#datatablesSimple").on('click','.coupon-delete',function(e){
                    e.preventDefault();

                    // get the current row
                    var currentRowid = $(this).closest("tr").attr("id");
                    $('#togetvalue').text($.trim(currentRowid));

                    $('#delete-coupon').click(function (e) {
                        e.preventDefault();


                        var row_delete_id = $('#togetvalue').text();
                        if(currentRowid != '') {
                            $(`tr#${row_delete_id}`).remove();
                            console.log("currentRowid = " + currentRowid);
                        }

                    });


                    $('#canceldelete').click(function (e) {
                        e.preventDefault();
                        currentRowid = '';
                    });

                });


            });
        </script>


    </div>
</div>

@endsection
