@extends('template')


@section('header')
    @include('util.header')
@stop


@section('content')
    <div class="ui padded grid">
        <div class="sixteen wide column grid " >
            @include('util.messages')
            <div class="ui grid">
                <div class="four wide column">
                    @include('util.form_left_sidebar')
                </div>
                <div class="twelve wide column">
                    <div class="ui grid">
                        <div class="eleven wide column">
                            <div class="row">
                                <h2 class="header">
                                    <div class="content">
                                        High Risk Meds
                                    </div>
                                </h2>
                            </div>

                            <div class="row">
                                <div class="ui divider"></div>
                            </div>

                            <div class="row">
                                <div class="ui basic segment">
                                    <form method="POST" action="{{ route('submit_high_risk_meds', $record->id) }}" class="ui form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="grouped fields">
                                            <div class="field @if($errors->has('q1')) error @endif">
                                                <label for="q1" style="font-size: 16px;">1) Refer to the High Risk Medication List.  Is the patient on High Risk Med?</label>
                                                <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                    <input type="radio" name="q1" id="q1"
                                                       @if(count($record->high_risk_meds) > 0)
                                                           @if ($record->high_risk_meds->q1 == "Yes")
                                                           checked="checked"
                                                           @else
                                                           @endif
                                                       @endif
                                                    value="Yes">
                                                    <label>Yes</label>
                                                </div>
                                            </div>

                                            <div class="field @if($errors->has('q1')) error @endif">
                                                <div class="ui radio checkbox">
                                                    <input type="radio" name="q1" id="q1" value="No"
                                                    @if(count($record->high_risk_meds) > 0)
                                                        @if ($record->high_risk_meds->q1 == "No")
                                                        checked="checked"
                                                        @else
                                                        @endif
                                                    @endif
                                                    >
                                                    <label>No</label>
                                                </div>
                                            </div>

                                            <div class="field">
                                                <div class="ui big left input">
                                                    <input type="text" name="q1_a"
                                                           @if(count($record->high_risk_meds) > 0)
                                                           value="{{ $record->high_risk_meds->q1_a }}"
                                                           @else
                                                           value=""
                                                            @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grouped fields">
                                            <div class="field @if($errors->has('q4')) error @endif">
                                                <label for="q4" style="font-size: 16px;">2) If YES, task Pharmacist</label>
                                                <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                    <input type="radio" name="q4" id="q4"
                                                           @if(count($record->high_risk_meds) > 0)
                                                           @if ($record->high_risk_meds->q4 == "Yes")
                                                           checked="checked"
                                                           @else
                                                           @endif
                                                           @endif
                                                           value="Yes">
                                                    <label>Yes</label>
                                                </div>
                                            </div>

                                            <div class="field @if($errors->has('q4')) error @endif">
                                                <div class="ui radio checkbox">
                                                    <input type="radio" name="q4" id="q4" value="No"
                                                           @if(count($record->high_risk_meds) > 0)
                                                           @if ($record->high_risk_meds->q4 == "No")
                                                           checked="checked"
                                                    @else
                                                            @endif
                                                            @endif
                                                    >
                                                    <label>No</label>
                                                </div>
                                            </div>

                                            <div class="field">
                                                <div class="ui big left input">
                                                    <input type="text" name="q4_a"
                                                           @if(count($record->high_risk_meds) > 0)
                                                           value="{{ $record->high_risk_meds->q4_a }}"
                                                           @else
                                                           value=""
                                                            @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <label style="font-size: 16px;">3) Closed Loop: If you made an appt., was the appt. kept? If you tasked the office, did the office act on the task & close the task? Did you update the QM tab for the patient?</label>
                                            <div class="ui big left input">
                                                <input type="text" name="q5"
                                                       @if(count($record->high_risk_meds) > 0)
                                                       value="{{ $record->high_risk_meds->q5 }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                            </div>
                                        </div>

                                        <div class="ui divider"></div>

                                        <div class="actions">
                                            <button class="ui button primary fluid">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="five wide column">
                            @include('util.form_right_sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    @include('util.form_scripts')
@stop