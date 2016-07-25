@extends('backend.master')

@section('header')
<link href="{{ asset('assets/backend/vendors/nestable_files/jquery.nestable.css') }}" rel="stylesheet" />
@endsection

@section('content-header')
<section class="content-header">
    <h1><i class="livicon" data-name="list" data-size="25" data-c="#418BCA" data-hc="#01BC8C" data-loop="true"></i>{{ trans('backend.list_links') }}</h1>
    <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-tachometer"></i> {{ trans('backend.dashboard') }}</a></li>
            <li class="active"> {{ trans('backend.list_links') }}</li>
    </ol>   
</section>
@endsection

@section('content')
<div class="row">

    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="livicon" data-name="link" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                     {{ trans('backend.menu') }} {{ $menu->name }} ( {{ trans('backend.links') }} )
                </h3>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div style="margin-bottom: 10px !important;" id="nestable_list_menu">
                            <button type="button" class="btn btn-success" data-action="collapse-all">{{ trans('backend.collapse_all') }}</button>
                            <button type="button" class="btn btn-warning" data-action="expand-all">{{ trans('backend.expand_all') }}</button>
                            {{-- <a href="/admin/menus/links/create" class="btn btn-primary"> Add Link</a> --}}
                        </div>
                    </div>
                </div>
                @if($menu->parents)
                <div class="dd" id="nestable_list_1">
                    <ol class="dd-list">
                        @foreach($links as $link)
                        @if($link->parent == '0')
                        <li class="dd-item dd3-item" data-id="{{ $link->id }}">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">
                                <a href="{{ $link->link }}"> {{ $link->title }}</a>
                                <span class="pull-right">
                                  <a href="{{action('MenusController@edit_link', [$link->menu_id, $link->id])}}"><i class="fa fa-edit"></i> {{ trans('backend.edit') }}</a>
                                  <a href="{{action('MenusController@delete_link', [$link->menu_id, $link->id])}}"><i class="fa fa-trash-o"></i> {{ trans('backend.delete') }}</a>
                                </span>
                            </div>
                            {{-- level 1 --}}
                            @if($link->has_children == '1')
                            <ol class="dd-list">
                                @foreach($menu->childrens as $link_1)
                                @if($link_1->parent == $link->id)
                                <li class="dd-item dd3-item" data-id="{{ $link_1->id }}">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">
                                        <a href="{{ $link_1->link }}"> {{ $link_1->title }}</a>
                                        <span class="pull-right">
                                          <a href="{{action('MenusController@edit_link', [$link_1->menu_id, $link_1->id])}}"><i class="fa fa-edit"></i> {{ trans('backend.edit') }}</a>
                                          <a href="{{action('MenusController@delete_link', [$link_1->menu_id, $link_1->id])}}"><i class="fa fa-trash-o"></i> {{ trans('backend.delete') }}</a>
                                        </span>
                                    </div>
                                        {{-- level 2 --}}
                                        @if($link_1->has_children == '1')
                                        <ol class="dd-list">
                                            @foreach($menu->childrens as $link_2)
                                            @if($link_2->parent == $link_1->id)
                                            <li class="dd-item dd3-item" data-id="{{ $link_2->id }}">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content">
                                                    <a href="{{ $link_2->link }}">{{ $link_2->title }}</a>
                                                    <span class="pull-right">
                                                      <a href="{{action('MenusController@edit_link', [$link_2->menu_id, $link_2->id])}}"><i class="fa fa-edit"></i> {{ trans('backend.edit') }}</a>
                                                      <a href="{{action('MenusController@delete_link', [$link_2->menu_id, $link_2->id])}}"><i class="fa fa-trash-o"></i> {{ trans('backend.delete') }}</a>
                                                    </span>
                                                </div>
                                                {{-- level 3 --}}
                                                @if($link_2->has_children == '1')
                                                    <ol class="dd-list">
                                                        @foreach($menu->childrens as $link_3)
                                                        @if($link_3->parent == $link_2->id)
                                                        <li class="dd-item dd3-item" data-id="{{ $link_3->id }}">
                                                            <div class="dd-handle dd3-handle"></div>
                                                            <div class="dd3-content">
                                                                <a href="{{ $link_3->link }}">{{ $link_3->title }}</a>
                                                                <span class="pull-right">
                                                                  <a href="{{action('MenusController@edit_link', [$link_3->menu_id, $link_3->id])}}"><i class="fa fa-edit"></i> {{ trans('backend.edit') }}</a>
                                                                  <a href="{{action('MenusController@delete_link', [$link_3->menu_id, $link_3->id])}}"><i class="fa fa-trash-o"></i> {{ trans('backend.delete') }}</a>
                                                                </span>
                                                            </div>
                                                                {{-- level 4 --}}
                                                                @if($link_3->has_children == '1')
                                                                <ol class="dd-list">
                                                                    @foreach($menu->childrens as $link_4)
                                                                    @if($link_4->parent == $link_3->id)
                                                                    <li class="dd-item dd3-item" data-id="{{ $link_4->id }}">
                                                                        <div class="dd-handle dd3-handle"></div>
                                                                        <div class="dd3-content">
                                                                            <a href="{{ $link_4->link }}">{{ $link_4->title }}</a>
                                                                            <span class="pull-right">
                                                                              <a href="{{action('MenusController@edit_link', [$link_4->menu_id, $link_4->id])}}"><i class="fa fa-edit"></i> {{ trans('backend.edit') }}</a>
                                                                              <a href="{{action('MenusController@delete_link', [$link_4->menu_id, $link_4->id])}}"><i class="fa fa-trash-o"></i> {{ trans('backend.delete') }}</a>
                                                                            </span>
                                                                        </div>
                                                                    </li>
                                                                    @endif
                                                                    @endforeach
                                                                </ol>
                                                                @endif
                                                        </li>
                                                        @endif
                                                        @endforeach
                                                    </ol>
                                                @endif
                                            </li>
                                            @endif
                                            @endforeach
                                        </ol>
                                        @endif
                                </li>
                                @endif
                                @endforeach
                            </ol>
                            @endif
                        </li>
                        @endif
                        @endforeach
                    </ol>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@if(Lang::getlocale() == 'ar')
<script src="{{ asset('assets/backend/vendors/nestable_files/jquery.nestable-rtl.min.js') }}"></script>
@else
<script src="{{ asset('assets/backend/vendors/nestable_files/jquery.nestable.min.js') }}"></script>
@endif
<script type="text/javascript">
$('#nestable_list_1').nestable('serialize');

var UINestable = function () {

    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target),
            output = list.data('output');
        // if (window.JSON) {
        //     alert(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
        // } else {
        //     alert('JSON browser support required for this demo.');
        // }
        var dataString = JSON.stringify(list.nestable('serialize'));

        $.ajax({
            type:'post',
            data:dataString,
            url:'{{ action('MenusController@save', $menu->id) }}?_token={{ csrf_token() }}&data='+dataString+'',
            success:function(data) {
              //alert(data);
            }
          });
            
    };
        
    return {
        //main function to initiate the module
        init: function () {

            // activate Nestable for list 1
            $('#nestable_list_1').nestable({
                group: 1
            })
                .on('change', updateOutput);

            // output initial serialised data
            updateOutput($('#nestable_list_1').data('output', $('#nestable_list_1_output')));

            $('#nestable_list_menu').on('click', function (e) {
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });

            $('#nestable_list_3').nestable();
        }

    };

}(); 
</script>
<script>
jQuery(document).ready(function() {
    UINestable.init();
});
</script>
@endsection