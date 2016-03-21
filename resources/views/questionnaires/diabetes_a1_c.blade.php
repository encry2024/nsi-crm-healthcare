@extends('template')


@section('header')
    @include('util.header')
@stop

@if($record->user_id == Auth::user()->id)
    @section('content')
        <div class="ui padded grid">
            <div class="ui doubling stackable three column row">
                @include('util.messages')
                <div class="four wide column">
                    @include('util.form_left_sidebar')
                </div>
                <div class="nine wide column">
                    @include('util.page_title')
                    <div class="row">
                        <div class="ui divider"></div>
                    </div>
                    <div class="row">
                        <div class="ui basic segment">
                            <form method="POST" action="{{ route('submit_diabetes_a1_c', $record->id) }}" class="ui form ">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="grouped fields">
                                    <div class="field @if($errors->has('q1')) error @endif">
                                        <label for="q1" style="font-size: 16px;">1) Does the patient have a diagnosis of diabetes or a history of diabetes?</label>
                                        <div class="ui radio checkbox " style="margin-top: 0.5rem !important;">
                                            <input type="radio"  name="q1" id="q1" value="Yes"
                                            @if(count($record->diabetes_a1_c) > 0)
                                                @if ($record->diabetes_a1_c->q1 == "Yes")
                                                    checked="checked"
                                                @else
                                                @endif
                                            @endif
                                            >
                                            <label>Yes</label>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q1')) error @endif">
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="q1" id="q1" value="No"
                                            @if(count($record->diabetes_a1_c) > 0)
                                                @if ($record->diabetes_a1_c->q1 == "No")
                                                checked="checked"
                                                @else
                                                @endif
                                            @endif
                                            >
                                            <label>No</label>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="ui large left input">
                                            <input name="q1_a" id="q1_a"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   value="{{ $record->diabetes_a1_c->q1_a }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="grouped fields">
                                    <div class="field @if($errors->has('q2')) error @endif">
                                        <label for="q2" style="font-size: 16px;">2) Was the office visit date between July-Dec. 2015?</label>
                                        <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                            <input type="radio" name="q2" id="q2" value="Yes"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   @if ($record->diabetes_a1_c->q2 == "Yes")
                                                   checked="checked"
                                            @else
                                                    @endif
                                                    @endif
                                            >
                                            <label>Yes</label>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q2')) error @endif">
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="q2" id="q2" value="No"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   @if ($record->diabetes_a1_c->q2 == "No")
                                                   checked="checked"
                                            @else
                                                    @endif
                                                    @endif
                                            >
                                            <label>No</label>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="ui large left input">
                                            <input name="q2_a" id="q2_a"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   value="{{ $record->diabetes_a1_c->q2_a }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
                                        </div>
                                    </div>
                                </div>



                                <div class="two fields">

                                    <div class="field @if($errors->has('q3')) error @endif">
                                        <label style="font-size: 16px;">3) What is the date of the most recent office visit? </label>
                                        <div class="two fields">
                                            <div class="field">
                                                <div class="ui big left icon input">
                                                    <input name="q3" id="v_d"
                                                           @if(count($record->diabetes_a1_c) > 0)
                                                           value="{{ $record->diabetes_a1_c->q3 }}"
                                                           @else
                                                           value=""
                                                           @endif
                                                           readonly>
                                                    <i class="calendar icon"></i>
                                                </div>
                                            </div>

                                            <div class="field">
                                                <div class="ui big left input">
                                                    <input name="q3_a"
                                                           @if(count($record->diabetes_a1_c) > 0)
                                                           value="{{ $record->diabetes_a1_c->q3_a }}"
                                                           @else
                                                           value=""
                                                            @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q4')) error @endif">
                                        <label>4) What was the A1c Value?</label>
                                        <div class="ui big left input">
                                            <input name="q4" id="q4"
                                               @if(count($record->diabetes_a1_c) > 0)
                                               value="{{ $record->diabetes_a1_c->q4 }}"
                                               @else
                                               value=""
                                               @endif>
                                        </div>
                                    </div>
                                </div>

                                <div class="two fields">
                                    <div class="grouped fields">
                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <label for="q5" style="font-size: 16px;">5) Is the A1c Under 9%?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q5" id="q5"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                       @if ($record->diabetes_a1_c->q5 == "Yes")
                                                       checked="checked"
                                                       @else
                                                       @endif
                                                   @endif
                                                value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q5" id="q5"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                       @if ($record->diabetes_a1_c->q5 == "No")
                                                       checked="checked"
                                                       @else
                                                       @endif
                                                   @endif
                                                value="No">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="ui big left input">
                                                <input name="q5_a"
                                                       @if(count($record->diabetes_a1_c) > 0)
                                                       value="{{ $record->diabetes_a1_c->q5_a }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grouped fields">
                                        <div class="field @if($errors->has('q6')) error @endif">
                                            <label for="q6" style="font-size: 16px;">6) Is the A1c Under 8%?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q6" id="q6"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                       @if ($record->diabetes_a1_c->q6 == "Yes")
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
                                                <input type="radio" name="q6" id="q6" value="No"
                                                @if(count($record->diabetes_a1_c) > 0)
                                                    @if ($record->diabetes_a1_c->q6 == "No")
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
                                                <input name="q6_a"
                                                       @if(count($record->diabetes_a1_c) > 0)
                                                       value="{{ $record->diabetes_a1_c->q6_a }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="grouped fields">
                                    <div class="field @if($errors->has('q7')) error @endif">
                                        <label for="q7" style="font-size: 16px;">7) If out of range (>8%) or not done in past 6 months, was outreach made?</label>
                                        <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                            <input type="radio" name="q7" id="q7"
                                               @if(count($record->diabetes_a1_c) > 0)
                                                   @if ($record->diabetes_a1_c->q7 == "Yes")
                                                   checked="checked"
                                                   @else
                                                   @endif
                                               @endif
                                            value="Yes">
                                            <label>Yes</label>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q7')) error @endif">
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="q7" id="q7" value="No"
                                            @if(count($record->diabetes_a1_c) > 0)
                                                @if ($record->diabetes_a1_c->q7 == "No")
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
                                            <input name="q7_a"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   value="{{ $record->diabetes_a1_c->q7_a }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('q9')) error @endif">
                                    <label for="q9" style="font-size: 14px;">8) What was the result of the outreach?</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="q9">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">
                                            @if(count($record->diabetes_a1_c) != 0)
                                                @if ($record->diabetes_a1_c->q9 == "Patient Transferred")
                                                    {{ $record->diabetes_a1_c->q9 }}
                                                @elseif ($record->diabetes_a1_c->q9 == "Scheduled Appointment")
                                                    {{ $record->diabetes_a1_c->q9 }}
                                                @elseif ($record->diabetes_a1_c->q9 == "Patient Refused")
                                                    {{ $record->diabetes_a1_c->q9 }}
                                                @elseif ($record->diabetes_a1_c->q9 == "NPC")
                                                    {{ $record->diabetes_a1_c->q9 }}
                                                @elseif ($record->diabetes_a1_c->q9 == "Pending")
                                                    {{ $record->diabetes_a1_c->q9 }}
                                                @elseif ($record->diabetes_a1_c->q9 == "Call back")
                                                    {{ $record->diabetes_a1_c->q9 }}
                                                @elseif ($record->diabetes_a1_c->q9 == "Voicemail")
                                                    {{ $record->diabetes_a1_c->q9 }}
                                                @elseif ($record->diabetes_a1_c->q9 == "No answer")
                                                    {{ $record->diabetes_a1_c->q9 }}
                                                @elseif ($record->diabetes_a1_c->q9 == "Disconnected Number")
                                                    {{ $record->diabetes_a1_c->q9 }}
                                                @elseif ($record->diabetes_a1_c->q9 == "Do Not Call")
                                                    {{ $record->diabetes_a1_c->q9 }}
                                                @elseif ($record->diabetes_a1_c->q9 == "Privacy Manager")
                                                    {{ $record->diabetes_a1_c->q9 }}
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
                                            <input name="q9_a" id="q9_a"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   value="{{ $record->diabetes_a1_c->q9_a }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('q11')) error @endif">
                                    <label style="font-size: 16px;">9) Closed loop: If you made an appt., was the appt. kept?  If you tasked the office, did the office act on the task & close the task?  Did the you update the QM tab for the patient? </label>
                                    <div class="ui large left icon input">
                                        <input type="text" name="q11"
                                               @if(count($record->diabetes_a1_c) > 0)
                                               value="{{ $record->diabetes_a1_c->q11 }}"
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
                <div class="three wide column">
                    @include('util.form_right_sidebar')
                </div>
            </div>
        </div>
    @stop
@else
    @section('content')
        <div class="ui padded grid">
            <div class="ui doubling stackable three column row">
                @include('util.messages')
                <div class="four wide column">
                    @include('util.form_left_sidebar')
                </div>
                <div class="nine wide column"   >
                    @include('util.page_title')
                    <div class="row">
                        <div class="ui divider"></div>
                    </div>
                    <div class="row">
                        <div class="ui basic segment">
                            <form method="POST" action="{{ route('submit_diabetes_a1_c', $record->id) }}" class="ui form ">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="grouped disabled fields">
                                    <div class="field @if($errors->has('q1')) error @endif">
                                        <label for="q1" style="font-size: 16px;">1) Does the patient have a diagnosis of diabetes or a history of diabetes?</label>
                                        <div class="ui radio checkbox " style="margin-top: 0.5rem !important;">
                                            <input type="radio"  name="q1" id="q1" value="Yes"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   @if ($record->diabetes_a1_c->q1 == "Yes")
                                                   checked="checked"
                                            @else
                                                    @endif
                                                    @endif
                                            >
                                            <label>Yes</label>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q1')) error @endif">
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="q1" id="q1" value="No"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   @if ($record->diabetes_a1_c->q1 == "No")
                                                   checked="checked"
                                            @else
                                                    @endif
                                                    @endif
                                            >
                                            <label>No</label>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="ui large left input">
                                            <input name="q1_a" id="q1_a"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   value="{{ $record->diabetes_a1_c->q1_a }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="grouped disabled fields">
                                    <div class="field @if($errors->has('q2')) error @endif">
                                        <label for="q2" style="font-size: 16px;">2) Was the office visit date between July-Dec. 2015?</label>
                                        <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                            <input type="radio" name="q2" id="q2" value="Yes"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   @if ($record->diabetes_a1_c->q2 == "Yes")
                                                   checked="checked"
                                            @else
                                                    @endif
                                                    @endif
                                            >
                                            <label>Yes</label>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q2')) error @endif">
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="q2" id="q2" value="No"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   @if ($record->diabetes_a1_c->q2 == "No")
                                                   checked="checked"
                                            @else
                                                    @endif
                                                    @endif
                                            >
                                            <label>No</label>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="ui large left input">
                                            <input name="q2_a" id="q2_a"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   value="{{ $record->diabetes_a1_c->q2_a }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="two disabled fields">

                                    <div class="field @if($errors->has('q3')) error @endif">
                                        <label style="font-size: 16px;">3) What is the date of the most recent office visit? </label>
                                        <div class="two fields">
                                            <div class="field">
                                                <div class="ui big left icon input">
                                                    <input name="q3" id="v_d"
                                                           @if(count($record->diabetes_a1_c) > 0)
                                                           value="{{ $record->diabetes_a1_c->q3 }}"
                                                           @else
                                                           value=""
                                                           @endif
                                                           readonly>
                                                    <i class="calendar icon"></i>
                                                </div>
                                            </div>

                                            <div class="field">
                                                <div class="ui big left input">
                                                    <input name="q3_a"
                                                           @if(count($record->diabetes_a1_c) > 0)
                                                           value="{{ $record->diabetes_a1_c->q3_a }}"
                                                           @else
                                                           value=""
                                                            @endif
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q4')) error @endif">
                                        <label>4) What was the A1c Value?</label>
                                        <div class="ui big left input">
                                            <input name="q4" id="q4"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   value="{{ $record->diabetes_a1_c->q4 }}"
                                                   @else
                                                   value=""
                                                    @endif>
                                        </div>
                                    </div>
                                </div>

                                <div class="two disabled fields">
                                    <div class="grouped fields">
                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <label for="q5" style="font-size: 16px;">5) Is the A1c Under 9%?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q5" id="q5"
                                                       @if(count($record->diabetes_a1_c) > 0)
                                                       @if ($record->diabetes_a1_c->q5 == "Yes")
                                                       checked="checked"
                                                       @else
                                                       @endif
                                                       @endif
                                                       value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q5" id="q5"
                                                       @if(count($record->diabetes_a1_c) > 0)
                                                       @if ($record->diabetes_a1_c->q5 == "No")
                                                       checked="checked"
                                                       @else
                                                       @endif
                                                       @endif
                                                       value="No">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="ui big left input">
                                                <input name="q5_a"
                                                       @if(count($record->diabetes_a1_c) > 0)
                                                       value="{{ $record->diabetes_a1_c->q5_a }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grouped fields">
                                        <div class="field @if($errors->has('q6')) error @endif">
                                            <label for="q6" style="font-size: 16px;">6) Is the A1c Under 8%?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q6" id="q6"
                                                       @if(count($record->diabetes_a1_c) > 0)
                                                       @if ($record->diabetes_a1_c->q6 == "Yes")
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
                                                <input type="radio" name="q6" id="q6" value="No"
                                                       @if(count($record->diabetes_a1_c) > 0)
                                                       @if ($record->diabetes_a1_c->q6 == "No")
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
                                                <input name="q6_a"
                                                       @if(count($record->diabetes_a1_c) > 0)
                                                       value="{{ $record->diabetes_a1_c->q6_a }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="grouped disabled fields">
                                    <div class="field @if($errors->has('q7')) error @endif">
                                        <label for="q7" style="font-size: 16px;">7) If out of range (>8%) or not done in past 6 months, was outreach made?</label>
                                        <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                            <input type="radio" name="q7" id="q7"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   @if ($record->diabetes_a1_c->q7 == "Yes")
                                                   checked="checked"
                                                   @else
                                                   @endif
                                                   @endif
                                                   value="Yes">
                                            <label>Yes</label>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q7')) error @endif">
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="q7" id="q7" value="No"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   @if ($record->diabetes_a1_c->q7 == "No")
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
                                            <input name="q7_a"
                                                   @if(count($record->diabetes_a1_c) > 0)
                                                   value="{{ $record->diabetes_a1_c->q7_a }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="field @if($errors->has('q9')) error @endif">
                                <label for="q9" style="font-size: 14px;">8) What was the result of the outreach?</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="q9">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">
                                        @if(count($record->diabetes_a1_c) != 0)
                                            @if ($record->diabetes_a1_c->q9 == "Patient Transferred")
                                                {{ $record->diabetes_a1_c->q9 }}
                                            @elseif ($record->diabetes_a1_c->q9 == "Scheduled Appointment")
                                                {{ $record->diabetes_a1_c->q9 }}
                                            @elseif ($record->diabetes_a1_c->q9 == "Patient Refused")
                                                {{ $record->diabetes_a1_c->q9 }}
                                            @elseif ($record->diabetes_a1_c->q9 == "NPC")
                                                {{ $record->diabetes_a1_c->q9 }}
                                            @elseif ($record->diabetes_a1_c->q9 == "Pending")
                                                {{ $record->diabetes_a1_c->q9 }}
                                            @elseif ($record->diabetes_a1_c->q9 == "Call back")
                                                {{ $record->diabetes_a1_c->q9 }}
                                            @elseif ($record->diabetes_a1_c->q9 == "Voicemail")
                                                {{ $record->diabetes_a1_c->q9 }}
                                            @elseif ($record->diabetes_a1_c->q9 == "No answer")
                                                {{ $record->diabetes_a1_c->q9 }}
                                            @elseif ($record->diabetes_a1_c->q9 == "Disconnected Number")
                                                {{ $record->diabetes_a1_c->q9 }}
                                            @elseif ($record->diabetes_a1_c->q9 == "Do Not Call")
                                                {{ $record->diabetes_a1_c->q9 }}
                                            @elseif ($record->diabetes_a1_c->q9 == "Privacy Manager")
                                                {{ $record->diabetes_a1_c->q9 }}
                                            @elseif ($record->diabetes_a1_c->q9 == "Deceased")
                                                {{ $record->diabetes_a1_c->q9 }}
                                            @elseif ($record->diabetes_a1_c->q9 == "Different PCP")
                                                {{ $record->diabetes_a1_c->q9 }}
                                            @elseif ($record->diabetes_a1_c->q9 == "Up-to-date")
                                                {{ $record->diabetes_a1_c->q9 }}
                                            @elseif ($record->diabetes_a1_c->q9 == "Done Outside SMG")
                                                {{ $record->diabetes_a1_c->q9 }}
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
                                        <div class="item" data-value="Deceased">Deceased</div>
                                        <div class="item" data-value="Different PCP">Different PCP</div>
                                        <div class="item" data-value="Up-to-date">Up-to-date</div>
                                        <div class="item" data-value="Done Outside SMG">Done Outside SMG</div>
                                    </div>
                                </div>

                                <div class="disabled field @if($errors->has('q11')) error @endif">
                                    <label style="font-size: 16px;">9) Closed loop: If you made an appt., was the appt. kept?  If you tasked the office, did the office act on the task & close the task?  Did the you update the QM tab for the patient? </label>
                                    <div class="ui large left icon input">
                                        <input type="text" name="q11"
                                               @if(count($record->diabetes_a1_c) > 0)
                                               value="{{ $record->diabetes_a1_c->q11 }}"
                                               @else
                                               value=""
                                                @endif
                                        >
                                        <i class="info icon"></i>
                                    </div>
                                </div>

                                <div class="ui divider"></div>

                                <div class="actions">
                                    <button class="ui button primary fluid disabled">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="three wide column">
                    @include('util.form_right_sidebar')
                </div>
            </div>
        </div>
    @stop
@endif

@section('scripts')
    @include('util.form_scripts')
@stop