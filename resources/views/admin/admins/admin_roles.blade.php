@extends('admin.layout')

@section('title', 'Dashboard')

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home','Home')
@section('page_title','Dashboard')


{{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_title','Dashboard')

@section('description','Statistics, chart , and all users activities on your website')

{{-- end page title --}}


@section('content')
    <h4 class="page-title">Roles</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Roles Table </div>

                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th class="hidden-xs">
                                    <i class="fa fa-user"></i> Name
                                </th>
                                <th>Display name</th>
                                <th>Description</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admin->roles as $role)
                                <tr>
                                    <td class="highlight">
                                        {{$role->name}}
                                    </td>

                                    <td class="highlight">
                                        {{$role->display_name}}
                                    </td>
                                    <td class="highlight">
                                        {{$role->description}}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['role.destroyRelation',$admin->id, $role->id  ], 'method' => 'POST','style'=>'display: inline;']) !!}
                                        <button class="btn btn-outline btn-circle dark btn-sm black">
                                            <i class="fa fa-trash-o"></i> Delete </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}