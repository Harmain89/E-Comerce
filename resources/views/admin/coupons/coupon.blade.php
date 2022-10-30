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

                                <tr class="tr-shadow" id="c-{{ $item->id }}">
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


        {{-- SCRIPTS WILL BE HERE ! --}}


    </div>
</div>

@endsection
