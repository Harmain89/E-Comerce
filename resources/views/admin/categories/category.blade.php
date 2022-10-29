@extends('admin/layout')
@section('title', 'Category')

@section('content')

<div class="row">
    <div class="col-6">
        <h1 class="float-left">Category</h1>
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
                        <a href="{{ route('admin.manage_category') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add category</a>
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
                                <th>category Name</th>
                                <th>category Slug</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)

                                <tr class="tr-shadow" id="c-{{ $item->id }}">
                                    <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="d-none" id="rowid"> {{ $item->id }} </td>
                                    <td> {{ $item->category_name }} </td>
                                    <td>
                                        <span class="block-email"> {{ $item->category_slug }} </span>
                                    </td>
                                    <td class="desc"> {{ $item->created_at }} </td>
                                    <td> {{ $item->updated_at }} </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item category-edit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit text-info"></i>
                                            </button>
                                            <button class="item category-delete" data-toggle="tooltip" data-placement="top" title="Delete">
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



        <script>
            $(document).ready(function () {

                $("#datatablesSimple").on('click','.category-edit',function(e){
                    e.preventDefault();

                    // get the current row
                    var currentRow = $(this).closest("tr");
                    var currentRowid = $(this).closest("tr").attr("id");



                    var row_id = currentRow.find("td:eq(1)").text(); // get current row 1st TD value
                    var category_name = currentRow.find("td:eq(2)").text(); // get current row 2nd TD value
                    var category_slug = currentRow.find("td:eq(3)").text(); // get current row 3nd TD
                    var data = row_id + category_name + "\n" + category_slug;

                    // alert(data);

                    $('#togetvalue').text($.trim(currentRowid));
                    $('#togetid').val($.trim(row_id));

                    $('#categoryEditTitle').text(category_name);

                    var c_n = $.trim(category_name);
                    $('#category-name').val(c_n);

                    var c_s = $.trim(category_slug);
                    $('#category-slug').val(c_s);

                    // $('#show_image').attr("src",image);


                    var fg = $(`#datatablesSimple table #${currentRowid}`).find("td:eq(2)").text();
                    console.log(fg);

                    $('#categoryEdit').modal('show');
                    // $('input[@type="text"]')[0].focus();
                    // $('input:text#show_name').focus();
                    // document.getElementById("show_name").focus();


                });


                $('#save-category-edit').click(function (e) {
                    e.preventDefault();

                    var togetid = $('#togetid').val();
                    var category_name = $('#category-name').val();
                    var category_slug = $('#category-slug').val();

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "post",
                        url: " {{ route('admin.category_edit') }} ",
                        data: {
                            togetid: togetid,
                            category_name: category_name,
                            category_slug: category_slug
                        },
                        async : true,
                        dataType: "json",
                        success: function (response) {
                            console.log(response.msg);
                            // console.log(response.msg2);

                            $('#categoryEdit').modal('hide');
                            $('#exampleModalCenterTitle').html(response.msg);
                            $('#exampleModalCenter').modal('show');

                            var togetvalue = $('#togetvalue').text();
                            $(`#datatablesSimple table #${togetvalue}`).find("td:eq(2)").text(category_name);
                            $(`#datatablesSimple table #${togetvalue}`).find("td:eq(3)").text(category_slug);


                            // console.log(togetid);
                            // console.log(togetvalue);
                            // console.log(category_name);
                            // console.log(category_slug);

                            // console.log($.trim(cat_changed_name_val));
                            // console.log($.trim(cat_changed_slug_val));
                        }
                    });

                });


                // DELETE FUNCTION
                $("#datatablesSimple").on('click','.category-delete',function(e){
                    e.preventDefault();

                    // get the current row
                    var currentRow = $(this).closest("tr");

                    var row_id = currentRow.find("td:eq(1)").text(); // get current row 1st TD value
                    var category_name = currentRow.find("td:eq(2)").text(); // get current row 2nd TD value
                    var data = row_id;

                    // alert(data);


                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "post",
                        url: " {{ route('admin.category_delete') }} ",
                        data: {
                            row_id: row_id,
                            category_name: category_name
                        },
                        async : true,
                        dataType: "json",
                        success: function (response) {

                            // $('#categoryEdit').modal('hide');
                            // $('#exampleModalCenterTitle').html(response.msg);
                            // $('#exampleModalCenter').modal('show');

                            // var togetvalue = $('#togetvalue').text();
                            // $(`#datatablesSimple table #${togetvalue}`).find("td:eq(2)").text(category_name);
                            // $(`#datatablesSimple table #${togetvalue}`).find("td:eq(3)").text(category_slug);

                            $('#exampleModalCenterTitle').html(response.msg);
                            $('#exampleModalCenter').modal('show');
                        }
                    });

                });


            });
        </script>


    </div>
</div>

@endsection
