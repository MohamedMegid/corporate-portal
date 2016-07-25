@inject('Language', 'App\Http\Controllers\LanguageController') 
@extends('backend.master')
@section('header')

<link href="{{ asset('assets/backend/vendors/timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/backend/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen" />
@endsection
@section('content-header')
<section class="content-header">
    <h1><i class="livicon" data-name="list" data-size="25" data-c="#418BCA" data-hc="#01BC8C" data-loop="true"></i>{{ trans('backend.create') }} {{ trans('backend.events') }}</h1>
    <ol class="breadcrumb">
      <li><a href="/{{ Lang::getlocale() }}/admin"><i class="fa fa-tachometer"></i> {{ trans('backend.dashboard') }}</a></li>
      <li><a href="/{{ Lang::getlocale() }}/admin/events"> {{ trans('backend.list_events') }}</a></li>
      <li class="active"> {{ trans('backend.create') }} {{ trans('backend.events') }}</li>
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
               <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> {{ trans('backend.create') }} {{ trans('backend.events') }}</h3>
            </div>
            <div class="panel-body">
                <form action="{{ action('EventsController@store') }}" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-9">
                        @if($Language->all()->count())
                            @foreach($Language->all() as $lang)
                            <div id="group-{{$lang->code}}">
                                <div class="form-group">
                                    <label for="title">{{ trans('backend.title') }} @if($Language->all()->count() > '1') ( {{ $lang->name }} ) @endif</label>
                                    <input type="text" class="form-control" name="title_{{$lang->code}}" value="{{ old('title_'.$lang->code.'') }}" placeholder="{{ trans('backend.title') }} @if($Language->all()->count() > '1') {{ $lang->name }} @endif">
                                </div>

                                <div class="form-group">
                                    <label for="summary">{{ trans('backend.summary') }} @if($Language->all()->count() > '1') ( {{ $lang->name }} ) @endif</label>
                                    <textarea name="summary_{{$lang->code}}" id="input" class="form-control" rows="5">{{ old('summary_'.$lang->code.'') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="body">{{ trans('backend.body') }} @if($Language->all()->count() > '1') ( {{ $lang->name }} ) @endif</label>
                                    <textarea name="body_{{$lang->code}}" id="input" class="form-control" rows="5">{{ old('body_'.$lang->code.'') }}</textarea>
                                </div>
                            </div>
                            @endforeach
                        @endif
                            <div class="form-group">
                                <label>{{ trans('backend.Appointment') }}</label>
                                 <div class="input-group date form_datetime-1" data-date="{{ date('Y-m-d') }}" data-date-format="dd mm yyyy" data-link-field="dtp_input1">
                                   <input size="16" type="text" value="@if (!empty($_GET['event_date'])){{$_GET['event_date']}}@endif" readonly class="form-control" name="event_date">
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
                                <label><input name="published" type="checkbox" value="1" class="minimal-blue" @if(old('published') == 1) checked @endif> {{ trans('backend.published') }}</label>
                            </div>
                            <div class="checkbox">
                                <label><input name="back" type="checkbox" value="1" class="minimal-blue" @if(old('back') == 1) checked @endif> {{ trans('backend.add_new_after_save') }}</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">{{ trans('backend.save') }}</button>
                    </div>
                </form>
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

<script src="{{ asset('assets/backend/vendors/timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/vendors/datetimepicker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
<script type="text/javascript" src="{{ asset('assets/backend/vendors/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js') }}" charset="UTF-8"></script>
<script src="{{ asset('assets/backend/js/pages/pickers.js') }}"></script>

@endsection