@inject('Language', 'App\Http\Controllers\LanguageController') 
@extends('backend.master')
@section('header')
<!--media-->
<link href="{{ asset('assets/backend/vendors/modal/css/component.css') }}" rel="stylesheet" />
@endsection
@section('content-header')
<section class="content-header">
    <h1><i class="livicon" data-name="list" data-size="25" data-c="#418BCA" data-hc="#01BC8C" data-loop="true"></i>{{ trans('backend.edit') }} {{ trans('backend.events') }}</h1>
    <ol class="breadcrumb">
      <li><a href="/{{ Lang::getlocale() }}/admin"> {{ trans('backend.dashboard') }}</a></li>
      <li><a href="/{{ Lang::getlocale() }}/admin/events"> {{ trans('backend.list_events') }}</a></li>
      <li class="active"> {{ trans('backend.edit') }} {{ trans('backend.events') }}</li>
    </ol>   
</section>
@endsection

@section('content')
<!-- Include Media model -->
@include('backend.media.model.model')
<!-- end include Media model -->
<div class="row">
     <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                        <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>{{ trans('backend.create') }} {{ trans('backend.events') }}</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ action('EventsController@update', [$events->id]) }}" method="POST" role="form">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-md-9">
                            @if($Language->all()->count())
                                @foreach($Language->all() as $lang)
                                <div id="group-{{$lang->code}}">
                                <div class="form-group">
                                    <label for="title">{{ trans('backend.title') }} @if($Language->all()->count() > '1') ( {{ $lang->name }} ) @endif</label>
                                    <input type="text" class="form-control" name="title_{{$lang->code}}" value="@if(isset($trans[$lang->code]['title'])){{ $trans[$lang->code]['title'] }}@else{{ old('title_'.$lang->code.'') }}@endif" placeholder="{{ trans('backend.title') }} @if($Language->all()->count() > '1') {{ $lang->name }} @endif">
                                </div>

                                <div class="form-group">
                                    <label for="summary">{{ trans('backend.summary') }} @if($Language->all()->count() > '1') ( {{ $lang->name }} ) @endif</label>
                                    <textarea name="summary_{{$lang->code}}" id="input" class="form-control" rows="5">@if(isset($trans[$lang->code]['summary'])){{ $trans[$lang->code]['summary'] }}@else{{ old('subject_'.$lang->code.'') }}@endif</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="body">{{ trans('backend.body') }} @if($Language->all()->count() > '1') ( {{ $lang->name }} ) @endif</label>
                                    <textarea name="body_{{$lang->code}}" id="input" class="form-control" rows="5">@if(isset($trans[$lang->code]['body'])){{ $trans[$lang->code]['body'] }}@else{{ old('body_'.$lang->code.'') }}@endif</textarea>
                                </div>
                            </div>
                                @endforeach
                            @endif
                                <div class="form-group">
                                    <label>{{ trans('backend.Appointment') }}</label>
                                     <div class="input-group date form_datetime-1" data-date="{{ date('Y-m-d') }}" data-date-format="dd mm yyyy" data-link-field="dtp_input1">
                                       <input size="16" type="text" value="{{$events->event_date}}" readonly class="form-control" name="event_date">
                                       <span class="input-group-addon">
                                       <span class="glyphicon glyphicon-th"></span>
                                       </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 sidbare">
                                <!-- Language field -->
                                @include('backend.language.field')
                                <!-- End Language field -->

                                <!-- Media main image -->
                                @include('backend.media.fields.main-image-field')
                                <!-- End Media main image -->
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input name="published" type="checkbox" value="1" class="minimal-blue" @if($events->published == '1' || old('published') == 1) checked @endif> {{ trans('backend.published') }}</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input name="back" type="checkbox" value="1" class="minimal-blue" @if(old('back') == 1) checked @endif> {{ trans('backend.back_after_update') }}</label>
                                    </div>
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

<!--Media -->
@include('backend.media.scripts.scripts')
<!--end media -->
@endsection