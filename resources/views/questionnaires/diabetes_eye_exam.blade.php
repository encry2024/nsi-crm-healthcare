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
                        <div class="twelve wide stretched column">
                            <div class="row">
                                <h2 class="header">
                                    <div class="content">
                                        Diabetes: A1C
                                    </div>
                                </h2>
                            </div>

                            <div class="row">
                                <div class="ui divider"></div>
                            </div>

                            <div class="row">
                                <div class="ui basic segment">
                                    <form method="POST" action="{{ route('submit_diabetes_eye_exam', $record->id) }}" class="ui form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="field @if($errors->has('q1')) error @endif">
                                            <label for="q1" style="font-size: 16px;">1) History of diabetes?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q1" id="q1" checked="checked" value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q1')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q1" id="q1" value="No">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q2')) error @endif">
                                            <label for="q2" style="font-size: 16px;">2) Date of recent PCP OV July-Dec 2015</label>
                                            <div class="ui big left icon input">
                                                <input name="q2" id="pcp_ov">
                                                <i class="calendar icon"></i>
                                            </div>

                                        </div>

                                        <div class="field @if($errors->has('q3')) error @endif">
                                            <label for="q3" style="font-size: 16px;">3) Date of most recent A1C</label>
                                            <div class="ui big left icon input">
                                                <i class="calendar icon"></i>
                                                <input name="q3" id="a1c">
                                            </div>

                                        </div>

                                        <div class="field @if($errors->has('q4')) error @endif">
                                            <label style="font-size: 16px;">4)  A1c Value</label>
                                            <div class="ui big left icon input">
                                                <input type="text" name="q4" >
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <label for="q5" style="font-size: 16px;">5) A1c Under Control <= 9</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q5" id="q5" checked="checked" value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q5" id="q5" value="No">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q6')) error @endif">
                                            <label for="q6" style="font-size: 16px;">6) Most recent A1c < 8?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q6" id="q6" checked="checked" value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q6')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q6" id="q6" value="No">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q7')) error @endif">
                                            <label for="q7" style="font-size: 16px;">7) If out of range or not done in past 6 months, was outreach made?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q7" id="q7" checked="checked" value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q7')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q7" id="q7" value="No">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q8')) error @endif">
                                            <label for="q8" style="font-size: 16px;">8) Lab ordered?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q8" id="q8" checked="checked" value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q8')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q8" id="q8" value="No">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q9')) error @endif">
                                            <label style="font-size: 16px;">9) Action taken?</label>
                                            <div class="ui big left icon input">
                                                <input type="text" name="q9" >
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q10')) error @endif">
                                            <label for="q10" style="font-size: 16px;">10) Closed loop: lab done?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q10" id="q10" checked="checked" value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q10')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q10" id="q10" value="No">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q11')) error @endif">
                                            <label for="q11" style="font-size: 16px;">11) Closed loop: appt kept or task acted on/closed by office?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q11" id="q11" checked="checked" value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q11')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q11" id="q11" value="No">
                                                <label>No</label>
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