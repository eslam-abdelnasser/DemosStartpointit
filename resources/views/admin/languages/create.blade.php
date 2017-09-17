@extends('admin.layout')

@section('title', 'Languages')

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home','Home')
@section('page_title','Languages')


{{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_head','Languages')

@section('page_description','Add Languages that should be in your website')

{{-- end page title --}}


@section('content')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-bubble font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">أضافة لغة جديدة</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    {!! Form::open(['route'=>['languages.store'],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-body">
                        <div class="form-group">
                            <label>اللغة</label>
                            <input type="text" class="form-control" value="{{old('name')}}" placeholder="اللغة" name="name">
                        </div>

                        <div class="form-group">
                            <label>علامة مميزة للغة</label>
                            <div class="input-group margin-top-10">
                                <span class="input-group-addon">
                                        <i class="fa fa-language"></i>
                                  </span>
                                <input type="text" class="form-control" placeholder="علامة مميزة لغة" value="{{old('label')}}" name="label">
                            </div>

                        </div>


                        <div class="form-group">
                            <label>الحالة</label>
                            <select class="form-control input-medium" name="status">
                                <option disabled> </option>
                                <option value="0" {{old('status') == 0 ? 'selected' : ''}}>عدم تنشيط اللغة</option>
                                <option value="1" {{old('status') == 1 ? 'selected' : ''}}>تنشيط  اللغة</option>

                            </select>
                        </div>


                    </div>
                    <div class="form-actions right">
                        <button type="button" class="btn default">الفاء</button>
                        <button type="submit" class="btn green">حفظ</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->


        </div>



    </div>

@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}