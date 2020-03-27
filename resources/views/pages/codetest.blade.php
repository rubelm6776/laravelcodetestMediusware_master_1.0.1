@extends('layouts.app')
@section('content')
     <div class="container-fluid app-body">
        <h3>Code Test  </h3>
         <div id="app">

         </div>
        <div class="row">
            <div id="historyData">
{{--                <data-component></data-component>--}}
                <Codetestcomponent></Codetestcomponent>
{{--                <customer></customer>--}}
            </div>
        </div>
    </div>


 @endsection
