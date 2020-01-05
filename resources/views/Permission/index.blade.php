@extends('partials.app')
@section('title','Permission')
@section('title-card-h1','Permission')
@section('title-card-small','Manage Permission')
@section('timelineBar')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                    class="nav-icon fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>
        <li class="breadcrumb-item active">Permission</li>
    </ol>
@stop
@push('customCss')


@endpush
@section('content')
    <p><a href="{{ route('permissions.show') }}" class="btn btn-info"><i class="fas fa-plus"></i> Add Permission</a></p>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Permission</h3>
        </div>
        <div class="card-body">
            <form id="Role_id_form" name="role_id_form_name">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="role">Select Role</label>
                        <select name="role" id="role" class="form-control">
                            <option selected>Select Role</option>
                            @foreach($role as $key=>$value)
                                <option value="{{ $value['id'] }}">{{ucfirst($value['name'])}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label> </label>
                        <button type="submit" class="btn btn-primary d-block mt-2">Submit</button>
                    </div>
                </div>
            </form>
            <div id="table_of_permission"></div>
        </div>
    </div>


@stop
@push('customJs')
    <script>
        $(document).ready(function () {
            $("#Role_id_form").on('submit',function (event) {
                event.preventDefault();
                let id = document.forms["role_id_form_name"]["role"].value;
                $.ajax({
                    type: "GET",
                    url: "{{ route('permissions.role','') }}" + '/' + id,
                    dataType: "json",
                    success:function (response) {
                        let html = '';
                        html += '<table class="table table-bordered table-striped table-hover text-center" id="dataTable"> ' +
                            '<thead> ' +
                            '<tr> ' +
                            '<th style="width: 50%">Controller</th> ' +
                            '<th>Method</th> ' +
                            '</tr> ' +
                            '</thead> ' +
                            '<tbody>';
                            $.each(response, function(index, item) {
                                let controller = item.controller.split("\\");
                                let length_controller = controller.length;
                                html += '<tr>' +
                                    '<td>'+ controller[length_controller-1] +'</td>' +
                                    '<td>'+ item.method +'</td>' +
                                    '</tr>'
                            });
                            html += '</tbody></table>';
                        $("#table_of_permission").html(html);
                    },
                    error: function (response) {
                        alert('Select a role');
                    }
                })
            })
        });
    </script>
@endpush

