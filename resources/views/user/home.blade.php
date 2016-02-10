@extends('template')

@section('header')
    @include('util.header')
@stop

@section('content')
    <div class="ui grid container">
        <!-- Breadcrumb -->
        <div class="row">
            <div class="sixteen wide column right aligned">
                <div class="ui breadcrumb">
                    <div class="active section">Home</div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="row">

            <div class="ui grid">
                <div class="ui vertical menu">
                    <div class="item">
                        <div class="header">LEADS</div>
                        <div class="menu">
                            <a class="item">
                                <i class="add icon"></i>
                                Add BTN
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@stop

@section('scripts')
@stop