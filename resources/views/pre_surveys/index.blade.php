@extends('layouts.admin')
@section('content')
{{-- @include('loading.loading') --}}
@section('style')
    <style>
        .imgGallery{
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

       /* Custom styles for PreSurveyCreateModal */
        #PreSurveyCreateModal {
            z-index: 2041; /* Adjust this value to be lower or higher based on your requirements */
        }

        /* pop up image */
        .image-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
            z-index: 2045; /* Higher than default Bootstrap modals */
            display: none;
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .modal-image {
            max-width: 100%;
            max-height: 80vh;
            display: block;
            margin: 0 auto 10px;
        }

        .close-modal {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

    </style>
@endsection
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-container show">
                    <div class="panel-content">
                        <form action="{{ url('admins/pre/pre-survey') }}" method="get">
                            @include('filter_data_list.filter_date')
                            @include('filter_data_list.filter_location_code')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Pre Survey
                    </h2>
                    @can('Pre Survey Create')
                        <div class="panel-toolbar">
                            <a href="javascript:void(0);" class="btn btn-outline-success btn-sm mr-1" id="btnAddNew"><i class="fal fa-plus mr-1"></i> @lang('lang.add_new')</a>
                        </div>
                    @endcan
                </div>

                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="tbl_pre_survey" class="table table-bordered table-hover table-striped w-100 dataTable dtr-inline" role="grid" aria-describedby="dt-basic-example_info" style="width: 1163px;">
                                        <thead class="table table-bordered table-hover table-striped w-100">
                                            <tr role="row">
                                                <th style="width: 186.2px;">ID</th>
                                                <th style="width: 279.2px;">@lang('lang.image')</th>
                                                <th style="width: 279.2px;">@lang('lang.location_code')</th>
                                                <th style="width: 279.2px;">@lang('lang.business_type')</th>
                                                <th style="width: 279.2px;">@lang('lang.sub_category')</th>
                                                <th style="width: 279.2px;">@lang('lang.latitude')</th>
                                                <th style="width: 279.2px;">@lang('lang.longitude')</th>
                                                <th style="width: 279.2px;">@lang('lang.name')</th>
                                                <th style="width: 279.2px;">@lang('lang.branch')</th>
                                                <th style="width: 279.2px;">@lang('lang.link_map')</th>
                                                <th style="width: 138.2px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pre_surveys.create')
    {{--  @include('pre_surveys.edit')  --}}
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            dataTables();
        });
        var edit_sub_category = null;
        var pre_survey_id = null;
        $(function(){
            //functon search location code in survey
            $('#btnAddNew').on('click',function(){
                edit_sub_category = null;
                $("#category_id").val('');
                $("#sub_category_id").val('');
                $("#link_google_map").val('');
                $("#location_latitude").val('');
                $("#location_longitude").val('');
                $("#block_id").val('');
                $("#sector_id").val('');
                $("#street_id").val('');
                $("#side_of_street_id").val('');
                const imagePreviewContainer = $('.imgGallery');
                imagePreviewContainer.empty(); // Clear any previous images
                $('#PreSurveyCreateModal').modal('show');
            });

            $('#chooseFile').on('change', function(event) {
                handleImageUpload(event.target.files, '.imgGallery');
            });
            //function on change business type
            $('.changeCategory').on('change',function(){
                var category_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{url('/admins/customer/category/onchange')}}",
                    data: {
                        cagegory_id : category_id,
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $('#sub_category_id').empty();
                        $.each(response.data, function(index, item)
                        {
                            $('#sub_category_id').append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                        if(edit_sub_category != null){
                            $('#sub_category_id').val(edit_sub_category).trigger('change');
                        }
                    }
                });
            });

            $("#btnSubmitPreSurvey").on("click",function(){
                createPreSurvy()
            });
            $(".image-preview .existing-image").on("click",function(int){
               console.log(9999);
               console.log(int);

            });
        });
        function createPreSurvy(){
            let arrImage = [];
            $('.imgGallery img').each(function(){
                // Get the src attribute value of each img element and display it
                var srcValue = $(this).attr('src');
                arrImage.push({"path_name":srcValue});
            });
            let numRequired = 0;
            var count_img = $('.imgGallery .image-preview').length;
            if(count_img == 0){numRequired++}

            $(".pre_survey_required").each(function(e){
                if($(this).val()==""){ numRequired++;}
            });
            if (numRequired>0) {
                toastr.warning("@lang('lang.input_require')", "@lang('lang.message_title')");
                $(".pre_survey_required").each(function(){
                    if($(this).val()==""){
                        $(this).css("border-color","red");
                    }
                });
            }else{
                let type = "";
                let url = "";
                if(pre_survey_id == null){
                   type = "POST";
                   url = "{{url('admins/pre/pre-survey')}}";
                }else{
                    type = "PUT";
                    url = `{{url('admins/pre/pre-survey/${pre_survey_id}')}}`;
                }
                $.ajax({
                    type: type,
                    url: url,
                    data: {
                        arrImage : arrImage,
                        business_type_id : $("#category_id").val(),
                        sub_category_id : $("#sub_category_id").val(),
                        block_id : $("#block_id").val(),
                        sector_id : $("#sector_id").val(),
                        street_id : $("#street_id").val(),
                        side_of_street_id : $("#side_of_street_id").val(),
                        link_map : $("#link_google_map").val(),
                        location_latitude : $("#location_latitude").val(),
                        location_longitude : $("#location_longitude").val(),
                    },
                    dataType: "JSON",
                    success: function (response) {
                        if (response.message=='successfull') {
                            toastr.success("@lang('lang.data_has_been_save_success')", "@lang('lang.message_title')");
                        }
                        window.location.replace("{{ URL('admins/pre/pre-survey') }}");
                    }
                });
            }
        }
        const editData = (id)=>{
            $.ajax({
                type: "GET",
                url: `{{ url('/admins/pre/pre-survey/${id}') }}`,
                dataType: "JSON",
                success: function (response) {
                    let pre_survey = response.data;
                    if (response.msg == 'success') {
                        displayExistingImages(response.files);
                        $('#id').val(pre_survey.id);
                        $('#category_id').val(pre_survey.business_type_id).trigger('change');
                        $('#block_id').val(pre_survey.block_id).trigger('change');
                        $('#sector_id').val(pre_survey.sector_id).trigger('change');
                        $('#street_id').val(pre_survey.street_id).trigger('change');
                        $('#side_of_street_id').val(pre_survey.side_of_street_id).trigger('change');
                        $('#location_longitude').val(pre_survey.location_longitude);
                        $('#location_latitude').val(pre_survey.location_latitude);
                        $('#link_map').val(pre_survey.link_map);
                        edit_sub_category = pre_survey.sub_category_id;
                        pre_survey_id = id;
                        $('#PreSurveyCreateModal').modal('show');
                    }
                }
            });
        }
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
                        url: `{{url('/admins/pre/pre-survey/${id}')}}`,
                        success: function (data) {
                            if (data.mg == "success") {
                                Swal.fire("Deleted!", "Your file has been deleted.","success");
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        }
        function dataTables() {
            $('#tbl_pre_survey').DataTable({
                // dom: 'Blfrtip',
                pageLength: 10,
                destroy: true,
                processing: true,
                serverSide: true,
                order: [[0, 'desc']],
                lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ],
                ajax: {
                    url: '{{ URL("admins/pre/pre-survey") }}',
                    type: 'GET'
                },
                columns: [
                    {
                        data: 'id', 
                        name: 'id'
                    },
                    {
                        data: '', 
                        name: 'PreSurveyFile',
                        render: function(data, type, row) {
                            // Check if PreSurveyFile exists and has images
                            if (row.pre_survey_file && row.pre_survey_file.length > 0) {
                                // Map through PreSurveyFile array to create anchor tags with images
                                const imagesHtml = row.pre_survey_file.map(item => 
                                    `<a href="${item.full_path}" class="href_img" style="padding-left: 5px;" alt="${item.full_path}">
                                        <img class="img-responsive" src="${item.full_path}" style="width: 80px; height: 50px; object-fit: cover;" alt="Image" onerror="this.style.display='none';">
                                    </a>`
                                ).join(''); // Join them into a single string
                                
                                return `<div class="lightgallery">${imagesHtml}</div>`; // Return the HTML string wrapped in lightgallery div
                            } else {
                                // Return a placeholder or an empty string if no images
                                return '';
                            }
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: null,
                        name: 'location_code', 
                        render: function(data, type, row) {
                            // Concatenate strings
                            const locationCode = `${row.block_name}${row.sector_name}${row.street_name}${row.side_of_street_name}`;
                            // Return the concatenated string
                            return locationCode;
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'category_name', 
                        name: 'category_name'
                    },
                    {
                        data: 'sub_category_name', 
                        name: 'sub_category_name'
                    },
                    {
                        data: 'location_longitude', 
                        name: 'location_longitude'
                    },
                    {
                        data: 'location_latitude', 
                        name: 'location_latitude'
                    },
                    {
                        data: 'user_name', 
                        name: 'user_name'
                    },
                    {
                        data: 'branch_name_en', 
                        name: 'branch_name_en'
                    },
                    {
                        data: '', 
                        name: 'link_map',
                        render: function(data, type, row) {
                            return `<a href="/admins/map/pre_survey/${row.id}" target="_blank">View on Map</a>`;
                        },
                        orderable: false,  // Disable ordering for this column
                        searchable: false  // Disable searching for this column
                    },
                    {
                        data: '', 
                        name: 'action',
                        render: function(data, type, row) {
                            return `
                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1" data-toggle="modal" onclick="deleteData(${row.id})" data-id="${row.id}" title="Delete Record"><i class="fal fa-times"></i></a> 
                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-success btn-icon btn-inline-block mr-1" id="btn_updated" onclick="editData(${row.id})" data-toggle="modal" data-target="#user-edit" data-id="${row.id}" title="Edit"><i class="fal fa-edit"></i></a>
                            `;
                        },
                        orderable: false,
                        searchable: false
                    }
                ],
                drawCallback: function(settings) {
                    // Reinitialize LightGallery each time the table is drawn
                    $('.lightgallery').lightGallery({
                        selector: 'a', // Ensure that it applies to all anchor tags inside lightgallery
                        thumbnail: true,
                        zoom: true
                    });
                },
                order: [[0, 'desc']]
            });
        }
    </script>
@endsection
