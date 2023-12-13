@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Список статей</h1>
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
                            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Добавить статью</a>
                            <div class="tab-container">
                                <a href="{{ route('lesa') }}" class="btn btn-primary mb-3">Строительные леса</a>
                                <a href="{{ route('tours') }}" class="btn btn-primary mb-3">Вышки-туры</a>
                                <a href="{{ route('resetLesa') }}" class="btn btn-danger ">Очистить позиций</a>
                                <a href="{{ route('posts.index') }}" type="button" class="btn btn-success">Назад</a>
                            </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Позиция</th>
                                            <th>Медиа</th>
                                            <th>Название статьи</th>
                                            <th>Дата создания</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($lesa->sortBy('order') as $post)
                                            @if ($post->is_tabs == 0)
                                                <tr>
                                                    <td>{{$post->order}}</td>
                                                    <td style="width: 80px;">
                                                        @if($post->media == 'MOV' || $post->media == 'MP4' || $post->media == 'mp4' || $post->media == 'avi' || $post->media == 'mov')
                                                            <video style="width: 100px; height:100px" controls="controls">
                                                                <source src="{{ asset('uploads/' . $post->path) }}" style="width: 50%; height:2px; object-fit: cover" alt="">
                                                            </video>
                                                        @else
                                                            <img src="{{ asset('uploads/' . $post->path) }}" style="width: 100%; object-fit: cover" alt="">
                                                        @endif
                                                    </td>
                                                    <td>{{ $post->title }}</td>
                                                    <td>{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}</td>
                                                    <td style="display: flex;">
                                                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-info btn-sm float-left mr-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="{{ route('order', $post->id) }}" class="btn btn-success btn-sm float-left mr-1">
                                                            +
                                                        </a>
                                                        <a href="{{ route('orders', $post->id) }}" class="btn btn-danger btn-sm float-left mr-1">
                                                            -
                                                        </a>
                                                        <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post" class="float-left">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Подтвердите удаление')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                        <!-- /.card-body -->
                        {{-- <div class="card-footer clearfix">
                            {{ $posts->links() }}
                        </div> --}}
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
