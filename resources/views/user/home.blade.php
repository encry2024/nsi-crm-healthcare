@extends('template')

@section('header')
    @include('util.header')
@stop

@section('content')
    <div class="ui centered grid">

        <div class="row">
            <div class="fourteen wide column">
                <div class="ui grid">
                    <div class="sixteen wide column">
                        <br><br><br><br><br><br><br>
                        <div class="ui search">

                            <h3>
                                <i class="file outline circular orange inverted icon"></i>
                                Search Medical Record Number</h3>
                            <div class="ui icon huge input" style="width: 100%;">
                                <input type="text" id="search_mrn" class="prompt" style="border-radius: 0.3rem;">
                                <i class="search orange inverted circular icon"></i>
                            </div>
                            <div class="results"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop