@extends('layouts.admin')
@section('content')
@include('loading.loading')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Sub Category
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn buttons-pdf buttons-html5 btn-outline-success btn-sm mr-1" id="importSubCategory" tabindex="0" aria-controls="dt-basic-example" type="button" title="Generate PDF"><span>@lang('lang.import')</span></button>
                        <a href="javascript:void(0);" class="btn btn-outline-success btn-sm mr-1" id="btnAddNew"><i class="fal fa-plus mr-1"></i> @lang('lang.add_new')</a>
                    </div>
                </div>
                {!! Toastr::message() !!}
                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- datatable start -->
                        <div id="dt-basic-example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row" >
                                <div class="col-sm-12">
                                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100 dataTable dtr-inline" role="grid" aria-describedby="dt-basic-example_info" style="width: 1163px;">
                                        <thead class="table table-bordered table-hover table-striped w-100">
                                            <tr>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 186.2px;" aria-sort="ascending" aria-label="ID: activate to sort column descending">#</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.business_type')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.category')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.sub_category')</th>
                                                <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="Branch: activate to sort column ascending">@lang('lang.branch')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.unit')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.mothly_fee')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="370px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.land_filed_fee')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.total_fee')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{$item->BusinessTeypName}}</td>
                                                    <td>{{ $item->CategoryName }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->BranchNameKh }}</td>
                                                    <td>{{ $item->unit }}</td>
                                                    <td>{{ number_format($item->monthly_fee) }}</td>
                                                    <td>{{ number_format($item->land_filed_fee) }}</td>
                                                    <td>{{ number_format($item->total_fee) }}</td>
                                                    <td>
                                                        <div class="d-flex demo">
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1" data-toggle="modal" onclick="deleteData({{$item->id}})" data-id="{{$item->id}}" title="Delete Record"><i class="fal fa-times"></i></a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1 " id="btn_updated" data-toggle="modal" data-target="#user-edit" data-id="{{$item->id}}" title="Edit"><i class="fal fa-edit"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">#</th>
                                                <th rowspan="1" colspan="1">@lang('lang.business_type')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.category')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.sub_category')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.branch')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.unit')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.monthly_fee')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.land_filed_fee')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.total_fee')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.action')</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- datatable end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sub_category.import')
    @include('sub_category.create')
    @include('sub_category.edit')
@endsection

@section('script')
    <script>
        const txtMonthly_fee = document.getElementById("monthly_fee");
        const txtLand_filed_fee = document.getElementById("land_filed_fee");
        const txtTotal_fee = document.getElementById("total_fee");
        const getTotal = () => {
            txtTotal_fee.value = parseFloat(txtMonthly_fee.value) + parseFloat(txtLand_filed_fee.value);
        }
        monthly_fee.addEventListener("keyup",function(){
            getTotal();
        })
        land_filed_fee.addEventListener("keyup",function(){
            getTotal();
        });

        $(function(){
            $('#btnAddNew').on('click',function(){
                $('#CreateSubCategoryModal').modal('show');
            });
            $('#importSubCategory').on('click',function(){
                $('#SubCategoryModal').modal('show');
            });
            //function on change business type
            $('.onChangeBusinessType').on('change',function(){
                var business_type_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{url('/admins/business_type/onchange')}}",
                    data: {
                        business_type_id : business_type_id
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $('#category_id').empty();
                        $('#sub_category_id').empty();
                        $('#category_id').append('<option>Please Select</option>');
                        $.each(response.data, function(index, item)
                        {
                            $('#category_id').append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                        clearCalculatorFee();
                    }
                });
            });
            // function on Change Category
            $('.onChangeCategory').on('change',function(){
                var cagegory_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{url('/admins/survey/category/onchange')}}",
                    data: {
                        cagegory_id : cagegory_id
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $('#sub_category_id').empty();
                        $('#sub_category_id').append('<option>Please Select</option>');
                        $.each(response.data, function(index, item)
                        {
                            $('#sub_category_id').append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                        clearCalculatorFee();
                    }
                });
                $('.amount').mask('#,##.##',{reverse : true});
            });

            $(document).on('click','#btn_updated',function(){
                let id = $(this).data("id");
                $.ajax({
                    type: "GET",
                    url: `{{ url('/admins/sub-category/${id}') }}`,
                    dataType: "JSON",
                    success: function (response) {
                        if (response.success) {
                            $('#e_id').val(response.success.id);
                            $('#e_business_type').val(response.success.business_type_id);
                            $('#e_category').val(response.success.category_id);
                            $('#e_name').val(response.success.name);
                            $('#e_unit').val(response.success.unit);
                            $('#e_monthly_fee').val(response.success.monthly_fee);
                            $('#e_land_filed_fee').val(response.success.land_filed_fee);
                            $('#e_total_fee').val(response.success.total_fee);
                            $('#e_noted').val(response.success.noted);
                            $('#editSubCategoryModal').modal('show');
                        }
                    }
                });
            });
        });
        const deleteData = (id)=>{
            Swal.fire({
                title: "@lang('lang.are_you_sure')",
                text: "@lang('lang.are_you_sure_want_to_delete')",
                type: "warning",
                showCancelButton: `@lang('lang.cancel')`,
                confirmButtonText: `@lang('lang.deleted')`,
            }).then(function(result)
            {
                if (result.value)
                {
                    $.ajax({
                        type: "DELETE",
                        url: `{{url('/admins/sub-category/${id}')}}`,
                        success: function (data) {
                            if (data.mg == "success") {
                                Swal.fire("Deleted!", "Your file has been deleted.", "success");
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
