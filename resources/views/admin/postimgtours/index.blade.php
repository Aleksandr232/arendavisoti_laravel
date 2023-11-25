@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Фото вышки-туры</h1>
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
                            <a href="{{ route('postsimgtours.create') }}" class="btn btn-primary mb-3">Добавить файл</a>
                            @if (count($tours))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Медиа</th>
                                            <th>Назначения</th>
                                            <th>Высота</th>
                                            <th>Дата создания</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tours as $tour)
                                            <tr>
                                                <td style="width: 80px;">
                                                    @if($tour->media == 'MP4' || $tour->media == 'mp4' || $tour->media == 'avi' || $tour->media == 'mov')
                                                        <video style="width: 100px; height:100px" controls="controls">
                                                            <source src="{{ asset('uploads/' . $tour->path) }}" style="width: 50%; height:2px; object-fit: cover" alt="">
                                                        </video>
                                                    @else
                                                        <img src="{{ asset('uploads/' . $tour->path) }}" style="width: 100%; object-fit: cover" alt="">
                                                    @endif
                                                </td>
                                                <td>{{ $tour->title }}</td>
                                                <td>{{ $tour->height }}</td>
                                                <td>{{$result = date('Y-m-d H:i:s', strtotime($tour->created_at) + 3 * 3600);}}</td>
                                                <td style="display: flex;">
                                                    <form action="{{ route('postsimgtours.destroy', $tour->id) }}" method="post" class="float-left">
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
                                <p>Фото пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $tours->links() }}

                            {{--<ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>--}}
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

