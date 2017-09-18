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
    <h4 class="page-title">Admins</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Admin Table </div>
                    <div class="tools">
                        <a href="{{route('admins.create')}}">
                            <button type="button" class="btn btn-primary">Add Admin</button>

                        </a>
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>

                                    </th>
                                    <th>

                                    </th>
                                    <th class="hidden-xs">
                                        <i class="fa fa-user"></i> Name
                                    </th>
                                    <th>
                                        <i class="fa fa-briefcase"></i> Job Title
                                    </th>
                                    <th>
                                        <i class="fa fa-phone"></i> Phone
                                    </th>
                                    <th>
                                        <i class="fa fa-mail"></i> Mail
                                    </th>
                                    <th>Social</th>
                                    <th>Roles</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td class="highlight">
                                        <div class="success"></div>

                                    </td>
                                    <td>
                                        <img src="{{$admin->image_url}}" alt="contact-img" title="contact-img" class="img-circle thumb-sm" />
                                    </td>
                                    <td >
                                        <a href="{{route('admins.show',$admin->id)}}"> {{$admin->name}}  </a>
                                    </td>
                                    <td>
                                        {{$admin->job_title}}
                                    </td>
                                    <td>
                                        {{$admin->phone}}
                                    </td>
                                    <td>
                                        {{$admin->email}}
                                    </td>
                                    <td>
                                        <a href="javascript:;" data-original-title="facebook" class="facebook"> </a>
                                        <a href="javascript:;" data-original-title="Goole Plus" class="googleplus"> </a>
                                        <a href="javascript:;" data-original-title="linkedin" class="linkedin"> </a>
                                        <a href="javascript:;" data-original-title="twitter" class="twitter"> </a>

                                    </td>

                                    <td class="text-center">
                                        <a href="{{route('admin.role',$admin->id)}}" title="Add new Role" class=><i class="fa fa-plus"></i></a>
                                        <a href="{{route('admin.view.role',$admin->id)}}" title="View Roles" class=><i class="fa fa-list"></i></a>
                                    </td>

                                    <td>
                                        <a href="{{route ('admins.edit',$admin->id)}}" class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> Edit </a>

                                        {!! Form::open(['route' => ['admins.destroy', $admin->id ], 'method' => 'DELETE', 'style'=>'display: inline;']) !!}
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
        <div class="text-center">
            {!! $admins->links() !!}
        </div>
        <div class="text-center">
            <strong>Page : {{ $admins->currentPage() }} of {{ $admins->lastPage() }}</strong>
        </div>

    </div>
@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}