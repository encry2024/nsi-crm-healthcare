@extends('template')

@section('header')
    @include('util.header')
@stop

@section('content')
    <div class="ui centered grid">

        <div class="row">
            <div class="fourteen wide column">
                <div class="ui grid">
                    <div class="sixteen wide column">
                        <h2 class="ui header">
                            <div class="content"><i class="dashboard icon"></i>Dashboard</div>
                        </h2>
                        <div class="ui divider"></div>

                        <table class="ui table striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Patient Name</th>
                                    <th>Medical Record Number</th>
                                    <th>BTN/Phone Number</th>
                                    <th>Reference Number</th>
                                    <th>Call Notes</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($records as $record)
                                <tr>
                                    <td>{{ ((($records->currentPage() - 1) * $records->perPage()) + ($ctr++) + 1) }}</td>
                                    <td>{{ $record->fullName() }}</td>
                                    <td>{{ $record->mrn }}</td>
                                    <td>{{ $record->btn }}</td>
                                    <td>{{ $record->reference_no }}</td>
                                    <td>{{ $record->call_notes }}</td>
                                    <td>{{ $record->status }}</td>
                                    <td><a class="ui button primary small" href="{{ route('record.show', $record->id) }}">view</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop