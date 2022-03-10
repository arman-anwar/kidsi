@extends('layout')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data</div>
                <div class="card-body">
                <a href="{{ url('/parser/create') }}" class="btn btn-success btn-sm" title="Add New Member">
                            <i class="fa fa-plus" aria-hidden="true"></i> Save Data
                        </a>
                    <br />
                    <div class="table-responsive">
                        <table class="table"  style="table-layout: fixed;">
                            <thead>
                                <tr>
                                    <!-- <th>key</th> -->
                                    <th style="width: 25%">Title</th>
                                    <th style="width: 25%">Image URL</th>
                                    <th style="width: 35%">Title Link</th>
                                    <th style="width: 15%">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($members as $key =>$item)
                                <tr>
                                    <!-- <td>{{ $key }}</td> -->
                                    <td >{{ $item['title'] }}</td>
                                    <td>{{ $item['image_url'] }}</td>
                                    <td>{{ $item['title_link'] }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item['ts'])->format('d/m/Y')}}</td>
                                    <!-- <td>{{ $item['ts'] }}</td> -->
                                    



                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection