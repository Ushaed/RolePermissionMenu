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
@section('content')

    <p><a href="{{ route('role.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> Add Role</a></p>
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
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value['name'] }}</td>
                        <td>{!! $value['description'] == null ? "---" : $value['description'] !!}</td>
                        <td style="width: 17%"><a href=" "
                                                  class="btn btn-default"><i
                                    class="fa fa-eye" aria-hidden="true"></i></a>

                            <a href="" class="btn btn-info"><i
                                    class="fas fa-pen-nib" aria-hidden="true"></i></a>
{{--                            <form action="{{ route('Roles.delete', $value['id']) }}" method="post"--}}
{{--                                  id="form-in-index-page-for-delete"--}}
{{--                                  onsubmit=" return confirm('Are you sure?')">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button type="submit" class="btn btn-danger"><i--}}
{{--                                        class="fa fa-trash-alt" aria-hidden="true"></i></button>--}}
{{--                            </form>--}}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

