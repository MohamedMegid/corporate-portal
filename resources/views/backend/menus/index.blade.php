
@extends('backend.master')
@section('content-header')
<section class="content-header">
    <h1><i class="livicon" data-name="list" data-size="25" data-c="#418BCA" data-hc="#01BC8C" data-loop="true"></i>{{ trans('backend.list_menus') }}</h1>
    <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-tachometer"></i> {{ trans('backend.dashboard') }}</a></li>
            <li class="active"> {{ trans('backend.list_menus') }}</li>
    </ol>   
</section>
@endsection

@section('content')
            
<div class="row">
    <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="responsive" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    {{ trans('backend.list_menus') }}
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div class="table-responsive">
                                 @if ($menus->count())
                                    <table class="table table-bordered">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>{{ trans('backend.menu_name') }}</th>
                                            <th>{{ trans('backend.operations') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td>
                                                {{ $menu->name }}
                                            </td>
                                            <td class="">
                                                <a href="{{action('MenusController@list_links', $menu->id)}}"><i class="fa fa-link"></i>{{ trans('backend.menu_links') }}</a>
                                                {{--<a href="{{action('PagesController@destroyconfirm', $menu->id)}}"><i class="fa fa-trash-o"></i> حذف</a>--}}
                                           </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                    </tbody>

                                </table>
                                <div> <i class="fa fa-folder-o"></i> {{ trans('backend.total') }} : {{$menus->count()}} {{ trans('backend.menu') }} </div>
                            </div>
                </div>
            </div>
        </div>
</div>
@endsection