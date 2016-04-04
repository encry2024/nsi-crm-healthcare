<div class="ui secondary raised orange segment">
    <form class="ui relaxed padded stackable form" action="{{ route('record.update', $record->id) }}" method="POST">
        <div class="ui container">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">

            <div class="field @if($errors->has('patient_id')) error @endif">
                <label><i class="lock icon"></i> Patient ID </label>
                <div class="ui small left fluid input">
                    <input type="text" name="patient_id" value="{{ $record->patient_id }}" readonly>
                </div>
            </div>

            <div class="field">
                <label><i class="lock icon"></i> Patient Name</label>
                <div class="ui left input">
                    <input type="text" name="patient_name" value="{{ $record->patient_name }}" readonly>
                </div>
            </div>

            <div class="field @if($errors->has('patient_home_number')) error @endif">
                <label><i class="lock icon"></i> Name</label>
                <div class="ui small left input">
                    <input type="text" name="patient_home_number" value="{{ $record->patient_home_number }}" placeholder="Patient Home Number" value="{{ Input::old('patient_home_number') }}">
                </div>
            </div>

            <div class="field @if($errors->has('patient_mobile_no')) error @endif">
                <label><i class="lock icon"></i> Patient Mobile Number</label>
                <div class="ui small left input">
                    <input type="text" name="patient_mobile_no" value="{{ $record->patient_mobile_no }}" placeholder="Patient Mobile Number" value="{{ Input::old('patient_mobile_no') }}">
                </div>
            </div>


            <div class="field @if($errors->has('patient_work_phone')) error @endif">
                <label><i class="lock icon"></i> Patient Work Phone </label>
                <div class="ui small left input">
                    <input type="text" name="patient_work_phone" value="{{ $record->patient_work_phone }}" placeholder="Patient Work Phone" value="{{ Input::old('patient_work_phone') }}">
                </div>
            </div>

            <div class="field @if($errors->has('appt_note')) error @endif">
                <label><i class="write icon"></i> Appt Note </label>
                <div class="ui small left input">
                    <textarea name="appt_note" value="{{ $record->appt_note }}" placeholder="Appt. Note" id="appt_note"></textarea>
                </div>
            </div>


            <div class="field @if($errors->has('appt_type')) error @endif">
                <label><i class="lock icon"></i> Appt Type </label>
                <div class="ui left input">
                    <input type="text" name="appt_type" value="{{ $record->appt_type }}" placeholder="Appt Type" value="{{ Input::old('appt_type') }}">
                </div>
            </div>

            <div class="field @if($errors->has('date_reviewed')) error @endif">
                <label><i class="lock icon"></i> Date Reviewed </label>
                <div class="ui left input">
                    <input type="text" name="date_reviewed" value="{{ $record->date_reviewed }}" placeholder="Date Reviewed" value="{{ Input::old('date_reviewed') }}">
                </div>
            </div>

            <div class="field @if($errors->has('notes')) error @endif">
                <label><i class="write icon"></i> Notes </label>
                <div class="ui small left input">
                    <textarea type="text" name="notes" value="{{ $record->notes }}" placeholder="Notes"></textarea>
                </div>
            </div>

            <button class="ui button fluid">Update and Dispose</button>
        </div>
    </form>
</div>