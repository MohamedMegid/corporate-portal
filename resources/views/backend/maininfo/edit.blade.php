@inject('Language', 'App\Http\Controllers\LanguageController') 
@extends('backend.master')
@section('header')
    <link href="{{ asset('assets/backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    <style>    
        img.resizeme {
            height: 100px;
            width: 150px;

        }
        .break_coll{
            display: none;
        }
        .comment-format{
            padding: 3px;
            background-color: #f5f5f5;
            color: black;            
            font-size: 12px;
        }
    </style>
@endsection
@section('content-header')
<section class="content-header">
    <h1><i class="livicon" data-name="list" data-size="25" data-c="#418BCA" data-hc="#01BC8C" data-loop="true"></i>{{ trans('backend.edit') }} {{ trans('backend.Main Info') }}</h1>
    <ol class="breadcrumb">
      <li><a href="/{{ Lang::getlocale() }}/admin"> {{ trans('backend.dashboard') }}</a></li>
      <li class="active"> {{ trans('backend.edit') }} {{ trans('backend.Main Info') }}</li>
    </ol>   
</section>
@endsection

@section('content')
<div class="row">
     <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                        <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>{{ trans('backend.edit') }} {{ trans('backend.Main Info') }}</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ action('MainInfoController@update', [$info->id]) }}" method="POST" role="form" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-md-9">
                            @if($Language->all()->count())
                                @foreach($Language->all() as $lang)
                                <div id="group-{{$lang->code}}">
                                <div class="form-group">
                                    <label for="name">{{ trans('backend.Site Name') }} @if($Language->all()->count() > '1') ( {{ $lang->name }} ) @endif</label>
                                    <input type="text" class="form-control" name="name_{{$lang->code}}" value="@if(isset($trans[$lang->code]['name'])){{ $trans[$lang->code]['name'] }}@else{{ old('name_'.$lang->code.'') }}@endif" placeholder="{{ trans('backend.name') }} @if($Language->all()->count() > '1') {{ $lang->name }} @endif">
                                </div>

                                <div class="form-group">
                                    <label for="name">{{ trans('backend.Keywords') }} @if($Language->all()->count() > '1') ( {{ $lang->name }} ) @endif</label>
                                    <input type="text" class="form-control" name="keywords_{{$lang->code}}" value="@if(isset($trans[$lang->code]['keywords'])){{ $trans[$lang->code]['keywords'] }}@else{{ old('keywords_'.$lang->code.'') }}@endif" placeholder="{{ trans('backend.keywords') }} @if($Language->all()->count() > '1') {{ $lang->name }} @endif">
                                </div>

                                <div class="form-group">
                                    <label for="description">{{ trans('backend.description') }} @if($Language->all()->count() > '1') ( {{ $lang->name }} ) @endif</label>
                                    <textarea name="description_{{$lang->code}}" id="input" class="form-control" rows="5">@if(isset($trans[$lang->code]['description'])){{ $trans[$lang->code]['description'] }}@else{{ old('description_'.$lang->code.'') }}@endif</textarea>
                                </div>

                            </div>
                                @endforeach
                            @endif
                            </div>
                            <div class="col-md-3 sidbare">
                                <!-- Language field -->
                                @include('backend.language.field')
                                <!-- End Language field -->
                                
                                <div class="form-group" style="">
                                    <label>{{trans('backend.logo')}}</label>
                                    <br>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        @if (!empty($info->logo) && $info->count())
                                            <img src="/img/maininfo/{{ $info->logo }}" alt="..." style="width: 100%; height: 100%;">
                                        @else
                                            <img data-src="holder.js/100%x100%">
                                        @endif
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                        <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">{{trans('backend.Choose Photo')}}</span>
                                                <span class="fileinput-exists">{{trans('backend.Change')}}</span>
                                                <input type="file" id="basic_photo" name="logo"  class="upload_photos" value="C:\wamp\www\laravel\wedding\public\img\uploaded/Desert.jpg"></span>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{trans('backend.delete')}}</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group" style="">
                                    <label>{{trans('backend.favicon')}}</label>
                                    <br>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        @if (!empty($info->favicon))
                                            <img src="/img/maininfo/{{ $info->favicon }}" alt="..." style="width: 100%; height: 100%;">
                                        @else
                                            <img data-src="holder.js/100%x100%">
                                        @endif
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                        <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">{{trans('backend.Choose Photo')}}</span>
                                                <span class="fileinput-exists">{{trans('backend.Change')}}</span>
                                                <input type="file" id="basic_photo" name="favicon"  class="upload_photos" value="C:\wamp\www\laravel\wedding\public\img\uploaded/Desert.jpg"></span>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{trans('backend.delete')}}</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">{{ trans('backend.update') }}</button>
                            </div>

                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<!--Language -->
@include('backend.language.scripts.scripts')
<!--end Language -->
<script src="{{ asset('assets/backend/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
@endsection