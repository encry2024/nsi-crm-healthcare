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
                                        Colon Cancer Screening
                                    </div>
                                </h2>
                            </div>

                            <div class="row">
                                <div class="ui divider"></div>
                            </div>

                            {{--@if (count($record->colon_cancer_screening) == 0)
                                {{ Input::old('q1') }}
                            @else
                                {{ $record->colon_cancer_screening->q1 }}
                            @endif--}}

                            <div class="row">
                                <div class="ui basic segment">
                                    <form method="POST" action="{{ route('submit_colon_cancer_screening', $record->id) }}" class="ui form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="field @if($errors->has('q1')) error @endif ">
                                            <label style="font-size: 16px;">1) Date of most Recent Colonoscopy/FOBT </label>
                                            <div class="ui big left icon input">
                                                <input name="q1" id="v_d" {!! count($record->colon_cancer_screening) == 0 ? 'value=""' : 'value="'.$record->colon_cancer_screening->q1.'"' !!} readonly>
                                                <i class="{!! count($record->colon_cancer_screening) == 0 ? 'calendar' : 'checkmark' !!} icon"></i>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q2')) error @endif">
                                            <label for="q2" style="font-size: 16px;">2) Screening up to date?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q2" id="q2" checked="{!! count($record->colon_cancer_screening) == 0 ? '' : ($record->colon_cancer_screening->q2 == 'Yes' ? 'checked' : '') !!}" value="Yes">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q2')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q2"{!! count($record->colon_cancer_screening) == 0 ? '' : ($record->colon_cancer_screening->q2 == 'Yes' ? 'checked' : '') !!} id="q2" value="No">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q3')) error @endif">
                                            <label for="q3" style="font-size: 16px;">3) If not, was outreach to patient made?</label>
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
                                            <label for="q4" style="font-size: 16px;">3) Action taken</label>
                                            <div class="ui big left input">
                                                <input name="q4" id="q4">
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <label for="q5" style="font-size: 16px;">5) Enter appt date if mammo or office appt made</label>
                                            <div class="ui big left input">
                                                <input name="q5" id="appt_date">
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q6')) error @endif">
                                            <label for="q6" style="font-size: 16px;">6 If done outside SMG, did you request document from outside provider or patient?</label>
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
                                            <label style="font-size: 16px;">7) Was the document received and recorded in EMR?</label>
                                            <div class="ui big left icon input">
                                                <input type="text" name="q7">
                                                <i class="info icon"></i>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q8')) error @endif">
                                            <label style="font-size: 16px;">8) Closed loop: appt kept or task acted on/closed by office?</label>
                                            <div class="ui big left icon input">
                                                <input type="text" name="q8" >
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