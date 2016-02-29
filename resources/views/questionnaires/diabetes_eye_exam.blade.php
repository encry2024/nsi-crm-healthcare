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
                            <form method="POST" action="{{ route('submit_diabetes_eye_exam', $record->id) }}" class="ui form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <h2 class="header">
                                        <div class="content">
                                            Diabetes: Eye Exam
                                        </div>
                                    </h2>
                                </div>

                                <div class="row">
                                    <div class="ui divider"></div>
                                </div>

                                <div class="row">
                                    <div class="field @if($errors->has('q12')) error @endif">
                                        <label>1) What is the date of most recent Dilated Eye?</label>
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
                                    </div>

                                    <div class="field @if($errors->has('q16')) error @endif">
                                        <label>3)If the date is NOT between date range, was outreach to patient made?</label>
                                        <div class="ui left input">
                                            <input name="q16" id="q16"
                                                   @if(count($record->diabetes_eye_exam) > 0)
                                                   value="{{ $record->diabetes_eye_exam->q16 }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
                                        </div>
                                    </div>

                                    <div class="field @if($errors->has('q15')) error @endif">
                                        <label>4) What was the result of outreach?</label>
                                        <div class="ui left input">
                                            <input name="q15" id="q15"
                                                   @if(count($record->diabetes_eye_exam) > 0)
                                                   value="{{ $record->diabetes_eye_exam->q15 }}"
                                                   @else
                                                   value=""
                                                    @endif
                                            >
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

                                    <div class="grouped fields">
                                        <div class="field @if($errors->has('q11')) error @endif">
                                            <label>7) Closed loop: If you made an appt., was the appt. kept? If you tasked the office, did the office act on the task & close the task? Did you update the QM tab for the patient?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q11" id="q11"
                                                       @if(count($record->diabetes_eye_exam) > 0)
                                                       @if ($record->diabetes_eye_exam->q11 == "Yes")
                                                       checked="checked"
                                                       @else
                                                       @endif
                                                       @endif
                                                       value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q11')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q11" id="q11" value="No"
                                                       @if(count($record->diabetes_eye_exam) > 0)
                                                       @if ($record->diabetes_eye_exam->q11 == "No")
                                                       checked="checked"
                                                @else
                                                        @endif
                                                        @endif
                                                >
                                                <label>No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui basic segment">
                                    <div class="ui divider"></div>
                                    <div class="actions">
                                        <button class="ui button primary fluid">Submit</button>
                                    </div>
                                </div>
                            </form>
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
