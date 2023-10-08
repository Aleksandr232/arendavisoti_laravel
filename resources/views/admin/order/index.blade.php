@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Заказы</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (count($orders))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Имя клиента</th>
                                            <th>Номер клиента</th>
                                            <th>Заказ</th>
                                            <th>Дата</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $post)
                                            <tr>
                                                <td>{{ $post->name }}</td>
                                                <td>{{ $post->phone }}</td>
                                                <td>заказ на {{ $post->order }}</td>
                                                <td>{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}</td>
                                                <td><form action="{{ route('orders.destroy', $post->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" onclick="document.location.href='tel:{{$post->phone}}'" class="btn btn-success">
                                                        Принять заказ
                                                    </button>
                                                </form></td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Заказов пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
