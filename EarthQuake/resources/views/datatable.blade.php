@extends('layouts.app')

@section('head_tag')
    <title>Data Table | Earthquake | FirstPage</title>
    @include('includes.icon')

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTable.css') }}" />

@endsection
@section('main-content')
    <section class="margin">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <th class="text-center">#</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Magnitude</th>
                                <th class="text-center">URL</th>
                                <th class="text-center">Location</th>
                            </thead>
                            <tbody>
                                @php $count = 0; @endphp
                                @foreach ($responseBody as $row)
                                    @php
                                        $count++;
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $count }}</td>
                                        <td>{{ $row->properties->title }}</td>
                                        <td class="text-center">{{ $row->properties->mag }}</td>
                                        <td><a href="{{ $row->properties->url }}" target="_blank">
                                                {{ $row->properties->url }}</a></td>
                                        <td>
                                            {{ $row->geometry->coordinates[1] < 0 ? number_format($row->geometry->coordinates[1] * -1, 3) . '°S' : number_format($row->geometry->coordinates[1], 3) . '°N' }}
                                            {{ $row->geometry->coordinates[0] < 0 ? number_format($row->geometry->coordinates[0] * -1, 3) . '°W' : number_format($row->geometry->coordinates[0], 3) . '°E' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center margin">
                        <a href="{{ url('map') }}" class="btn btn-md btn-primary text-uppercase text-lite-bold" target="_blank">View In Google Map</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <!-- JQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <!-- Datatable CDN -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>

    <!-- Datatable Config -->
    <script type="text/javascript">
        $(function() {
            $('#dataTable').dataTable({
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false,
                "scrollX": false
            });
        });
    </script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
@endsection
