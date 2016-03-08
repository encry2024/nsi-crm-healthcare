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
                                    <form method="POST" action="{{ route('submit_diabetes_eye_exam', $record->id) }}" class="ui form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="field @if($errors->has('q12')) error @endif">
                                            <label>1) What is the date of most recent Dilated Eye?</label>
                                            <div class="two fields">
                                                <div class="field">
                                                    <div class="ui big left icon input">
                                                        <input name="q12"
                                                               @if (count($record->diabetes_eye_exam) > 0)
                                                               value="{{ $record->diabetes_eye_exam->q12 }}"
                                                               @else
                                                               value=""
                                                               @endif
                                                               id="recent_dilated_eye">
                                                        <i class="calendar icon"></i>
                                                    </div>
                                                </div>

                                                <div class="field">
                                                    <div class="ui big left input">
                                                        <input name="q12_a"
                                                               @if (count($record->diabetes_eye_exam) > 0)
                                                               value="{{ $record->diabetes_eye_exam->q12_a }}"
                                                               @else
                                                               value=""
                                                               @endif>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grouped fields">
                                            <div class="field @if($errors->has('q17')) error @endif">
                                                <label>2) Is this a date between date range: 1/1/2015-current date?</label>
                                                <div class="ui radio checkbox">
                                                    <input type="radio" name="q17" id="q17"
                                                           @if(count($record->diabetes_eye_exam) > 0)
                                                           @if ($record->diabetes_eye_exam->q17 == "Yes")
                                                           checked="checked"
                                                           @else
                                                           @endif
                                                           @endif
                                                           value="Yes"
                                                    >
                                                    <label>Yes</label>
                                                </div>
                                            </div>

                                            <div class="field @if($errors->has('q17')) error @endif">
                                                <div class="ui radio checkbox">
                                                    <input type="radio" name="q17" id="q17"
                                                           @if(count($record->diabetes_eye_exam) > 0)
                                                           @if($record->diabetes_eye_exam->q17 == "No")
                                                           checked="checked"
                                                           @else
                                                           @endif
                                                           @endif
                                                           value="No"
                                                    >
                                                    <label>No</label>
                                                </div>
                                            </div>

                                            <div class="field">
                                                <div class="ui left input">
                                                    <input name="q17_a" id="q17_a"
                                                           @if(count($record->diabetes_eye_exam) > 0)
                                                           value="{{ $record->diabetes_eye_exam->q17_a }}"
                                                           @else
                                                           value=""
                                                            @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grouped fields">
                                            <div class="field @if($errors->has('q16')) error @endif">
                                                <label>3)If the date is NOT between date range, was outreach to patient made?</label>
                                                <div class="ui radio checkbox">
                                                    <input type="radio" name="q16" id="q16"
                                                           @if(count($record->diabetes_eye_exam) > 0)
                                                           @if ($record->diabetes_eye_exam->q16 == "Yes")
                                                           checked="checked"
                                                           @else
                                                           @endif
                                                           @endif
                                                           value="Yes"
                                                    >
                                                    <label>Yes</label>
                                                </div>
                                            </div>

                                            <div class="field @if($errors->has('q16')) error @endif">
                                                <div class="ui radio checkbox">
                                                    <input type="radio" name="q16" id="q16"
                                                           @if(count($record->diabetes_eye_exam) > 0)
                                                           @if($record->diabetes_eye_exam->q16 == "No")
                                                           checked="checked"
                                                           @else
                                                           @endif
                                                           @endif
                                                           value="No"
                                                    >
                                                    <label>No</label>
                                                </div>
                                            </div>

                                            <div class="field">
                                                <div class="ui left input">
                                                    <input name="q16_a" id="q16_a"
                                                           @if(count($record->diabetes_eye_exam) > 0)
                                                           value="{{ $record->diabetes_eye_exam->q16_a }}"
                                                           @else
                                                           value=""
                                                            @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q15')) error @endif">
                                            <label for="q15" style="font-size: 14px;">4) What was the result of the outreach?</label>
                                            <div class="ui selection dropdown">
                                                <input type="hidden" name="q15">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">
                                                    @if(count($record->diabetes_eye_exam) != 0)
                                                        @if ($record->diabetes_eye_exam->q15 == "Patient Transferred")
                                                            {{ $record->diabetes_eye_exam->q15 }}
                                                        @elseif ($record->diabetes_eye_exam->q15 == "Scheduled Appointment")
                                                            {{ $record->diabetes_eye_exam->q15 }}
                                                        @elseif ($record->diabetes_eye_exam->q15 == "Patient Refused")
                                                            {{ $record->diabetes_eye_exam->q15 }}
                                                        @elseif ($record->diabetes_eye_exam->q15 == "NPC")
                                                            {{ $record->diabetes_eye_exam->q15 }}
                                                        @elseif ($record->diabetes_eye_exam->q15 == "Pending")
                                                            {{ $record->diabetes_eye_exam->q15 }}
                                                        @elseif ($record->diabetes_eye_exam->q15 == "Call back")
                                                            {{ $record->diabetes_eye_exam->q15 }}
                                                        @elseif ($record->diabetes_eye_exam->q15 == "Voicemail")
                                                            {{ $record->diabetes_eye_exam->q15 }}
                                                        @elseif ($record->diabetes_eye_exam->q15 == "No answer")
                                                            {{ $record->diabetes_eye_exam->q15 }}
                                                        @elseif ($record->diabetes_eye_exam->q15 == "Disconnected Number")
                                                            {{ $record->diabetes_eye_exam->q15 }}
                                                        @elseif ($record->diabetes_eye_exam->q15 == "Do Not Call")
                                                            {{ $record->diabetes_eye_exam->q15 }}
                                                        @elseif ($record->diabetes_eye_exam->q15 == "Privacy Manager")
                                                            {{ $record->diabetes_eye_exam->q15 }}
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="menu">
                                                    <div class="item" data-value="Patient Transferred">Patient Transferred</div>
                                                    <div class="item" data-value="Scheduled Appointment">Scheduled Appointment</div>
                                                    <div class="item" data-value="Patient Refused">Patient Refused</div>
                                                    <div class="item" data-value="NPC">NPC</div>
                                                    <div class="item" data-value="Pending">Pending</div>
                                                    <div class="item" data-value="Call back">Call back</div>
                                                    <div class="item" data-value="Voicemail">Voicemail</div>
                                                    <div class="item" data-value="No answer">No answer</div>
                                                    <div class="item" data-value="Disconnected Number">Disconnected Number</div>
                                                    <div class="item" data-value="Do Not Call">Do Not Call</div>
                                                    <div class="item" data-value="Privacy Manager">Privacy Manager</div>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="ui large left input">
                                                    <input name="q15_a" id="q15_a"
                                                           @if(count($record->diabetes_eye_exam) > 0)
                                                           value="{{ $record->diabetes_eye_exam->q15_a }}"
                                                           @else
                                                           value=""
                                                            @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q14')) error @endif">
                                            <label>5) If done outside SMG, did you request document form outside provider or patient?</label>
                                            <div class="ui left input">
                                                <input name="q14"
                                                       @if(count($record->diabetes_eye_exam) > 0)
                                                       value="{{ $record->diabetes_eye_exam->q14 }}"
                                                       @else
                                                       value=""
                                                       @endif
                                                       id="q14">
                                            </div>
                                        </div>

                                        <div class="grouped fields">
                                            <div class="field @if($errors->has('q13')) error @endif">
                                                <label>6) Was document received and recorded in EMR?</label>
                                                <div class="ui radio checkbox">
                                                    <input type="radio" name="q13" id="q13"
                                                           @if(count($record->diabetes_eye_exam) > 0)
                                                           @if ($record->diabetes_eye_exam->q13 == "Yes")
                                                           checked="checked"
                                                           @else
                                                           @endif
                                                           @endif
                                                           value="Yes"
                                                    >
                                                    <label>Yes</label>
                                                </div>
                                            </div>

                                            <div class="field @if($errors->has('q13')) error @endif">
                                                <div class="ui radio checkbox">
                                                    <input type="radio" name="q13" id="q13"
                                                           @if(count($record->diabetes_eye_exam) > 0)
                                                           @if($record->diabetes_eye_exam->q13 == "No")
                                                           checked="checked"
                                                           @else
                                                           @endif
                                                           @endif
                                                           value="No"
                                                    >
                                                    <label>No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q11')) error @endif">
                                            <label style="font-size: 16px;">7) Closed loop: If you made an appt., was the appt. kept?  If you tasked the office, did the office act on the task & close the task?  Did the you update the QM tab for the patient? </label>
                                            <div class="ui large left icon input">
                                                <input type="text" name="q11"
                                                       @if(count($record->diabetes_eye_exam) > 0)
                                                       value="{{ $record->diabetes_eye_exam->q11 }}"
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
