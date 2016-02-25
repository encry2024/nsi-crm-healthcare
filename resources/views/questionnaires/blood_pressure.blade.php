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
                        <div class="twelve wide column">
                            <div class="row">
                                <h2 class="header">
                                    <div class="content">
                                        Blood pressure
                                    </div>
                                </h2>
                            </div>

                            <div class="row">
                                <div class="ui divider"></div>
                            </div>

                            <div class="row">
                                <div class="ui basic segment">
                                    <form method="POST" action="{{ route('submit_blood_pressure', $record->id) }}" class="ui form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="two fields">
                                            <div class="grouped fields">
                                                <div class="field @if($errors->has('q1')) error @endif">
                                                    <label for="q1" style="font-size: 16px;">1) Does the patient have a diagnosis of hypertension or a history of hypertension?</label>
                                                    <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                        <input type="radio" name="q1" id="q1"
                                                           @if(count($record->blood_pressure) > 0)
                                                               @if ($record->blood_pressure->q1 == "Yes")
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
                                                        <input type="radio" name="q1" id="q1"
                                                           @if(count($record->blood_pressure) > 0)
                                                               @if ($record->blood_pressure->q1 == "No")
                                                                   checked="checked"
                                                               @else
                                                               @endif
                                                           @endif
                                                         value="No">
                                                        <label>No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="field @if($errors->has('q2')) error @endif">
                                                <label style="font-size: 16px;">2) Most Recent BP reading</label>
                                                <div class="ui big left input">
                                                    <input type="text" name="q2"
                                                       @if(count($record->blood_pressure) > 0)
                                                            value="{{ $record->blood_pressure->q2 }}"
                                                       @else
                                                            value=""
                                                       @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q7')) error @endif">
                                            <label style="font-size: 16px;">3) What is the date of the most recent BP from an office visit?</label>
                                            <div class="ui big left icon input">
                                                <input type="text" name="q7" id="most_recent_bp"
                                                   @if(count($record->blood_pressure) > 0)
                                                   value="{{ $record->blood_pressure->q7 }}"
                                                   @else
                                                   value=""
                                                   @endif
                                                >
                                                <i class="calendar icon"></i>
                                            </div>
                                        </div>

                                        <div class="two fields">
                                            <div class="grouped fields">
                                                <div class="field @if($errors->has('q3')) error @endif">
                                                    <label for="q3" style="font-size: 16px;">4) Is Blood pressure > 140/90?</label>
                                                    <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                        <input type="radio" name="q3" id="q3"
                                                           @if(count($record->blood_pressure) > 0)
                                                               @if ($record->blood_pressure->q3 == "Yes")
                                                                   checked="checked"
                                                               @else
                                                               @endif
                                                           @endif
                                                        value="Yes">
                                                        <label>Yes</label>
                                                    </div>
                                                </div>

                                                <div class="field @if($errors->has('q3')) error @endif">
                                                    <div class="ui radio checkbox">
                                                        <input type="radio" name="q3" id="q3"
                                                           @if(count($record->blood_pressure) > 0)
                                                               @if ($record->blood_pressure->q3 == "No")
                                                                   checked="checked"
                                                               @else
                                                               @endif
                                                           @endif
                                                        value="No">
                                                        <label>No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grouped fields">
                                                <div class="field @if($errors->has('q4')) error @endif">
                                                    <label for="q4" style="font-size: 16px;">5) If out of range (> 140/90), was patient outreach made?</label>
                                                        <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                        <input type="radio" name="q4" id="q4"
                                                           @if(count($record->blood_pressure) > 0)
                                                               @if ($record->blood_pressure->q4 == "Yes")
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
                                                        <input type="radio" name="q4" id="q4"
                                                           @if(count($record->blood_pressure) > 0)
                                                               @if ($record->blood_pressure->q4 == "No")
                                                                   checked="checked"
                                                               @else
                                                               @endif
                                                           @endif
                                                           value="No">
                                                        <label>No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <label style="font-size: 16px;">6) What was the result of the outreach?</label>
                                            <div class="ui big left input">
                                                <input type="text" name="q5"
                                                   @if(count($record->blood_pressure) > 0)
                                                        value="{{ $record->blood_pressure->q5 }}"
                                                   @else
                                                        value=""
                                                   @endif
                                                >
                                            </div>
                                        </div>

                                        <div class="grouped fields">
                                            <div class="field @if($errors->has('q6')) error @endif">
                                                <label for="q6" style="font-size: 16px;">7) Closed loop: If you made an appt., was the appt. kept?  If you tasked the office, did the office act on the task & close the task?  Did the you update the QM tab for the patient? </label>
                                                <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                    <input type="radio" name="q6" id="q6"
                                                       @if(count($record->blood_pressure) > 0)
                                                           @if ($record->blood_pressure->q6 == "Yes")
                                                               checked="checked"
                                                           @else
                                                           @endif
                                                       @endif
                                                       value="Yes">
                                                    <label>Yes</label>
                                                </div>
                                            </div>

                                            <div class="field @if($errors->has('q6')) error @endif">
                                                <div class="ui radio checkbox">
                                                    <input type="radio" name="q6" id="q6"
                                                       @if(count($record->blood_pressure) > 0)
                                                           @if ($record->blood_pressure->q6 == "No")
                                                               checked="checked"
                                                           @else
                                                           @endif
                                                       @endif
                                                       value="No">
                                                    <label>No</label>
                                                </div>
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
                        <div class="four wide column">
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