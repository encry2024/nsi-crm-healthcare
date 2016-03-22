<div class="row">
    @if (Request::route()->getName() == 'record.show')
        <h2 class="ui left floated header">
            <div class="content">
                Demographics
            </div>
        </h2>
        <br>
    @elseif (Request::route()->getName() == 'bcs')
        <h2 class="ui left floated header">
            <div class="content">
                Breast Cancer Screening
            </div>
        </h2>

        <form action="{{ route('store_state', $record->id) }}" method="POST" name="update_state_form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="record_id" value="{{ $record->id }}">
            <input type="hidden" name="page_id" value="{{ \Illuminate\Support\Facades\Request::route()->getName() }}">
            <input type="hidden" name="page_name" value="Breast Cancer Screening">

            <div class="ui right floated small floating dropdown button task_button">
                <input type="hidden" name="task">
                <label class="text">
                @foreach($record->checklist as $record_checklist)
                    @if ($record_checklist->name == Request::route()->getName())
                        @if ($record_checklist->value != null)
                            {{ $record_checklist->value }}
                        @else
                            TASKS
                        @endif
                    @endif
                @endforeach
                </label>
                <div class="menu">
                    <div class="scrolling menu">
                        <div class="item" data-value="No Action">
                            No Action
                        </div>
                        <div class="item" data-value="Task Not Applicable">
                            Task Not Applicable
                        </div>
                        <div class="item" data-value="Outreach Pending">
                            Outreach Pending
                        </div>
                        <div class="item" data-value="Open Loop">
                            Open Loop
                        </div>
                        <div class="item" data-value="Closed Loop">
                            Closed Loop
                        </div>
                        <div class="item" data-value="For Confirmation">
                            For Confirmation
                        </div>
                        <div class="item" data-value="NPC Pending">
                            NPC Pending
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br><br>
    @elseif (Request::route()->getName() == 'ccs')
        <h2 class="ui left floated header">
            <div class="content">
                Colon Cancer Screening
            </div>
        </h2>

        <form action="{{ route('store_state', $record->id) }}" method="POST" name="update_state_form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="record_id" value="{{ $record->id }}">
            <input type="hidden" name="page_id" value="{{ \Illuminate\Support\Facades\Request::route()->getName() }}">
            <input type="hidden" name="page_name" value="Colon Cancer Screening">

            <div class="ui right floated small floating dropdown button task_button">
                <input type="hidden" name="task">
                <label class="text">
                @foreach($record->checklist as $record_checklist)
                    @if ($record_checklist->name == Request::route()->getName())
                        @if ($record_checklist->value != null)
                            {{ $record_checklist->value }}
                        @else
                            TASKS
                        @endif
                    @endif
                @endforeach
                </label>
                <div class="menu">
                    <div class="scrolling menu">
                        <div class="item" data-value="No Action">
                            No Action
                        </div>
                        <div class="item" data-value="Task Not Applicable">
                            Task Not Applicable
                        </div>
                        <div class="item" data-value="Outreach Pending">
                            Outreach Pending
                        </div>
                        <div class="item" data-value="Open Loop">
                            Open Loop
                        </div>
                        <div class="item" data-value="Closed Loop">
                            Closed Loop
                        </div>
                        <div class="item" data-value="For Confirmation">
                            For Confirmation
                        </div>
                        <div class="item" data-value="NPC Pending">
                            NPC Pending
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br><br>
    @elseif (Request::route()->getName() == 'fv')
        <h2 class="ui left floated header">
            <div class="content">
                Flu/Influenza Vaccine
            </div>
        </h2>

        <form action="{{ route('store_state', $record->id) }}" method="POST" name="update_state_form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="record_id" value="{{ $record->id }}">
            <input type="hidden" name="page_id" value="iv">
            <input type="hidden" name="page_name" value="Flu Vaccine">

            <div class="ui right floated small floating dropdown button task_button">
                <input type="hidden" name="task">
                @foreach($record->checklist as $record_checklist)
                    @if ($record_checklist->name == 'iv')
                    @if ($record_checklist->value != null)
                            {{ $record_checklist->value }}
                    @else
                        TASKS
                        @endif
                    @endif
                @endforeach
                <div class="menu">
                    <div class="scrolling menu">
                        <div class="item" data-value="No Action">
                            No Action
                        </div>
                        <div class="item" data-value="Task Not Applicable">
                            Task Not Applicable
                        </div>
                        <div class="active item">
                            Outreach Pending
                        </div>
                        <div class="item" data-value="Open Loop">
                            Open Loop
                        </div>
                        <div class="item" data-value="Closed Loop">
                            Closed Loop
                        </div>
                        <div class="item" data-value="For Confirmation">
                            For Confirmation
                        </div>
                        <div class="item" data-value="NPC Pending">
                            NPC Pending
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br><br>
    @elseif (Request::route()->getName() == 'pv')
        <h2 class="ui left floated header">
            <div class="content">
                Pneumonia Vaccine
            </div>
        </h2>

        <form action="{{ route('store_state', $record->id) }}" method="POST" name="update_state_form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="record_id" value="{{ $record->id }}">
            <input type="hidden" name="page_id" value="{{ \Illuminate\Support\Facades\Request::route()->getName() }}">
            <input type="hidden" name="page_name" value="Pneumonia Vaccine">

            <div class="ui right floated small floating dropdown button task_button">
                <input type="hidden" name="task">
                <label class="text">
                @foreach($record->checklist as $record_checklist)
                    @if ($record_checklist->name == Request::route()->getName())
                        @if ($record_checklist->value != null)
                            {{ $record_checklist->value }}
                        @else
                            TASKS
                        @endif
                    @endif
                @endforeach
                </label>
                <div class="menu">
                    <div class="scrolling menu">
                        <div class="item" data-value="No Action">
                            No Action
                        </div>
                        <div class="item" data-value="Task Not Applicable">
                            Task Not Applicable
                        </div>
                        <div class="item" data-value="Outreach Pending">
                            Outreach Pending
                        </div>
                        <div class="item" data-value="Open Loop">
                            Open Loop
                        </div>
                        <div class="item" data-value="Closed Loop">
                            Closed Loop
                        </div>
                        <div class="item" data-value="For Confirmation">
                            For Confirmation
                        </div>
                        <div class="item" data-value="NPC Pending">
                            NPC Pending
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br><br>
    @elseif (Request::route()->getName() == 'bp')
        <h2 class="ui left floated header">
            <div class="content">
                Blood Pressure
            </div>
        </h2>

        <form action="{{ route('store_state', $record->id) }}" method="POST" name="update_state_form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="record_id" value="{{ $record->id }}">
            <input type="hidden" name="page_id" value="chbp">
            <input type="hidden" name="page_name" value="Blood Pressure">

            <div class="ui right floated small floating dropdown button task_button">
                <input type="hidden" name="task">
                <label class="text">
                @foreach($record->checklist as $record_checklist)
                    @if ($record_checklist->name == 'chbp')
                        @if ($record_checklist->value != null)
                            {{ $record_checklist->value }}
                        @else
                            TASKS
                        @endif
                    @endif
                @endforeach
                </label>
                <div class="menu">
                    <div class="scrolling menu">
                        <div class="item" data-value="No Action">
                            No Action
                        </div>
                        <div class="item" data-value="Task Not Applicable">
                            Task Not Applicable
                        </div>
                        <div class="item" data-value="Outreach Pending">
                            Outreach Pending
                        </div>
                        <div class="item" data-value="Open Loop">
                            Open Loop
                        </div>
                        <div class="item" data-value="Closed Loop">
                            Closed Loop
                        </div>
                        <div class="item" data-value="For Confirmation">
                            For Confirmation
                        </div>
                        <div class="item" data-value="NPC Pending">
                            NPC Pending
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br><br>
    @elseif (Request::route()->getName() == 'da1c')
        <h2 class="ui left floated header">
            <div class="content">
                Diabetes: A1C
            </div>
        </h2>

        <form action="{{ route('store_state', $record->id) }}" method="POST" name="update_state_form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="record_id" value="{{ $record->id }}">
            <input type="hidden" name="page_id" value="hapc">
            <input type="hidden" name="page_name" value="Diabetes: A1C">

            <div class="ui right floated small floating dropdown button task_button">
                <input type="hidden" name="task">
                <label class="text">
                @foreach($record->checklist as $record_checklist)
                    @if ($record_checklist->name == 'hapc')
                        @if ($record_checklist->value != null)
                            {{ $record_checklist->value }}
                        @else
                            TASKS
                        @endif
                    @endif
                @endforeach
                </label>
                <div class="menu">
                    <div class="scrolling menu">
                        <div class="item" data-value="No Action">
                            No Action
                        </div>
                        <div class="item" data-value="Task Not Applicable">
                            Task Not Applicable
                        </div>
                        <div class="item" data-value="Outreach Pending">
                            Outreach Pending
                        </div>
                        <div class="item" data-value="Open Loop">
                            Open Loop
                        </div>
                        <div class="item" data-value="Closed Loop">
                            Closed Loop
                        </div>
                        <div class="item" data-value="For Confirmation">
                            For Confirmation
                        </div>
                        <div class="item" data-value="NPC Pending">
                            NPC Pending
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br><br>
    @elseif (Request::route()->getName() == 'dee')
        <h2 class="ui left floated header">
            <div class="content">
                Diabetes: Eye Exam
            </div>
        </h2>

        <form action="{{ route('store_state', $record->id) }}" method="POST" name="update_state_form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="record_id" value="{{ $record->id }}">
            <input type="hidden" name="page_id" value="{{ \Illuminate\Support\Facades\Request::route()->getName() }}">
            <input type="hidden" name="page_name" value="Diabetes: Eye Exam">

            <div class="ui right floated small floating dropdown button task_button">
                <input type="hidden" name="task">
                <label class="text">
                @foreach($record->checklist as $record_checklist)
                    @if ($record_checklist->name == Request::route()->getName())
                        @if ($record_checklist->value != null)
                            {{ $record_checklist->value }}
                        @else
                            TASKS
                        @endif
                    @endif
                @endforeach
                </label>
                <div class="menu">
                    <div class="scrolling menu">
                        <div class="item" data-value="No Action">
                            No Action
                        </div>
                        <div class="item" data-value="Task Not Applicable">
                            Task Not Applicable
                        </div>
                        <div class="item" data-value="Outreach Pending">
                            Outreach Pending
                        </div>
                        <div class="item" data-value="Open Loop">
                            Open Loop
                        </div>
                        <div class="item" data-value="Closed Loop">
                            Closed Loop
                        </div>
                        <div class="item" data-value="For Confirmation">
                            For Confirmation
                        </div>
                        <div class="item" data-value="NPC Pending">
                            NPC Pending
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br><br>
    @elseif (Request::route()->getName() == 'hrm')
        <h2 class="ui left floated header">
            <div class="content">
                High Risk Meds
            </div>
        </h2>

        <form action="{{ route('store_state', $record->id) }}" method="POST" name="update_state_form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="record_id" value="{{ $record->id }}">
            <input type="hidden" name="page_id" value="{{ \Illuminate\Support\Facades\Request::route()->getName() }}">
            <input type="hidden" name="page_name" value="High Risk Meds">

            <div class="ui right floated small floating dropdown button task_button">
                <input type="hidden" name="task">
                <label class="text">
                @foreach($record->checklist as $record_checklist)
                    @if ($record_checklist->name == Request::route()->getName())
                        @if ($record_checklist->value != null)
                            {{ $record_checklist->value }}
                        @else
                            TASKS
                        @endif
                    @endif
                @endforeach
                </label>
                <div class="menu">
                    <div class="scrolling menu">
                        <div class="item" data-value="No Action">
                            No Action
                        </div>
                        <div class="item" data-value="Task Not Applicable">
                            Task Not Applicable
                        </div>
                        <div class="item" data-value="Outreach Pending">
                            Outreach Pending
                        </div>
                        <div class="item" data-value="Open Loop">
                            Open Loop
                        </div>
                        <div class="item" data-value="Closed Loop">
                            Closed Loop
                        </div>
                        <div class="item" data-value="For Confirmation">
                            For Confirmation
                        </div>
                        <div class="item" data-value="NPC Pending">
                            NPC Pending
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br><br>
    @elseif (Request::route()->getName() == 'o')
        <h2 class="ui left floated header">
            <div class="content">
                Others
            </div>
        </h2>
        <br><br>
    @endif
</div>
