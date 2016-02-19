@extends('template')


@section('header')
    @include('util.header')
@stop


@section('content')
    <div class="ui centered grid">

        <div class="nine wide column">
            <div class="twelve wide column grid " >

                @if (count($errors) > 0)
                    <div class="ui negative message">
                        <i class="close icon"></i>
                        <div class="header">
                            User was not able to save because of the following reason(s):
                        </div>
                        <ul class="list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('message'))
                    <div class="ui success message">
                        <i class="close icon"></i>
                        <div class="ui header">
                            <i class="check circle icon"></i>
                            <div class="content">
                                {{ Session::get('message') }}
                            </div>
                        </div>
                    </div>
                @endif

                <br>
                <h3 class="ui header">
                    <i class="large icons">
                        <i class="book icon"></i>
                        <i class="corner add icon"></i>
                    </i>
                    <div class="content">
                        Create record
                    </div>
                    <div class="ui divider"></div>
                </h3>

                <div class="ui grid">
                    <div class="sixteen wide column">
                        <form class="" action="{{ route('record.store') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="ui form">
                                <div class="field @if($errors->has('first_name')) error @endif">
                                    <label>First name <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input type="text" name="first_name" placeholder="First name" value="{{ Input::old('first_name') }}">
                                        <i class="info icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('last_name')) error @endif">
                                    <label>Last name <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input type="text" name="last_name" placeholder="Last name" value="{{ Input::old('last_name') }}">
                                        <i class="info icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('btn')) error @endif">
                                    <label>BTN/Phone Number <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input type="text" name="btn" placeholder="BTN/Phone Number" value="{{ Input::old('btn') }}">
                                        <i class="phone icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('date_of_birth')) error @endif">
                                    <label>Date of Birth <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input name="date_of_birth" placeholder="Date of Birth" id="dob" onchange="_calculateAge()">
                                        <i class="calendar icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('age')) error @endif">
                                    <label>Age</label>
                                    <div class="ui left input">
                                        <input class="read-only" name="age" id="age" readonly>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('gender')) error @endif">
                                    <label>Gender <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input type="text" name="gender" placeholder="Gender" value="{{ Input::old('gender') }}">
                                        <i class="file text outline icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('reference_no')) error @endif">
                                    <label>Reference Number <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input type="text" name="reference_no" placeholder="Reference Number" value="{{ Input::old('btn') }}">
                                        <i class="file text outline icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('mrn')) error @endif">
                                    <label>Medical Record Number <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input type="text" value="{{ $mrn }}" name="mrn" placeholder="Medical Record Number" value="{{ Input::old('mrn') }}" readonly>
                                        <i class="file text outline icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('insurance')) error @endif">
                                    <label>Insurance <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input type="text" name="insurance" placeholder="Insurance" value="{{ Input::old('insurance') }}">
                                        <i class="file text outline icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('pcp')) error @endif">
                                    <label>PCP <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input type="text" name="pcp" placeholder="PCP" value="{{ Input::old('pcp') }}">
                                        <i class="file text outline icon"></i>
                                    </div>
                                </div>


                                <div class="field @if($errors->has('call_notes')) error @endif">
                                    <label>Call Note <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <textarea name="call_notes"></textarea>
                                        <i class="pencil icon"></i>
                                    </div>
                                </div>

                                <div class="ui buttons right floated">
                                    <a class="ui button negative" href="{{ route('/home') }}">Cancel</a>
                                    <div class="or"></div>
                                    <button class="ui positive button">Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    <script type="text/javascript">
        $("#dob").datepicker({
            format: 'MM dd, yyyy',
            autoclose: true
        });

        $('.dropdown').dropdown();

        $('.message .close').on('click', function()
        {
            $(this).closest('.message').transition('fade');
        });

        // Get age
        function _calculateAge() {
            var dob = document.getElementById('dob').value;
            var age = moment().diff(moment(dob, 'MMMM DD, YYYY'), 'years');

            if (age == "NaN") { document.getElementById('age').value = ""; }
            else { document.getElementById('age').value = age; }

            //document.getElementById('age').value = age;


        }

        document.getElementById('age').value = "";
    </script>
@stop
