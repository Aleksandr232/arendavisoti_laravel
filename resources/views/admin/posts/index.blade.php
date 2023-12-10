@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Список новостей</h1>
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
                            @if (count($posts))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Порядок</th>
                                            <th>Фото</th>
                                            <th>Название статьи</th>
                                            <th>Дата создания</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                @if($post->is_tabs == 0)
                                                    @if($post->order == 0)
                                                        <td>начало лесов</td>
                                                    @else
                                                        <td>{{$post->order}}</td>
                                                    @endif
                                                @else
                                                    @if($post->order_tours == 0)
                                                        <td>начало тур</td>
                                                    @else
                                                        <td>{{$post->order_tours}}</td>
                                                    @endif
                                                @endif
                                                <td style="width: 80px;">
                                                    <img src="{{ asset('uploads/' . $post->img) }}" style="width: 100%; object-fit: cover" alt="">
                                                </td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}</td>
                                                <td style="display: flex;">
                                                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="{{ route('tabs', $post->id) }}" class="btn btn-success btn-sm float-left mr-1">
                                                        @if($post->is_tabs == 0)
                                                            Блок леса
                                                        @elseif($post->is_tabs == 1)
                                                            Блок туры
                                                        @endif
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
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i
                                                                class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Статей пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $posts->links() }}
                        </div>
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

