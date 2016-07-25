@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 7)
@extends('backend.master')

@section('content-header')
<section class="content-header">
                <h1><i class="livicon" data-name="flag" data-size="30" data-c="#418BCA" data-hc="#01BC8C" data-loop="true"></i>
               تأكيد حذف صفحة</h1>
              <ol class="breadcrumb">
                    <li><a href="/admin/pages"><i class="fa fa-tachometer"></i>لوحة التحكم</a></li>
                    <li class="active"><i class="fa fa-flag-o"></i>تأكيد حذف صفحة</li>
                </ol>   
</section>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="panel panel-primary">
				<div class="panel-heading">
           			<h3 class="panel-title"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>حذف صفحة</h3>
                </div>

				<div class="panel-body">
                    <div class="alert alert-warning">
                        هل أنت متأكد انك تريد حذف <strong>{{ $page->title }} ؟</strong>
                    </div>
                    {!! Form::open(['action' => ['PagesController@destroy', $page->id], 'method' =>'DELETE']) !!}

                    {!! Form::submit('حذف', array('class'=>'btn btn-danger')) !!}

                    <a class="btn btn-primary" href="/admin/pages">إلغاء</a>

                    {!! Form::close()!!}
                </div>
        </div>
    </div>                          
</div>
@endif
                        @if ($view->status == 2 && $view->permission == 7)
            @section('content')
                <p style="margin-right: 380px;font-size: large;color: rgb(224, 109, 109);"><i class="fa fa-fw fa-minus-square"></i>غير مسموح لك بالدخول لهذه الصفحة</p>
            @endsection
        @endif
    @endforeach
@endif
@endsection
@stop