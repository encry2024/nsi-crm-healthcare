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
                            @include('util.page_title')

                            <div class="row">
                                <div class="ui divider"></div>
                            </div>

                            <div class="row">
                                <div class="ui basic segment">
                                    <form method="POST" action="{{ route('submit_blood_pressure', $record->id) }}" class="ui form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


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

                                            <div class="field">
                                                <div class="ui large left input">
                                                    <input name="q1_a" id="q1_a"
                                                           @if(count($record->blood_pressure) > 0)
                                                           value="{{ $record->blood_pressure->q1_a }}"
                                                           @else
                                                           value=""
                                                            @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q2')) error @endif">
                                            <label style="font-size: 16px;">2) What is the most recent BP reading? </label>
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

                                        <div class="field @if($errors->has('q7')) error @endif">
                                            <label style="font-size: 16px;">3) What is the date of the most recent BP from an office visit?</label>
                                            <div class="two fields">
                                                <div class="field">
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

                                                <div class="field">
                                                    <div class="ui big left input">
                                                        <input type="text" name="q7_a"
                                                           @if(count($record->blood_pressure) > 0)
                                                           value="{{ $record->blood_pressure->q7_a }}"
                                                           @else
                                                           value=""
                                                           @endif
                                                        >
                                                    </div>
                                                </div>
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

                                                <div class="field">
                                                    <div class="ui large left input">
                                                        <input name="q3_a" id="q3_a"
                                                               @if(count($record->blood_pressure) > 0)
                                                               value="{{ $record->blood_pressure->q3_a }}"
                                                               @else
                                                               value=""
                                                                @endif
                                                        >
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

                                                <div class="field">
                                                    <div class="ui large left input">
                                                        <input name="q4_a" id="q4_a"
                                                               @if(count($record->blood_pressure) > 0)
                                                               value="{{ $record->blood_pressure->q4_a }}"
                                                               @else
                                                               value=""
                                                                @endif
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <label for="q5" style="font-size: 14px;">6) What was the result of the outreach?</label>
                                            <div class="fields">
                                                <div class="grouped fields">
                                                    <div class="inline fields">
                                                        <div class="field">
                                                            <div class="ui radio checkbox">
                                                                <input type="radio" name="q5" value="Successful"
                                                                       @if(count($record->blood_pressure) > 0)
                                                                       @if ($record->blood_pressure->q5 == "Successful")
                                                                       checked="checked"
                                                                @else
                                                                        @endif
                                                                        @endif
                                                                >
                                                                <label>Successful</label>
                                                            </div>
                                                        </div>
                                                        <div class="field">
                                                            <div class="ui radio checkbox">
                                                                <input type="radio" name="q5" value="Pending"
                                                                       @if(count($record->blood_pressure) > 0)
                                                                       @if ($record->blood_pressure->q5 == "Pending")
                                                                       checked="checked"
                                                                @else
                                                                        @endif
                                                                        @endif
                                                                >
                                                                <label>Pending</label>
                                                            </div>
                                                        </div>
                                                        <div class="field">
                                                            <div class="ui radio checkbox">
                                                                <input type="radio" name="q5" value="Call Back"
                                                                       @if(count($record->blood_pressure) > 0)
                                                                       @if ($record->blood_pressure->q5 == "Call Back")
                                                                       checked="checked"
                                                                @else
                                                                        @endif
                                                                        @endif
                                                                >
                                                                <label>Call Back</label>
                                                            </div>
                                                        </div>
                                                        <div class="field">
                                                            <div class="ui radio checkbox">
                                                                <input type="radio" name="q5" value="Voicemail"
                                                                       @if(count($record->blood_pressure) > 0)
                                                                       @if ($record->blood_pressure->q5 == "Voicemail")
                                                                       checked="checked"
                                                                @else
                                                                        @endif
                                                                        @endif
                                                                >
                                                                <label>Voicemail</label>
                                                            </div>
                                                        </div>
                                                        <div class="field">
                                                            <div class="ui radio checkbox">
                                                                <input type="radio" name="q5" value="No Action Needed"
                                                                       @if(count($record->blood_pressure) > 0)
                                                                       @if ($record->blood_pressure->q5 == "No Action Needed")
                                                                       checked="checked"
                                                                @else
                                                                        @endif
                                                                        @endif
                                                                >
                                                                <label>No Action Needed</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="ui large left input">
                                                    <input name="q5_a" id="q5_a"
                                                           @if(count($record->blood_pressure) > 0)
                                                           value="{{ $record->blood_pressure->q5_a }}"
                                                           @else
                                                           value=""
                                                            @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q6')) error @endif">
                                            <label style="font-size: 16px;">7) Closed loop: If you made an appt., was the appt. kept?  If you tasked the office, did the office act on the task & close the task?  Did the you update the QM tab for the patient? </label>
                                            <div class="ui large left icon input">
                                                <input type="text" name="q6"
                                                       @if(count($record->blood_pressure) > 0)
                                                       value="{{ $record->blood_pressure->q6 }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                                <i class="info icon"></i>
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