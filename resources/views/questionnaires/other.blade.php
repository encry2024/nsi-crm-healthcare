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
                                        Others
                                    </div>
                                </h2>
                            </div>

                            <div class="row">
                                <div class="ui divider"></div>
                            </div>

                            <div class="row">
                                <div class="ui basic segment">
                                    <form method="POST" action="{{ route('submit_others', $record->id) }}" class="ui form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="field @if($errors->has('q1')) error @endif">
                                            <label for="q1" style="font-size: 16px;">1) Date of Prev Sched  OV for non chronic disease</label>
                                            <div class="ui big left icon input">
                                                <input name="q1" id="prev_sched">
                                                <i class="calendar icon"></i>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q2')) error @endif">
                                            <label style="font-size: 16px;">2) Status of OV for non chronic disease</label>
                                            <div class="ui big left icon input">
                                                <input type="text" name="q2" >
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q3')) error @endif">
                                            <label for="q3" style="font-size: 16px;">3) Date of 2nd Chart review (to check status of Prev. Sched. Appts)</label>
                                            <div class="ui big left icon input">
                                                <i class="calendar icon"></i>
                                                <input name="q3" id="prev_sched_appts">
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q4')) error @endif">
                                            <label style="font-size: 16px;">4) OV1 Appt. status for Current Month</label>
                                            <div class="ui big left icon input">
                                                <input type="text" name="q4" >
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <label for="q5" style="font-size: 16px;">5) Result of Call #1 or Patient Call Back - Was Lab appt. scheduled?</label>
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
                                            <label for="q6" style="font-size: 16px;">6) Result of Call #1 or Patient Call Back - Was OV appt. scheduled?</label>
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
                                            <label for="q7" style="font-size: 16px;">3) Date of PCP OV July-Dec</label>
                                            <div class="ui big left icon input">
                                                <i class="calendar icon"></i>
                                                <input name="q7" id="date_of_pcp_ov">
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q8')) error @endif">
                                            <label style="font-size: 16px;">8) Status of PCP OV for  July-Dec</label>
                                            <div class="ui big left icon input">
                                                <input type="text" name="q8" >
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q9')) error @endif">
                                            <label style="font-size: 16px;">9) If OV Not scheduled - select reason:</label>
                                            <div class="ui big left icon input">
                                                <input type="text" name="q9" >
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q10')) error @endif">
                                            <label style="font-size: 16px;">10) Final status of Care Coordinator Outreach </label>
                                            <div class="ui big left icon input">
                                                <input type="text" name="q10" >
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q11')) error @endif">
                                            <label style="font-size: 16px;">11) Additional Comments</label>
                                            <div class="ui big left icon input">
                                                <textarea type="text" name="q11" ></textarea>
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