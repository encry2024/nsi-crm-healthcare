<html>
    <head>
        <meta charset="UTF-8">
        <title>NSI :: CRM Healthcare</title>
        <script src="{{ URL::to('/') }}/semantic/dist/jquery.min.js"></script>
        <script src="{{ URL::to('/') }}/semantic/dist/semantic.min.js"></script>
        <script src="{{ URL::to('/') }}/semantic/dist/components/search.js"></script>
        <link rel="stylesheet" href="{{ URL::to('/') }}/semantic/dist/semantic.css">
        <link rel="stylesheet" href="{{ URL::to('/') }}/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.css">
        <link rel="stylesheet" href="{{ URL::to('/') }}/crm_healthcare_css/crm_healthcare.css">

        @yield('header')
    </head>
    <body>
        <script src="{{ URL::to('/') }}/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ URL::to('/') }}/semantic/dist/momentjs.js"></script>

        @yield('content')
        <div class="ui dimmer">
            <div class="content">
                <div class="center">
                    <h2 class="ui inverted icon header">
                        <i class="coffee icon"></i>
                        You are now on break
                    </h2>
                </div>
            </div>
        </div>
        @yield('scripts')

        <script>
            $('.ui.dropdown').dropdown();

            @if (isset($record))
            $('.toggle.checkbox')
                .checkbox({
                    // check all children
                    onChecked: function() {
                        $.get( "{{ URL::to('/') }}/user/update_status/{{ $record->id }}/" + $(this).val());
                    },
                    // uncheck all children
                    onUnchecked: function() {

                    }
                })
            ;
            @endif

            @if (isset($record))
            $('.ui.dropdown.task_button')
                    .popup()
            ;

            $('.ui.dropdown.task_button').dropdown({
                onChange: function(value, text, choice) {
                    document.update_state_form.submit();
                }
            });
            @endif

            $('.ui.radio.checkbox').checkbox();

            $('.break').click(function(){
                $('body').dimmer('show');
                $.get( "{{ URL::to('/') }}/user/update_status_break/{{ isset(\Illuminate\Support\Facades\Auth::user()->id)?\Illuminate\Support\Facades\Auth::user()->id:"" }}/BREAK");
            });

            $('body').dimmer("setting",{
                onHide: function(){
                    window.location.replace("{{ URL::to('/home') }}")
                }
            });
        </script>



        <style>
            .index_modal_margin_top {
                margin-top: -295px !important;
            }
        </style>
    </body>
</html>