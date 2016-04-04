@extends('template')

@section('header')
    @include('util.header')
@stop

@section('content')
    <div class="ui padded grid">
        <div class="ui doubling stackable two column row">
            <div class="column">
                <h2 class="ui header">
                    <div class="content"><i class="dashboard icon"></i>Dashboard</div>
                </h2>
                <div class="ui divider"></div>
                    <a href="{{ route('/home') }}" class="ui button {{ Route::current()->getName()=="/home"?"primary":"" }}">Record List 1</a>
                    <a href="{{ route('record_list_2') }}" class="ui button {{ Route::current()->getName()=="record_list_2"?"primary":"" }}">Record List 2</a>
                    <div class="ui inverted grey segment">
                        <form action="{{ route('/home') }}" method="GET" style="margin: 0; !important">
                            <div class="ui inverted small form">
                                <div class="two fields">
                                    <div class="field">
                                        <label> Gender </label>
                                        <select class="ui dropdown" name="gender">
                                            <option value="">All</option>
                                            <option {{ request('gender') =='M' ? 'selected':'' }} value="M">Male</option>
                                            <option {{ request('gender') =='F' ? 'selected':'' }} value="F">Female</option>
                                        </select>
                                    </div>
                                    <div class="field">
                                        <label>Age</label>
                                        <div class="two fields">
                                            <div class="field">
                                                <input placeholder="from..." type="text" name="age_from" value="{{ request('age_from') }}">
                                            </div>
                                            <div class="field">
                                                <input placeholder="to..." type="text" name="age_to" value="{{ request('age_to') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="ui submit button">Filter</button>
                                <a href="{{ route('/home') }}" class="ui button">Clear Filter</a>
                            </div>
                        </form>
                    </div>
                    <table class="ui tablet unstackable striped small table ">
                        <thead>
                            <tr>
                                <th class="one wide"></th>
                                <th class="six wide">Patient Name</th>
                                <th class="three wide">MRN</th>
                                <th class="one wide">Gender</th>
                                <th class="one wide">Age</th>
                                <th class="five wide">Disposition</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <td>{{ ((($records->currentPage() - 1) * $records->perPage()) + ($ctr++) + 1) }}</td>
                                <td><a style="font-weight: bold" href="{{ route('record.show', $record->id) }}">{{ $record->name }}</a></td>
                                <td>{{ $record->mrn }}</td>
                                <td>{{ $record->gender }}</td>
                                <td>{{ $record->age }}</td>
                                <td>{{ isset($record->getLastDisposition()->disposition_id)?$record->getLastDisposition()->disposition->name:"" }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @include('util.paginator', ['paginator' => $records->appends(Request::only('filter'))])
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
                        <tr><th colspan="3">
                                History
                            </th>
                        </tr></thead>
                        <tbody>
                        @foreach($callbacks as $callback)
                            <tr>
                                <td><a style="font-weight: bold" href="{{ route('record.show', $callback->record->id) }}">{{ $callback->record->name }}</a></td>
                                <td> {{ $callback->schedule->diffForHumans() }}</td>
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
                        <tr><th colspan="4">
                                History
                            </th>
                        </tr></thead>
                        <tbody>
                        @foreach(\Illuminate\Support\Facades\Auth::user()->records()->where('updated_at', '!=' ,'0000-00-00 00:00:00')->orderBy('records.updated_at', 'DESC')->take(5)->get() as $record)
                            <tr>
                                <td><a style="font-weight: bold" href="{{ route('record.show', $record->id) }}">{{ $record->name }}</a></td>
                                <td>{{ isset($record->getLastDisposition()->disposition_id)?$record->getLastDisposition()->disposition->name:"" }}</td>
                                <td> {{ $record->updated_at->diffForHumans() }}</td>
                                <td>{{ $record->lists->name }}</td>
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

        $('.ui.search').search({
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