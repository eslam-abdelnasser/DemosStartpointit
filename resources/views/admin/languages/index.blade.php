@extends('admin.layout')

@section('title', 'show languages')

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home','Home')
@section('page_title','Show languages')


{{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_head','Languages')

@section('page_description','Show all website languages')

{{-- end page title --}}


@section('content')
    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Languages</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">View All languages <code>name</code> , <code>label</code> , <code class="highlighter-rouge">status</code>and  <code>Actions</code>.</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Language Name</th>
                                <th>Language label</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($languages))
                                @foreach($languages as $language)

                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{$language->name}}</td>
                                        <td>{{$language->label}}</td>
                                        <td>
                                            {!!  $language->status == '1' ? '<button type="button" class="btn btn-success btn-block">Active</button>' : '<button type="button" class="btn btn-danger btn-block">Inactive</button>' !!}

                                        </td>
                                        <td>
                                            <button type="button" class="btn mr-1 mb-1 btn-cyan btn-square btn-sm" onclick="Javascript:window.location.href ='{{route('languages.edit',['id'=> $language->id])}}';">Edit</button>
                                            {!! Form::open(['route'=>['languages.destroy',$language->id],'method'=>'DELETE','style'=>'display:inline-block','role'=>'form']) !!}
                                            <button type="submit" class="btn mr-1 mb-1 btn-danger btn-square btn-sm">Delete</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @else

                                <tr>

                                    <td class="text-center" colspan="5">
                                        No languages Added
                                    </td>

                                </tr>

                            @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bordered striped end -->

@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}