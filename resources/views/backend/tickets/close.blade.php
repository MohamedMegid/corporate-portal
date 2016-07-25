
@extends('backend.master')
 @section('content-header')
<section class="content-header">
    <h1><i class="livicon" data-name="phone" data-size="30" data-c="#418BCA" data-hc="#01BC8C" data-loop="true"></i>
        {{ trans('backend.tickets')}}</h1>
    <ol class="breadcrumb">
        <li><a href="/{{Lang::getlocale()}}/admin"><i class="fa fa-tachometer"></i> {{ trans('backend.dashboard')}}</a></li>
        <li><a href="/{{Lang::getlocale()}}/admin/tickets"> {{ trans('backend.list_tickets')}}</a></li>
        <li class="active"> {{ trans('backend.close')}}</li>
    </ol>   
</section>
@endsection
            <!--section ends-->
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" id="hidepanel1">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        {{trans('backend.Are you sure to close')}} {{$item->title}}
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="{{ action('TicketsController@close_ticket', $item->id) }}" method="POST" role="form">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                    <div class="form-group confirmation">
	                        <button type="submit" class="btn btn-primary">{{ trans('backend.close')}}</button>

	                    </div>
	                    <div class="form-group confirmation">
	                        <a href="/{{Lang::getlocale()}}/admin/tickets" style="font-size: 18px;">{{trans('backend.cancel')}}</a>
	                    </div>
                    </form>
                </div>
        </div>
    </div>
</div>
              
@endsection