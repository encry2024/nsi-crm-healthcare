@extends('template')

@section('header')
    @include('util.header')
@stop

@section('content')
    <div class="ui centered padded grid">

        <div class="row">
            <div class="sixteen wide column">
                <div class="ui grid">
                    <br><br>
                    <div class="ten wide column">

                        <h2 class="ui header">
                            <div class="content"><i class="dashboard icon"></i>Dashboard</div>
                        </h2>
                        <div class="ui divider"></div>

                        <div class="ui grid">
                        <div class="row">
                            <div class="ten wide column">
                                <div class="ui inverted grey segment">
                                    <form action="{{ route('/home') }}" method="GET" style="margin: 0; !important">
                                    <div class="ui inverted small form">
                                        <div class="two fields">
                                            <div class="field">
                                                <label> Gender </label>
                                                <select class="ui dropdown aaaa" name="gender">
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
                                        <button class="ui submit black button">Filter</button>
                                        <a href="{{ route('/home') }}" class="ui button black">Clear Filter</a>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        <table class="ui compact table striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Patient Name</th>
                                    <th>MRN</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Disposition</th>
                                    <th>Call Notes</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($records as $record)
                                <tr>
                                    <td>{{ ((($records->currentPage() - 1) * $records->perPage()) + ($ctr++) + 1) }}</td>
                                    <td>{{ $record->name }}</td>
                                    <td>{{ $record->mrn }}</td>
                                    <td>{{ $record->gender }}</td>
                                    <td>{{ $record->age }}</td>
                                    <td>{{ isset($record->getLastDisposition()->disposition_id)?$record->getLastDisposition()->disposition->name:"" }}</td>
                                    <td>{{ (strlen($record->call_notes) > 30) ? substr($record->call_notes, 0, 30) . '...' : $record->call_notes }}</td>
                                    <td><a class="ui button primary small" href="{{ route('record.show', $record->id) }}">view</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @include('util.paginator', ['paginator' => $records->appends(Request::only('filter'))])
                    </div>

                    <div class="six wide column">
                        <div class="row">
                            <h2 class="ui header">
                                <div class="content">
                                    Callbacks
                                </div>
                            </h2>

                            <div class="ui divider"></div>

                            <table class="ui celled striped table">
                                <thead>
                                <tr><th colspan="3">
                                        History
                                    </th>
                                </tr></thead>
                                <tbody>
                                @foreach(\Illuminate\Support\Facades\Auth::user()->callbacks as $callback)
                                    <tr>
                                        <td><a href="{{ route('record.show', $callback->record->id) }}">{{ $callback->record->name }}</a></td>
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

                            <table class="ui celled striped table">
                                <thead>
                                <tr><th colspan="3">
                                        History
                                    </th>
                                </tr></thead>
                                <tbody>
                                @foreach(\Illuminate\Support\Facades\Auth::user()->records()->where('updated_at', '!=' ,'0000-00-00 00:00:00')->orderBy('records.updated_at', 'DESC')->take(5)->get() as $record)
                                    <tr>
                                        <td><a href="{{ route('record.show', $record->id) }}">{{ $record->name }}</a></td>
                                        <td>{{ isset($record->getLastDisposition()->disposition_id)?$record->getLastDisposition()->disposition->name:"" }}</td>
                                        <td> {{ $record->updated_at->diffForHumans() }}</td>
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
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $('.aaaa').dropdown();
    </script>
@stop