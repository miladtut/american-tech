@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.content-pages.title')</h3>
    @can('content_page_create')
    <p>
        @if(false)
        <a href="{{ route('admin.content_pages.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        @endif
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered {{ count($content_pages) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>


                        <th>@lang('quickadmin.content-pages.fields.title')</th>
                        <th>@lang('quickadmin.content-pages.fields.page-text')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($content_pages) > 0)
                        @foreach ($content_pages as $content_page)
                            <tr data-entry-id="{{ $content_page->id }}">


                                <td field-key='title'>{{ $content_page->title }}</td>


                                <td field-key='page_text'>
                                    @php
                                    $text=strip_tags ($content_page->page_text);
                                    if(strlen($text)>200){
                                        echo substr($text,0,200) . ' ... ';
                 
                                     }else{
                                         echo $text;
                                     }
                                     @endphp

                                </td>

                            <td>

                                    @can('content_page_edit')
                                    <a href="{{ route('admin.content_pages.edit',[$content_page->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('content_page_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.content_pages.mass_destroy') }}';
        @endcan

    </script>
@endsection