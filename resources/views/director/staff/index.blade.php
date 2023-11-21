@extends('director.layouts.main')

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
                            {{-- <a href="{{ route('contacts.create') }}" class="fa fa-user-plus"> Добавить клиента</a> --}}
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Имя </th>
                                            <th>Почта</th>
                                            <th>Роль</th>
                                            <th>Изменить роль</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($staff as $post)
                                            <tr>
                                                <td>{{ $post->name }}</td>
                                                <td>{{$post->email}} </td>
                                                @if($post->is_admin == 1)
                                                    <td>
                                                        Админ
                                                    </td>
                                                @elseif($post->is_director == 1)
                                                    <td>
                                                        Директор
                                                    </td>
                                                @elseif($post->is_director == 1 && $post->is_admin == 1)
                                                    <td>
                                                        Директор | Админ
                                                    </td>
                                                @else
                                                    <td>Сотрудник</td>
                                                @endif
                                                <td>
                                                    <form action="{{ route('staff.updateStatus', $post->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">
                                                            @if ($post->is_admin)
                                                                Убрать админа
                                                            @else
                                                                Сделать админом
                                                            @endif
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
