@extends('partials.app')
@section('title','Role')
@section('title-card-h1','Role')
@section('title-card-small','Manage Role')
@section('timelineBar')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                    class="nav-icon fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>
        <li class="breadcrumb-item active">Role</li>
    </ol>
@stop
@push('customCss')
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <style>
        .error {
            color: red;
        }

        .note-editor.note-frame .note-editing-area {
            overflow: hidden;
            min-height: 200px;
        }
    </style>

@endpush
@section('content')
    <div class="modal fade" id="Add_Role_Modal" tabindex="-1" role="dialog" aria-labelledby="Add_Role_Modal_Label"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Add_Role_Modal_Label">Add Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="Add_Role_form" name="Add_Role_form_name">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" placeholder="Role name" name="name"
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control textarea" name="description" id="description"
                                          placeholder="Role description goes here..."></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="View_Role_Modal" tabindex="-1" role="dialog" aria-labelledby="View_Role_Modal_Label"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="View_Role_Modal_Label">View Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body" id="View_Role_Modal_Body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
            </div>
        </div>
    </div>


    {{--        <p><a href="{{ route('role.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> Add Role</a></p>--}}
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Add_Role_Modal">
        <i class="fas fa-plus"></i> Add Role
    </button><br><br>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Role</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm table-hover" id="dataTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th style="width: 50%">Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value['name'] }}</td>
                        <td>{!! Illuminate\Support\Str::limit($value['description'] == null ? "---" : $value['description'],200) !!} </td>
                        <td style="width: 17%">
{{--                            <a href="#" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"> View</i></a>--}}
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#View_Role_Modal" data-target-id="{{$value->id}}">
                                <i class="fa fa-eye" aria-hidden="true"> View</i>
                            </button>
                            <a href="{{ route('role.edit',$value->id) }}" class="btn btn-info"><i class="fas fa-pen-nib" aria-hidden="true"> Edit</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@stop
@push('customJs')
    <script>
        $(document).ready(function () {
            $("#Add_Role_form").validate({
                // Specified validation rules
                rules: {
                    name: {
                        required: true,
                        minlength: 4,
                        remote: {
                            url: "{{route('role.exist') }}",
                            type: 'GET',
                            data: {
                                email: function () {
                                    return $('#name').val();
                                }
                            }

                        }
                    },
                },
                messages: {
                    name: {
                        required: "Name field is required",
                        minlength: "Name should be at least 4 characters",
                        remote: "Email address has already taken."
                    },
                },

            });
        });
        $(document).ready(function () {
            $('#Add_Role_form').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '{{ route('role.store.ajax') }}',
                    data: $('#Add_Role_form').serialize() + "&_token=" + "{{csrf_token()}}",
                    success: function (response) {
                        $('#Add_Role_Modal').modal('hide');
                        location.reload();
                    },
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#View_Role_Modal").on("show.bs.modal",function (e) {
                let id = $(e.relatedTarget).data('target-id');
                $.get("http://localhost/RolePermission/public/role/" + id,function (data) {
                    var html = "";
                    html += '<h6>Name: ' + data.name + '</h6>'
                         + "<h6>Description:</h6><p>" +  data.description  + "</p>"
                    $("#View_Role_Modal_Body").html(html);
                });
            });
        });
    </script>
    <script>
        $(function () {
            $('.textarea').summernote()
        })
    </script>
@endpush

