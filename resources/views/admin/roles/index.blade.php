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
        <div class="col-md-8">
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

                                <th>Permissions</th>

                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td class="highlight">
                                      {{$role->name}}



                                    </td>

                                    <td class="highlight">
                                        {{$role->display_name}}

                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('role.permission',$role->id)}}" title="Add permissions" class=><i class="fa fa-plus"></i></a>
                                        <a href="{{route('role.view.permission',$role->id)}}" title="View permissions" class=><i class="fa fa-list"></i></a>
                                    </td>

                                    <td>
                                        <a href="{{route ('roles.edit',$role->id)}}" class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> Edit </a>

                                        {!! Form::open(['route' => ['roles.destroy', $role->id ], 'method' => 'DELETE','style'=>'display: inline;']) !!}
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
            <div class="text-center">
                {!! $roles->links() !!}
            </div>
            <div class="text-center">
                <strong>Page : {{ $roles->currentPage() }} of {{ $roles->lastPage() }}</strong>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Add Role</span>
                    </div>

                </div>
                <div class="portlet-body form">
                    {{Form::open(['route' => ['roles.store'] , 'method' => 'post']) }}
                    <div class="form-body">
                        <div class="form-group">
                            <label>Name</label>
                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                <input type="text" name="name" id="name" class="form-control input-circle-right" placeholder="Name"> </div>
                        </div>
                        <div class="form-group">
                            <label>Display name </label>
                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                <input type="text" name="display_name" id="display_name" class="form-control input-circle-right" placeholder="Display name"> </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                <input type="text" name="description" id="description" class="form-control input-circle-right" placeholder="Description"> </div>
                        </div>

                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn blue">Submit</button>
                    <button type="button" class="btn default">Cancel</button>
                </div>


                {!! Form::close() !!}

            </div>
        </div>

@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}