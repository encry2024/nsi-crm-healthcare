<div class="ui top attached raised teal segment">
    <div class="ui top attached label">Basic Info</div>
    <div class="ui middle aligned divided list">
        <div class="item">
            <div class="right floated content">
                <span class="ui teal tiny header">{{ $record->name }}</span>
            </div>
            <div class="content">
                Name:
            </div>
        </div>
        <div class="item">
            <div class="right floated content">
                {{ $record->mrn }}
            </div>
            <div class="content">
                MRN:
            </div>
        </div>
        <div class="item">
            <div class="right floated content">
                {{ $record->btn }}
            </div>
            <div class="content">
                Phone:
            </div>
        </div>
        <div class="item">
            <div class="right floated content">
                {{ $record->gender }}
            </div>
            <div class="content">
                Gender:
            </div>
        </div>
        <div class="item">
            <div class="right floated content">
                {{ $record->date_of_birth }} / {{ $record->age }}
            </div>
            <div class="content">
                DOB / Age:
            </div>
        </div>
        <div class="item">
            <div class="right floated content">
                {{ $record->user->name }}
            </div>
            <div class="content">
                Assigned Agent:
            </div>
        </div>
    </div>
</div>

<div class="ui top attached raised blue segment">
    <div class="ui top attached label">Other Info</div>
    <div class="ui middle aligned divided list">
        @foreach($record->getCustomFields() as $column)
            <div class="item">
                <div class="right floated content">
                    {{ $record->custom()->$column }}
                </div>
                <div class="content">
                    {{ str_replace("_", " ", ucwords($column, "_")) }}
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="ui secondary raised orange segment">
    <form class="ui relaxed padded stackable form" action="{{ route('record.update', $record->id) }}" method="POST">
        <div class="ui container">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PATCH">

        <div class="field">
            <label><i class="write icon"></i> Call Disposition </label>
            <div class="ui fluid selection dropdown disposition">
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

        <div class="field @if($errors->has('date_of_birth')) error @endif">
            <label><i class="write icon"></i> Update Date and Time </label>
            <div class="ui small left icon input">

                <input name="update_timestamp" value="{{ $record->update_timestamp != NULL?date('F d, Y', strtotime($record->update_timestamp)):"" }}" placeholder="Update date and time" id="update_timestamp" readonly>
                <i class="calendar icon"></i>
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


<script>
    $('.disposition')
            .dropdown('set selected', {{ isset($record->getLastDisposition()->disposition_id)?$record->getLastDisposition()->disposition_id:0 }})
    ;
</script>