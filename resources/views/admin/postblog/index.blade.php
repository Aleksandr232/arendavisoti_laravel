@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Блог</h1>
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
                            <a href="{{ route('postsblog.create') }}" class="btn btn-primary mb-3">Добавить пост</a>
                            @if (count($blog))
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Медиа</th>
                                        <th>Название</th>
                                        <th>Дата создания</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blog  as $post)
                                        <tr>
                                            <td style="width: 50px;">
                                            @if($post->media == 'MOV' || $post->media == 'MP4' || $post->media == 'mp4' || $post->media == 'avi' || $post->media == 'mov')
                                                <video style="width: 150px; height:150px" controls="controls">
                                                    <source src="{{ asset('blog/' . $post->path) }}" style="width: 50%; height:2px; object-fit: cover" alt="">
                                                </video>
                                            @else
                                                <img src="{{ asset('blog/' . $post->path) }}" style="width: 100%; object-fit: cover" alt="">
                                            @endif
                                            </td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}</td>
                                            <td>
                                                <a href="{{ route('postsblog.edit', $post->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="{{ route('seo', $post->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                    <i class="fa fa-gears"></i>
                                                </a>
                                                <form action="{{ route('postsblog.destroy', $post->id) }}" method="POST">
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
                            <p>Постов пока нет...</p>
                        @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $blog->links() }}
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
