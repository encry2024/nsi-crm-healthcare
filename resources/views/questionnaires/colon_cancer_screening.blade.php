@extends('template')


@section('header')
    @include('util.header')
@stop

@if ($record->user_id == Auth::user()->id)
    @section('content')
        <div class="ui padded grid">
            @include('util.messages')
            <div class="ui doubling stackable three column row" >
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
                            <form method="POST" action="{{ route('submit_colon_cancer_screening', $record->id) }}" class="ui form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="field @if($errors->has('q1')) error @endif ">
                                    <label style="font-size: 14px;">1) Date of most Recent Colonoscopy/FOBT </label>
                                    <div class="two fields">
                                        <div class="field">
                                            <div class="ui large left icon input">
                                                <input name="q1" id="v_d"
                                                   @if(count($record->colon_cancer_screening) > 0)
                                                   value="{{ $record->colon_cancer_screening->q1 }}"
                                                   @else
                                                   value=""
                                                   @endif
                                                   readonly
                                                >
                                                <i class="calendar icon"></i>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="ui large left input">
                                                <input name="q1_a"
                                                   @if(count($record->colon_cancer_screening) > 0)
                                                   value="{{ $record->colon_cancer_screening->q1_a }}"
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
                                        <div class="field @if($errors->has('q2')) error @endif">
                                            <label for="q2" style="font-size: 14px;">2) Is this a date between date range:  1/1/2006- current date?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q2" id="q2"  value="Yes"
                                                @if(count($record->colon_cancer_screening) > 0)
                                                    @if ($record->colon_cancer_screening->q2 == "Yes")
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
                                                @if(count($record->colon_cancer_screening) > 0)
                                                    @if ($record->colon_cancer_screening->q2 == "No")
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
                                                <input name="q2_a"
                                                       @if(count($record->colon_cancer_screening) > 0)
                                                       value="{{ $record->colon_cancer_screening->q2_a }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grouped fields">
                                        <div class="field @if($errors->has('q3')) error @endif">
                                            <label for="q3" style="font-size: 14px;">3) If the date is NOT between date range, was outreach to patient made?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q3" id="q3" value="Yes"
                                                @if(count($record->colon_cancer_screening) > 0)
                                                    @if ($record->colon_cancer_screening->q3 == "Yes")
                                                    checked="checked"
                                                    @else
                                                    @endif
                                                @endif
                                                >
                                                <label>Yes</label>
                                            </div>
                                        </div>
                                        <div class="field @if($errors->has('q3')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q3" id="q3" value="No"
                                                @if(count($record->colon_cancer_screening) > 0)
                                                    @if ($record->colon_cancer_screening->q3 == "No")
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
                                                <input name="q3_a"
                                                       @if(count($record->colon_cancer_screening) > 0)
                                                       value="{{ $record->colon_cancer_screening->q3_a }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('q4')) error @endif">
                                    <label for="q4" style="font-size: 14px;">4) What was the result of the outreach?</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="q4">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">
                                            @if(count($record->colon_cancer_screening) != 0)
                                                @if ($record->colon_cancer_screening->q4 == "Patient Transferred")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Scheduled Appointment")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Patient Refused")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "NPC")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Pending")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Call back")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Voicemail")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "No answer")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Disconnected Number")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Do Not Call")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Privacy Manager")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Deceased")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Different PCP")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Up-to-date")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Done Outside SMG")
                                                    {{ $record->colon_cancer_screening->q4 }}
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
                                    </div>
                                    <div class="field">
                                        <div class="ui large left input">
                                            <input name="q4_a" id="q4_a"
                                                   @if(count($record->colon_cancer_screening) > 0)
                                                   value="{{ $record->colon_cancer_screening->q4_a }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
                                        </div>
                                    </div>

                                <div class="grouped fields">
                                    <div class="field @if($errors->has('q5')) error @endif">
                                        <label for="q5" style="font-size: 14px;">5) If done outside SMG, did you request document from outside provider or patient?</label>
                                        <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                            <input type="radio" name="q5" id="q5"
                                                   @if(count($record->colon_cancer_screening) > 0)
                                                   @if ($record->colon_cancer_screening->q5 == "Yes")
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
                                                @if(count($record->colon_cancer_screening) > 0)
                                                    @if ($record->colon_cancer_screening->q5 == "No")
                                                    checked="checked"
                                                    @else
                                                    @endif
                                                @endif
                                            value="No">
                                            <label>No</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="field @if($errors->has('q6')) error @endif">
                                    <label style="font-size: 14px;">6) Was the document received and recorded in EMR?</label>
                                    <div class="ui large left icon input">
                                        <input type="text" name="q6"
                                            @if(count($record->colon_cancer_screening) > 0)
                                                 value="{{ $record->colon_cancer_screening->q6 }}"
                                            @else
                                                 value=""
                                            @endif
                                        >
                                        <i class="info icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('q7')) error @endif">
                                    <label style="font-size: 14px;">7) Closed loop: If you made an appt., was the appt. kept?  If you tasked the office, did the office act on the task & close the task?  Did the you update the QM tab for the patient? </label>
                                    <div class="ui large left icon input">
                                        <input type="text" name="q7"
                                            @if(count($record->colon_cancer_screening) > 0)
                                                value="{{ $record->colon_cancer_screening->q7 }}"
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
                <div class="twelve wide column">
                    @include('util.page_title')
                    <div class="row">
                        <div class="ui divider"></div>
                    </div>

                    <div class="row">
                        <div class="ui basic segment">
                            <form method="POST" action="{{ route('submit_colon_cancer_screening', $record->id) }}" class="ui form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="disabled field @if($errors->has('q1')) error @endif ">
                                    <label style="font-size: 14px;">1) Date of most Recent Colonoscopy/FOBT </label>
                                    <div class="two fields">
                                        <div class="field">
                                            <div class="ui large left icon input">
                                                <input name="q1" id="v_d"
                                                       @if(count($record->colon_cancer_screening) > 0)
                                                       value="{{ $record->colon_cancer_screening->q1 }}"
                                                       @else
                                                       value=""
                                                       @endif
                                                       readonly
                                                >
                                                <i class="calendar icon"></i>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="ui large left input">
                                                <input name="q1_a"
                                                       @if(count($record->colon_cancer_screening) > 0)
                                                       value="{{ $record->colon_cancer_screening->q1_a }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="two disabled fields">
                                    <div class="grouped fields">
                                        <div class="field @if($errors->has('q2')) error @endif">
                                            <label for="q2" style="font-size: 14px;">2) Is this a date between date range:  1/1/2006- current date?</label>
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q2" id="q2"  value="Yes"
                                                       @if(count($record->colon_cancer_screening) > 0)
                                                       @if ($record->colon_cancer_screening->q2 == "Yes")
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
                                                       @if(count($record->colon_cancer_screening) > 0)
                                                       @if ($record->colon_cancer_screening->q2 == "No")
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
                                                <input name="q2_a"
                                                       @if(count($record->colon_cancer_screening) > 0)
                                                       value="{{ $record->colon_cancer_screening->q2_a }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grouped fields">
                                        <div class="field @if($errors->has('q3')) error @endif">
                                            <label for="q3" style="font-size: 14px;">3) If the date is NOT between date range, was outreach to patient made?</label>
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q3" id="q3" value="Yes"
                                                       @if(count($record->colon_cancer_screening) > 0)
                                                       @if ($record->colon_cancer_screening->q3 == "Yes")
                                                       checked="checked"
                                                @else
                                                        @endif
                                                        @endif
                                                >
                                                <label>Yes</label>
                                            </div>
                                        </div>
                                        <div class="field @if($errors->has('q3')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q3" id="q3" value="No"
                                                       @if(count($record->colon_cancer_screening) > 0)
                                                       @if ($record->colon_cancer_screening->q3 == "No")
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
                                                <input name="q3_a"
                                                       @if(count($record->colon_cancer_screening) > 0)
                                                       value="{{ $record->colon_cancer_screening->q3_a }}"
                                                       @else
                                                       value=""
                                                        @endif
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="disabled field @if($errors->has('q4')) error @endif">
                                    <label for="q4" style="font-size: 14px;">4) What was the result of the outreach?</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="q4">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">
                                            @if(count($record->colon_cancer_screening) != 0)
                                                @if ($record->colon_cancer_screening->q4 == "Patient Transferred")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Scheduled Appointment")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Patient Refused")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "NPC")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Pending")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Call back")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Voicemail")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "No answer")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Disconnected Number")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Do Not Call")
                                                    {{ $record->colon_cancer_screening->q4 }}
                                                @elseif ($record->colon_cancer_screening->q4 == "Privacy Manager")
                                                    {{ $record->colon_cancer_screening->q4 }}
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
                                </div>

                                <div class="disabled field">
                                    <div class="ui large left input">
                                        <input name="q4_a" id="q4_a"
                                               @if(count($record->colon_cancer_screening) > 0)
                                               value="{{ $record->colon_cancer_screening->q4_a }}"
                                               @else
                                               value=""
                                                @endif
                                        >
                                    </div>
                                </div>

                                <div class="grouped disabled fields">
                                    <div class="field @if($errors->has('q5')) error @endif">
                                        <label for="q5" style="font-size: 14px;">5) If done outside SMG, did you request document from outside provider or patient?</label>
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="q5" id="q5"
                                                   @if(count($record->colon_cancer_screening) > 0)
                                                   @if ($record->colon_cancer_screening->q5 == "Yes")
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
                                                   @if(count($record->colon_cancer_screening) > 0)
                                                   @if ($record->colon_cancer_screening->q5 == "No")
                                                   checked="checked"
                                                   @else
                                                   @endif
                                                   @endif
                                                   value="No">
                                            <label>No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="two disabled fields">
                                    <div class="field @if($errors->has('q6')) error @endif">
                                        <label style="font-size: 14px;">6) Was the document received and recorded in EMR?</label>
                                        <div class="ui large left icon input">
                                            <input type="text" name="q6"
                                                   @if(count($record->colon_cancer_screening) > 0)
                                                   value="{{ $record->colon_cancer_screening->q6 }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
                                            <i class="info icon"></i>
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q7')) error @endif">
                                        <label style="font-size: 14px;">7) Closed loop: If you made an appt., was the appt. kept?  If you tasked the office, did the office act on the task & close the task?  Did the you update the QM tab for the patient? </label>
                                        <div class="ui large left icon input">
                                            <input type="text" name="q7"
                                                   @if(count($record->colon_cancer_screening) > 0)
                                                   value="{{ $record->colon_cancer_screening->q7 }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
                                            <i class="info icon"></i>
                                        </div>
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