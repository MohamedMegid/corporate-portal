@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 7)
@inject('Language', 'App\Http\Controllers\LanguageController')
@extends('backend.master')
@section('header_styles')
 <link href="{{ asset('assets/backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.1.0.css') }}" />
@endsection
@section('content-header')
<section class="content-header">
                <h1><i class="livicon" data-name="flag" data-size="30" data-c="#418BCA" data-hc="#01BC8C" data-loop="true"></i>
                إدارة الصفحات</h1>
             <ol class="breadcrumb">
                    <li><a href="/{{ $Language->CurrentLang() }}/admin"><i class="fa fa-tachometer"></i> لوحة التحكم</a></li>
                    <li><a href="/{{ $Language->CurrentLang() }}/admin/pages"><i class="fa fa-list"></i> إستعراض الصفحات</a></li>
                    <li class="active"><i class="fa fa-edit"></i> تعديل صفحة</li>
              </ol>   
</section>
@endsection

@section('content')
<div class="row">
     <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                        <h3 class="panel-title"><i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>تعديل الصفحة</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ action('PagesController@update', $page->id) }}" method="POST" role="form">
                            <input type="hidden" name="_method" value="patch">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                            <div class="form-group">
                                <label for="title">العنوان</label>
                                <input type="text" class="form-control" name="title" value="@if(old('title')){{ old('title') }}@else{{$page->title}}@endif" placeholder="عنوان الصفحة">
                            </div>
                            <div class="form-group">
                                <label for="body">المحتوي</label>
                                <textarea name="body" id="input" class="form-control" rows="10">@if(old('body')){{ old('body') }}@else{{ $page->body }}@endif</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">تحديث</button>
                        </form>
                    </div>
                </div>
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