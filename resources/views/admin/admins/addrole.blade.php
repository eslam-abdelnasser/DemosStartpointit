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
    <h4 class="page-title">ADMIN Roles</h4>

    {{Form::open(['route' => ['admin_role.store',$admin_id] , 'method' => 'post']) }}
    <div class="form-group">
        <div class="col-md-12">
            <div class="mt-checkbox-inline">
                @foreach($roles as $role)

                    <label class="mt-checkbox">
                        <input type="checkbox" id={{$role->id}} name="roles[]" value="{{$role->id}}"> {{$role->display_name}}
                        <span></span>
                    </label>
                @endforeach

            </div>
            <div class="form-actions">
                <button type="submit" class="btn blue">Submit</button>
                <button type="button" class="btn default">Cancel</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}