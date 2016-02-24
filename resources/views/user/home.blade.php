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

                        <table class="ui compact table striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Patient Name</th>
                                    <th>MRN</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
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
                                    <td>{{ $record->btn }}</td>
                                    <td>{{ $record->gender }}</td>
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
                                @foreach(\Illuminate\Support\Facades\Auth::user()->records()->orderBy('records.updated_at', 'DESC')->take(5)->get() as $record)
                                    <tr>
                                        <td><a href="{{ route('record.show', $record->id) }}">{{ $record->name }}</a></td>
                                        <td>{{ $record->mrn }}</td>
                                        <td>{{ $record->btn }}</td>


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
@stop