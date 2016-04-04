@extends('template')

@section('header')
    @include('admin.header')
@stop

@section('content')
    <div class="ui relaxed padded grid">
        <div class="ui doubling two column row">
            <div class="column">
                <h2 class="ui header">
                    <div class="content"><i class="dashboard icon"></i>Dashboard</div>
                </h2>
                <div class="ui divider"></div>

                <table class="ui table striped unstackable small">
                    <thead>
                    <tr>
                        <th class="one wide"></th>
                        <th class="three wide">Assigned To</th>
                        <th class="six wide">Patient Name</th>
                        <th class="three wide">MRN</th>
                        <th class="one wide">Gender</th>
                        <th class="one wide">Age</th>
                        <th class="five wide">Disposition</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($all_records as $record)
                        <tr>
                            <td>{{ ((($all_records->currentPage() - 1) * $all_records->perPage()) + ($ctr++) + 1) }}</td>
                            <td>{{ $record->user->name }}</td>
                            <td><a style="font-weight: bold" href="{{ route('admin_demographics', $record->id) }}">{{ $record->name }}</a></td>
                            <td>{{ $record->mrn }}</td>
                            <td>{{ $record->gender }}</td>
                            <td>{{ $record->age }}</td>
                            <td>{{ isset($record->getLastDisposition()->disposition_id)?$record->getLastDisposition()->disposition->name:"" }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @include('util.admin_paginator', ['paginator' => $all_records])
            </div>

            <div class="column">
                <div class="row">
                    <h2 class="ui header">
                        <div class="content">
                            Callbacks
                        </div>
                    </h2>

                    <div class="ui divider"></div>

                    <table class="ui striped table unstackable small">
                        <thead>
                        <tr><th colspan="5">
                                History
                            </th>
                        </tr></thead>
                        <tbody>
                        @foreach($callbacks as $callback)
                            <tr>
                                <td>{{ $callback->user->name }}</td>
                                <td>{{ $record->lists->name }}</td>
                                <td><a style="font-weight: bold" href="{{ route('admin_demographics', $callback->record->id) }}">{{ $callback->record->name }}</a></td>
                                <td>{{ $callback->schedule->diffForHumans() }}</td>
                                <td>{{ $callback->notes }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--<button class="ui primary button" id="callback_modal">
                        Add New Callback
                    </button>--}}
                </div>
                <br>
                <div class="row">
                    <h2 class="ui header">
                        <div class="content">
                            Recent Records
                        </div>
                    </h2>

                    <div class="ui divider"></div>

                    <table class="ui striped table unstackable small">
                        <thead>
                        <tr><th colspan="5">
                                History
                            </th>
                        </tr></thead>
                        <tbody>
                        @foreach(\App\Record::where('updated_at', '!=' ,'0000-00-00 00:00:00')->orderBy('records.updated_at', 'DESC')->take(5)->get() as $record)
                            <tr>
                                <td><a style="font-weight: bold" href="{{ route('admin_demographics', $record->id) }}">{{ $record->name }}</a></td>
                                <td>{{ $record->lists->name }}</td>
                                <td>{{ $record->user->name }}</td>
                                <td>{{ isset($record->getLastDisposition()->disposition_id)?$record->getLastDisposition()->disposition->name:"" }}</td>
                                <td>{{ $record->updated_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--<button class="ui primary button" id="callback_modal">
                        Add New Callback
                    </button>--}}
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $('#search_patient').click(function(){
            $(this).val('');
        });

        $.fn.search.settings.templates = {
            category: function(response) {
                $('.results').empty();
                $.each(response.results, function (index, item) {
                    $.each(item.results, function (indx, itm) {
                        $('.results').append(
                                '<a class="result" href="' + itm.url + '">' +
                                '<div class="content">' +
                                '<div class="title">' + itm.title + '</div>' +
                                '<div class="description">' + itm.description + '</div>'+
                                '</div>'+
                                '</a>'
                        );
                    })
                })
            },
        }

        $('.ui.search')
            .search({
                debug: true,
                type: 'category',
                minCharacters: 2,
                cache: false,
                apiSettings   : {
                    url: '{{ URL::to('/') }}/record_query/{query}',
                    onResponse: function(patientSource) {
                        var
                                response = {
                                    results : {}
                                };

                        if(patientSource.items === undefined) {
                            // no results

                            return response;
                        }
                        // translate GitHub API response to work with search
                        $.each(patientSource.items, function(index, item) {
                            var language = item.language || 'Unknown',
                                    maxResults = 8
                                    ;

                            // create new language category
                            if(response.results[language] === undefined) {
                                response.results[language] = {
                                    name    : language,
                                    results : []
                                };
                            }

                            // add result to category
                            response.results[language].results.push({
                                title           : item.title,
                                description     : item.description,
                                url             : item.html_url
                            });
                        });


                        return response;
                    },
                }
            });


    </script>
@stop