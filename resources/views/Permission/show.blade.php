@extends('partials.app')
@section('title','Show Permission')
@section('title-card-h1','Permission')
@section('title-card-small','Show')
@section('timelineBar')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                    class="nav-icon fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permission</a></li>
        <li class="breadcrumb-item active">Show</li>
    </ol>
@stop
@push('customCss')
    <script type="text/javascript" src="{{ asset('plugins/checktree/checktree.js') }}"></script>
    <style>
        ul {
            list-style-type: none;
            margin: 3px;
        }

        ul.checktree li:before {
            height: 1em;
            width: 12px;
            border-bottom: 1px solid black;
            content: "";
            display: inline-block;
            top: -0.3em;
            border-left: none;
        }

        ul.checktree li { border-left: 1px solid black; }

        ul.checktree li:last-child:before { border-left: 1px solid black; }

        ul.checktree li:last-child { border-left: none; }
    </style>
@endpush
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h5><strong>Permission Details Information</strong></h5>
            </div>
        </div>
        <div class="card-body">
            <ul class="checktree">
                <li>
                    <input id="administration" type="checkbox" /><label for="administration">Administration</label>
                    <ul>
                        <li>
                            <input id="president" type="checkbox" /><label for="president">President</label>
                            <ul>
                                <li>
                                    <input id="manager1" type="checkbox" /><label for="manager1">Manager 1</label>
                                    <ul>
                                        <li><input id="assistantmanager1" type="checkbox" /><label for="assistantmanager1">Assistant Manager 1</label></li>
                                        <li>
                                            <input id="assistantmanager2" type="checkbox" /><label for="assistantmanager2">Assistant Manager 2</label>
                                            <ul>
                                                <li><input id="assistantmanager1" type="checkbox" /><label for="assistantmanager1">Junior Assistant Manager 1</label></li>
                                                <li><input id="assistantmanager2" type="checkbox" /><label for="assistantmanager2">Junior Assistant Manager 2</label></li>
                                                <li><input id="assistantmanager3" type="checkbox" /><label for="assistantmanager3">Junior Assistant Manager 3</label></li>
                                            </ul>
                                        </li>
                                        <li><input id="assistantmanager3" type="checkbox" /><label for="assistantmanager3">Assistant Manager 3</label></li>
                                    </ul>
                                </li>
                                <li><input id="manager2" type="checkbox" /><label for="manager2">Manager 2</label>
                                    <ul>
                                        <li><input id="assistantmanager1" type="checkbox" /><label for="assistantmanager1">Assistant Manager 1</label></li>
                                        <li><input id="assistantmanager2" type="checkbox" /><label for="assistantmanager2">Assistant Manager 2</label></li>
                                        <li><input id="assistantmanager3" type="checkbox" /><label for="assistantmanager3">Assistant Manager 3</label></li>
                                    </ul>
                                </li>
                                <li><input id="manager3" type="checkbox" /><label for="manager3">Manager 3</label></li>
                            </ul>
                        </li>
                        <li>
                            <input id="vicepresident" type="checkbox" /><label for="vicepresident">Vice President</label>
                            <ul>
                                <li><input id="manager4" type="checkbox" /><label for="manager4">Manager 4</label></li>
                                <li><input id="manager5" type="checkbox" /><label for="manager5">Manager 5</label></li>
                                <li><input id="manager6" type="checkbox" /><label for="manager6">Manager 6</label></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <input id="administration2" type="checkbox" /><label for="administration2">Administration2</label>
                    <ul>
                        <li>
                            <input id="president" type="checkbox" /><label for="president">President</label>
                            <ul>
                                <li>
                                    <input id="manager1" type="checkbox" /><label for="manager1">Manager 1</label>
                                    <ul>
                                        <li><input id="assistantmanager1" type="checkbox" /><label for="assistantmanager1">Assistant Manager 1</label></li>
                                        <li><input id="assistantmanager2" type="checkbox" /><label for="assistantmanager2">Assistant Manager 2</label></li>
                                        <li><input id="assistantmanager3" type="checkbox" /><label for="assistantmanager3">Assistant Manager 3</label></li>
                                    </ul>
                                </li>
                                <li><input id="manager2" type="checkbox" /><label for="manager2">Manager 2</label>
                                    <ul>
                                        <li><input id="assistantmanager1" type="checkbox" /><label for="assistantmanager1">Assistant Manager 1</label></li>
                                        <li><input id="assistantmanager2" type="checkbox" /><label for="assistantmanager2">Assistant Manager 2</label></li>
                                        <li><input id="assistantmanager3" type="checkbox" /><label for="assistantmanager3">Assistant Manager 3</label></li>
                                    </ul>
                                </li>
                                <li><input id="manager3" type="checkbox" /><label for="manager3">Manager 3</label></li>
                            </ul>
                        </li>
                        <li>
                            <input id="vicepresident" type="checkbox" /><label for="vicepresident">Vice President</label>
                            <ul>
                                <li><input id="manager4" type="checkbox" /><label for="manager4">Manager 4</label></li>
                                <li><input id="manager5" type="checkbox" /><label for="manager5">Manager 5</label></li>
                                <li><input id="manager6" type="checkbox" /><label for="manager6">Manager 6</label></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
@stop
@push('customJs')
    <script >
        $(function(){
            $("ul.checktree").checktree();
        });
    </script>
    @endpush
