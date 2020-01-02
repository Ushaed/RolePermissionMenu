@extends('partials.app')
@section('title','Create Permission')
@section('title-card-h1','Permission')
@section('title-card-small','Create')
@section('timelineBar')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                    class="nav-icon fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permission</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@stop
@push('customCss')
    <style>
        .note-editor.note-frame .note-editing-area {
            overflow: hidden;
            min-height: 200px;
        }
    </style>

@endpush
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>Add New Permission</h3>
            </div>
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
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()
        })
    </script>
@endsection
@push('customJs')
    <script>
        $(document).ready(function () {
            let key = 0;
            $("#Role_id_form").on('submit',function (event) {
                event.preventDefault();
                let id = document.forms["role_id_form_name"]["role"].value;
                $.ajax({
                    type: "GET",
                    url: "{{ route('permissions.role.add','') }}" + '/' + id,
                    dataType: "json",
                    success:function (response) {
                        console.log(response);
                        let html = '';
                        html += '<table class="table table-bordered table-striped table-hover text-center" id="dataTable"> ' +
                            '<thead> ' +
                            '<tr> ' +
                            '<th style="width: 50%">Controller</th> ' +
                            '<th>Method</th> ' +
                            '<th>Check</th>' +
                            '</tr> ' +
                            '</thead> ' +
                            '<tbody>';
                        $.each(response.allAvailablePermission, function(index, item) {
                            $.each(response.permission, function(index, role_item) {
                                if(item.id === role_item.id){
                                     return key = 1;
                                }
                            });
                            let controller = item.controller.split("\\");
                            let length_controller = controller.length;

                            html += '<tr>' +
                                '<td>'+ controller[length_controller-1] +'</td>' +
                                '<td>'+ item.method +'</td>';
                                if(key===1){
                                    html += '<td><input type="checkbox" name="check" id="check" checked class="form-control"></td>';
                                }else{
                                    html += '<td><input type="checkbox" name="check" id="check" class="form-control"></td>';
                                }
                                html +='</tr>';
                            key = 0;
                            console.log(key);
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
