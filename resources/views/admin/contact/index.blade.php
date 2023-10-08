@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Клиенты</h1>
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
                            <a href="{{ route('contacts.create') }}" class="fa fa-user-plus"> Добавить клиента</a>
                            @if (count($contact))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Имя клиента</th>
                                            <th>Номер клиента</th>
                                            <th>Компания</th>
                                            <th>Адрес</th>
                                            <th>id telegram</th>
                                            <th>Почта</th>
                                            <th>Дата</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contact as $post)
                                            <tr>
                                                <td>{{ $post->name }}</td>
                                                <td>{{$post->phone}} <a onclick="document.location.href='tel:{{$post->phone}}'"  type="button" >&#128241;</a></td>
                                                <td>{{ $post->company }}</td>
                                                <td>{{ $post->address }}</td>
                                                <td>{{ $post->telegram }}</td>
                                                <td>{{$post->email}}</td>
                                                <td>{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}</td>
                                                <td>
                                                    <a href="{{ route('contacts.edit',  $post->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('contacts.destroy', $post->id) }}" method="POST">
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
                                <p>Клиентов пока нет...</p>
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
