@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Статистика</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                <div class="row">
                        <div class="col">
                                <div style="width: 330px">
                                    <canvas id="myChart1"></canvas>
                                </div>
                        </div>
                        <div  class="col">
                            <div style="width: 380px">
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
