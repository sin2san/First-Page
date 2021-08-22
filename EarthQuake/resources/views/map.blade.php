@extends('layouts.app')

@section('head_tag')
    <title>Pins | Earthquake | FirstPage</title>
    @include('includes.icon')

    <!-- Ployfill CSS -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/map.css') }}" />
@endsection
@section('main-content')

    <div id="map"></div>
@endsection
@section('scripts')
    <!-- Google Map -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=[Your_API_Key]&callback=initMap&libraries=&v=weekly&channel=2"
        async></script>

    <!-- Custom JS -->
    <script type="text/javascript" src="{{ asset('js/map.js') }}"></script>
@endsection
