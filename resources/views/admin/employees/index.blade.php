@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Сотрудники</h1>
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
                            <a href="{{ route('employees.create') }}" class="fa fa-user-plus"> Добавить сотрудника</a>
                            @if (count($employees))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Имя</th>
                                            <th>Номер</th>
                                            <th>Дата рождения</th>
                                            <th>Адрес</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($employees as $post)
                                            <tr>
                                                <td>
                                                    <img style="width: 50px; border-radius:80px; height:50px" src="{{ asset('employ/' . $post->path) }}" alt="">
                                                    {{$post->name }}</td>
                                                <td>{{$post->phone}} <a onclick="document.location.href='tel:{{$post->phone}}'"  type="button" >&#128241;</a></td>
                                                <td>{{$post->date}}</td>
                                                <td>{{$post->address }}</td>
                                                <td><form action="{{ route('employees.destroy', $post->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i
                                                        class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Сотрудников пока нет...</p>
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
@endsection
