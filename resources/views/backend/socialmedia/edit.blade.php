@inject('Language', 'App\Http\Controllers\LanguageController') 
@extends('backend.master')
@section('header')
@endsection
@section('content-header')
<section class="content-header">
    <h1><i class="livicon" data-name="list" data-size="25" data-c="#418BCA" data-hc="#01BC8C" data-loop="true"></i>{{ trans('backend.edit') }} {{ trans('backend.Social Media') }}</h1>
    <ol class="breadcrumb">
      <li><a href="/{{ Lang::getlocale() }}/admin"> {{ trans('backend.dashboard') }}</a></li>
      <li class="active"> {{ trans('backend.edit') }} {{ trans('backend.Social Media') }}</li>
    </ol>   
</section>
@endsection

@section('content')
<div class="row">
     <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                        <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>{{ trans('backend.edit') }} {{ trans('backend.Social Media') }}</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ action('SocialMediaController@update', [$info->id]) }}" method="POST" role="form" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="facebook">{{ trans('backend.facebook') }}</label>
                                    <input type="text" class="form-control" name="facebook" value="@if(old('facebook')){{ old('facebook') }}@else{{$info->facebook}}@endif" placeholder="{{ trans('backend.facebook') }}">
                                </div>

                                <div class="form-group">
                                    <label for="twitter">{{ trans('backend.twitter') }}</label>
                                    <input type="text" class="form-control" name="twitter" value="@if(old('twitter')){{ old('twitter') }}@else{{$info->twitter}}@endif" placeholder="{{ trans('backend.twitter') }}">
                                </div>

                                <div class="form-group">
                                    <label for="gplus">{{ trans('backend.gplus') }}</label>
                                    <input type="text" class="form-control" name="gplus" value="@if(old('gplus')){{ old('gplus') }}@else{{$info->gplus}}@endif" placeholder="{{ trans('backend.gplus') }}">
                                </div>

                                <div class="form-group">
                                    <label for="linkedin">{{ trans('backend.linkedin') }}</label>
                                    <input type="text" class="form-control" name="linkedin" value="@if(old('linkedin')){{ old('linkedin') }}@else{{$info->linkedin}}@endif" placeholder="{{ trans('backend.linkedin') }}">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-primary">{{ trans('backend.update') }}</button>
                                </div>

                            </div>

                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection