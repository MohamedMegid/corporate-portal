@inject('Language', 'App\Http\Controllers\LanguageController') 
@extends('backend.master')
@section('header')
<!--media-->
<link href="{{ asset('assets/backend/vendors/modal/css/component.css') }}" rel="stylesheet" />
@endsection
@section('content-header')
<section class="content-header">
    <h1><i class="livicon" data-name="list" data-size="25" data-c="#418BCA" data-hc="#01BC8C" data-loop="true"></i>{{ trans('backend.delete') }} {{ trans('backend.link') }}</h1>
    <ol class="breadcrumb">
      <li><a href="/{{ Lang::getlocale() }}/admin"> {{ trans('backend.dashboard') }}</a></li>
      <li><a href="/{{ Lang::getlocale() }}/admin/menus"> {{ trans('backend.list_menus') }}</a></li>
      <li class="active"> {{ trans('backend.delete') }} {{ trans('backend.link') }}</li>
    </ol>   
</section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>{{ trans('backend.delete_confirm') }}: {{$link->title}}</h3>
                </div>

                <div class="panel-body">
                    <form action="{{ action('MenusController@destroy_link', [$link->menu_id, $link->id]) }}" method="POST" role="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">{{ trans('backend.delete') }}</button>
                                <a class="btn btn-primary" href="/{{ Lang::getlocale() }}/admin/menus/{{ $link->menu_id }}/links">{{ trans('backend.cancel') }}</a>
                            </div>
                         
                    </form>
                    
                </div>
        </div>
    </div>                          
</div>
@endsection
