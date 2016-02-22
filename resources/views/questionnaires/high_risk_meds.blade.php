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

                                        <div class="field @if($errors->has('q1')) error @endif">
                                            <label for="q1" style="font-size: 16px;">1) Is patient on High Risk Med?</label>
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

                                        <div class="field @if($errors->has('q2')) error @endif">
                                            <label for="q2" style="font-size: 16px;">2) If on High Risk Med, was Pharmacist tasked?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q2" id="q2"
                                                   @if(count($record->high_risk_meds) > 0)
                                                       @if ($record->high_risk_meds->q2 == "Yes")
                                                       checked="checked"
                                                       @else
                                                       @endif
                                                   @endif
                                                value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q2')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q2" id="q2" value="No"
                                                @if(count($record->high_risk_meds) > 0)
                                                    @if ($record->high_risk_meds->q2 == "No")
                                                    checked="checked"
                                                    @else
                                                    @endif
                                                @endif
                                                >
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q3')) error @endif">
                                            <label for="q3" style="font-size: 16px;">11) Was task acted on/closed by Pharmacist?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q3" id="q3"
                                                   @if(count($record->high_risk_meds) > 0)
                                                       @if ($record->high_risk_meds->q3 == "Yes")
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
                                                <input type="radio" name="q3" id="q3" value="No"
                                                @if(count($record->high_risk_meds) > 0)
                                                    @if ($record->high_risk_meds->q3 == "No")
                                                    checked="checked"
                                                    @else
                                                    @endif
                                                @endif
                                                >
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