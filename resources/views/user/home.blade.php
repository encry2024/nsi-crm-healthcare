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
                    <div class="eleven wide column">

                        <h2 class="ui header">
                            <div class="content"><i class="dashboard icon"></i>Dashboard</div>
                        </h2>
                        <div class="ui divider"></div>

                        <table class="ui compact table striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Patient Name</th>
                                    <th>Medical Record Number</th>
                                    <th>BTN/Phone Number</th>
                                    <th>Call Notes</th>
                                    <th>Status</th>
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
                                    <td>{{ $record->call_notes }}</td>
                                    <td>{{ $record->status }}</td>
                                    <td><a class="ui button primary small" href="{{ route('record.show', $record->id) }}">view</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @include('util.paginator', ['paginator' => $records->appends(Request::only('filter'))])
                    </div>

                    <div class="five wide column">
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
                            @foreach (\Illuminate\Support\Facades\Auth::user()->records as $record)
                                @foreach($record->callback as $callback)
                                    <tr>
                                        <td>{{ $callback->schedule->toDayDateTimeString() }}</td>
                                        <td><a href="{{ route('record.show', $record->id) }}">{{ $record->name }}</a></td>
                                        <td class="right aligned"> {{ $callback->schedule->diffForHumans() }}
                                        </td>
                                    </tr>
                                @endforeach
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
@stop

@section('scripts')
@stop