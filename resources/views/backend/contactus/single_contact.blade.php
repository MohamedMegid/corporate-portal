@extends('backend.master')
@section('content-header')
<!-- Main content -->
<ol class="breadcrumb">
    <li>
        <a href="/admin/dashboard">
            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
            الرئيسية
        </a>
    </li>
    <li>
        <a href="/admin/contact-us/contacts">تواصل معنا</a>
    </li>
    <li class="active">بيانات الرسالة</li>
</ol>
@endsection
@section('content')

<div class="CSSTableGenerator" >
                        @if (!empty($contact))
                <table class="table table-bordered">
                        <tr class="active">
                            <td>
                                الاسم
                            </td>
                            <td>
                                رقم الجوال
                            </td>
                            <td>
                                البريد الالكتروني
                            </td>
                            <td>
                                العنوان
                            </td>
                        </tr>


                            <tr class="success">
                                <td>
                                    {{ $contact->name }}
                                </td>
                                <td>
                                    {{ $contact->mobile }}
                                </td>
                                <td>
                                    {{ $contact->mail }}
                                </td>
                                <td>
                                    {{ $contact->address }}
                                </td>
                            </tr>
                        @endif
                                            
                </table>

            </div>
            @if (!empty($contact))
            <div class="form-group">
                نص رسالة العميل
                <textarea name="client_message" class="form-control hide_component">{{ $contact->message }}</textarea>
            </div>
            @endif
            @if ($reply->count())
                @foreach ($reply as $index)
                    <div class="form-group">
                        نص رسالة الرد
                        <textarea name="admin_message" class="form-control hide_component">{{ $index->reply_message }}</textarea>
                    </div>
                @endforeach
            @else
            {!! Form::open(array('method' => 'post')) !!}

            <div class="form-group">
                {!! Form::label('نص رسالة الرد') !!}
                {!! Form::textarea('reply_message', null, 
                    array('class'=>'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('ارسل', 
                  array('class'=>'btn btn-primary')) !!}
            </div>

            {!! Form::close() !!}
            @endif
@endsection
@section('script')
    <script type="text/javascript">
        $('.form-control.hide_component').prop('disabled', true);
        $('.form-control.hide_component').css("background-color", "#dff0d8");
    </script>
@endsection
@stop