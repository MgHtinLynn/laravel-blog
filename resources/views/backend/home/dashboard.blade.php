@extends('backend.layouts.app')

@section('content')
    <b-container fluid>

        <div class="fade-in">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div class="text-value-lg">{{ $userCount }}</div>
                            <div>Members online</div>
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <canvas class="chart" id="card-chart1" height="70"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-info">
                        <div class="card-body pb-0">
                            <div class="text-value-lg">{{ $articleCount }}</div>
                            <div>Article online</div>
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
        </div>
        <!-- /.row-->
@endsection
