@extends('layouts.admin')
@section('content')
@include('loading.loading')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Users Log <span class="fw-300"><i>Table</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="tblUserLog" class="table table-bordered table-hover table-striped w-100 dtr-inline">
                                    <thead class="table table-bordered table-hover table-striped w-100">
                                        <tr>
                                            <th>#</th>
                                            <th>Log Name</th>
                                            <th>Description</th>
                                            <th>Subject Type</th>
                                            <th>Event</th>
                                            <th>Subject</th>
                                            <th>Properties</th>
                                            <th>Created</th>
                                            <th>Updated</th>
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
@endsection
@section('script')
<script>
    $(document).ready(function() {
        dataTables();
    });
    function dataTables() {
        $('#tblUserLog').DataTable({
            // dom: 'Blfrtip',
            pageLength: 10,
            destroy: true,
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ],
            ajax: {
                url: '{{ URL("admins/user-log") }}',
                type: 'GET'
            },
            columns: [
                {
                    data: 'id', 
                    name: 'id'
                },
                {
                    data: 'log_name', 
                    name: 'log_name'
                },
                {
                    data: 'description', 
                    name: 'description'
                },
                {
                    data: 'subject_type', 
                    name: 'subject_type'
                },
                {
                    data: 'event', 
                    name: 'event'
                },
                {
                    data: 'subject_id', 
                    name: 'subject_id'
                },
                {
                    data: 'properties', 
                    name: 'properties'
                },
                {
                    data: 'created_at', 
                    name: 'created_at' , 
                    searching : false
                },
                {
                    data: 'updated_at', 
                    name: 'updated_at'
                }
            ],
            order: [[0, 'desc']]
        });
    }
</script>
@endsection