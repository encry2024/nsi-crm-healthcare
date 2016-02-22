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

                                        <div class="field @if($errors->has('q1')) error @endif">
                                            <label for="q1" style="font-size: 16px;">1) History of Hypertension?</label>
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
                                            <label style="font-size: 16px;">2) Most Recent BP reading</label>
                                            <div class="ui big left icon input">
                                                <input type="text" name="q2" >
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q3')) error @endif">
                                            <label for="q3" style="font-size: 16px;">3) Blood pressure < 140/90</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q3" id="q3" checked="checked" value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q3')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q3" id="q3" value="No">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q4')) error @endif">
                                            <label for="q4" style="font-size: 16px;">4) If out of range, was patient outreach made?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q4" id="q4" checked="checked" value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q4')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q4" id="q4" value="No">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <label style="font-size: 16px;">5) Acation taken?</label>
                                            <div class="ui big left icon input">
                                                <input type="text" name="q5" >
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q6')) error @endif">
                                            <label for="q6" style="font-size: 16px;">6) Closed loop appt made or task acted on/closed by office?</label>
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