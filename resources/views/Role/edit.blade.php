@extends('partials.app')
@section('title','Role')
@section('title-card-h1','Role')
@section('title-card-small','Edit')
@section('timelineBar')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                    class="nav-icon fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Role</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>Update existing Role</h3>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('role.update',$data['id']) }}">
                <div class="row">
                    @method('PUT')
                    @csrf
                    <div class="form-group col-sm-12">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-industry"></i></span>
                            </div>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               placeholder="Role Name" name="name" value="{{ $data['name'] }}">
                        </div>
                        @error('name')
                        <div class="text-danger text-bold">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="description">Description</label>
                        <textarea class="form-control textarea" name="description" id="description"
                                  placeholder="Role description goes here..."
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $data['description'] }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('role.index') }}" class="btn btn-dark">Back to List</a>
            </form>
        </div>
    </div>

    <script>
        $(function () {
            $('.textarea').summernote();
            // $("#manage_Roles_sidebar").addClass('active');
        })
    </script>
@stop
