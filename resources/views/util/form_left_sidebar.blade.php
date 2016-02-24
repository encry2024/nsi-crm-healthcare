<div class="ui secondary raised orange segment" style="width: 104.05%;">
    <form class="" action="{{ route('record.update', $record->id) }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PATCH">

        <div class="ui form">

            <div class="field @if($errors->has('mrn')) error @endif">
                <label><i class="lock icon"></i> Med. Record Number </label>
                <div class="ui left icon input">
                    <input type="text" name="mrn" value="{{ $record->mrn }}" placeholder="Medical Record Number" readonly>
                    <i class="file text outline icon"></i>
                </div>
            </div>

            <div class="ui divider"></div>

            <div class="two fields">
                <div class="field @if($errors->has('first_name')) error @endif">
                    <label><i class="write icon"></i> First name</label>
                    <div class="ui small left icon input">
                        <input type="text" name="first_name" value="{{ $record->first_name }}" placeholder="First name" value="{{ Input::old('first_name') }}">
                        <i class="info icon"></i>
                    </div>
                </div>

                <div class="field @if($errors->has('last_name')) error @endif">
                    <label><i class="write icon"></i> Last name</label>
                    <div class="ui small left icon input">
                        <input type="text" name="last_name" value="{{ $record->last_name }}" placeholder="Last name" value="{{ Input::old('last_name') }}">
                        <i class="info icon"></i>
                    </div>
                </div>
            </div>

            <div class="field @if($errors->has('gender')) error @endif">
                <label><i class="write icon"></i> Gender </label>
                <select class="ui dropdown">
                    <option value="">Gender</option>
                    <option {{ $record->gender =='M' ? 'selected':'' }} value="M">Male</option>
                    <option {{ $record->gender =='F' ? 'selected':'' }} value="F">Female</option>
                </select>
            </div>

            <div class="two fields">
                <div class="field @if($errors->has('btn')) error @endif">
                    <label><i class="write icon"></i> Phone Number </label>
                    <div class="ui left icon input">
                        <input type="text" name="btn" value="{{ $record->btn }}" placeholder="BTN/Phone Number" value="{{ Input::old('btn') }}">
                        <i class="phone icon"></i>
                    </div>
                </div>

                <div class="field @if($errors->has('rn')) error @endif">
                    <label><i class="write icon"></i> RN </label>
                    <div class="ui left icon input">
                        <input type="text" name="rn" value="{{ $record->rn }}" placeholder="Name of Care Innovations - RN" value="{{ Input::old('rn') }}">
                        <i class="phone icon"></i>
                    </div>
                </div>
            </div>

            <div class="two fields">
                <div class="field @if($errors->has('insurance')) error @endif">
                    <label><i class="write icon"></i> Insurance </label>
                    <div class="ui small left icon input">
                        <input type="text" name="insurance" value="{{ $record->insurance }}" placeholder="Insurance">
                        <i class="file text outline icon"></i>
                    </div>
                </div>

                <div class="field @if($errors->has('pcp')) error @endif">
                    <label><i class="write icon"></i> PCP </label>
                    <div class="ui small left icon input">
                        <input type="text" name="pcp" value="{{ $record->pcp }}" placeholder="pcp">
                        <i class="file text outline icon"></i>
                    </div>
                </div>
            </div>

            <div class="field @if($errors->has('date_of_birth')) error @endif">
                <label><i class="write icon"></i> Date of Birth </label>
                <div class="ui small left icon input">
                    <input name="date_of_birth" value="{{ date('F d, Y', strtotime($record->date_of_birth)) }}" placeholder="Date of Birth" id="dob" readonly>
                    <i class="calendar icon"></i>
                </div>
            </div>

            <div class="field">
                <label><i class="write icon"></i> Call Disposition </label>
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
                <label><i class="write icon"></i> Call Note </label>
                <div class="ui small left icon input">
                    <textarea name="call_notes">{{ $record->call_notes }}</textarea>
                    <i class="pencil icon"></i>
                </div>
            </div>

            <button class="ui button fluid">Update and Dispose</button>
        </div>

    </form>
</div>