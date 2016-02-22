<div class="ui secondary raised orange segment" style="width: 104.05%;">
    <form class="" action="{{ route('record.update', $record->id) }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PATCH">

        <div class="ui form">
            <div class="field @if($errors->has('first_name')) error @endif">
                <label>First name <i class="asterisk icon"></i> </label>
                <div class="ui small left icon input">
                    <input type="text" name="first_name" value="{{ $record->first_name }}" placeholder="First name" value="{{ Input::old('first_name') }}">
                    <i class="info icon"></i>
                </div>
            </div>

            <div class="field @if($errors->has('last_name')) error @endif">
                <label>Last name <i class="asterisk icon"></i> </label>
                <div class="ui small left icon input">
                    <input type="text" name="last_name" value="{{ $record->last_name }}" placeholder="Last name" value="{{ Input::old('last_name') }}">
                    <i class="info icon"></i>
                </div>
            </div>

            <div class="field @if($errors->has('btn')) error @endif">
                <label>BTN/Phone Number <i class="asterisk icon"></i> </label>
                <div class="ui small left icon input">
                    <input type="text" name="btn" value="{{ $record->btn }}" placeholder="BTN/Phone Number" value="{{ Input::old('btn') }}">
                    <i class="phone icon"></i>
                </div>
            </div>

            <div class="field @if($errors->has('mrn')) error @endif">
                <label>Medical Record Number <i class="asterisk icon"></i> </label>
                <div class="ui small left icon input">
                    <input type="text" name="mrn" value="{{ $record->mrn }}" placeholder="Medical Record Number" readonly>
                    <i class="file text outline icon"></i>
                </div>
            </div>

            <div class="field @if($errors->has('insurance')) error @endif">
                <label>Insurance <i class="asterisk icon"></i> </label>
                <div class="ui small left icon input">
                    <input type="text" name="insurance" value="{{ $record->insurance }}" placeholder="Insurance">
                    <i class="file text outline icon"></i>
                </div>
            </div>

            <div class="field @if($errors->has('pcp')) error @endif">
                <label>PCP <i class="asterisk icon"></i> </label>
                <div class="ui small left icon input">
                    <input type="text" name="pcp" value="{{ $record->pcp }}" placeholder="pcp">
                    <i class="file text outline icon"></i>
                </div>
            </div>

            <div class="field @if($errors->has('date_of_birth')) error @endif">
                <label>Date of Birth <i class="asterisk icon"></i> </label>
                <div class="ui small left icon input">
                    <input name="date_of_birth" value="{{ date('F d, Y', strtotime($record->date_of_birth)) }}" placeholder="Date of Birth" id="dob">
                    <i class="calendar icon"></i>
                </div>
            </div>

            <div class="field">
                <label>Call Disposition <i class="asterisk icon"></i> </label>
                <div class="ui selection dropdown">
                    <input type="hidden" name="disposition">
                    <i class="dropdown icon"></i>
                    <div class="default text">Call Disposition</div>
                    <div class="menu">
                        @foreach ($dispositions as $disposition)
                            <div class="item" data-value="{{ $disposition->id }}">{{ $disposition->name }}</div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="field @if($errors->has('call_notes')) error @endif">
                <label>Call Note <i class="asterisk icon"></i> </label>
                <div class="ui small left icon input">
                    <textarea name="call_notes">{{ $record->call_notes }}</textarea>
                    <i class="pencil icon"></i>
                </div>
            </div>

            <button class="ui button fluid">Update and Dispose</button>
        </div>

    </form>
</div>