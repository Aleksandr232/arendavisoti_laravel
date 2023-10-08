@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Документы</h1>
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
                            <a href="{{ route('documents.create') }}" class="fas fa-file"> Добавить файл</a>
                            @if (count($doc))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Название</th>
                                            <th>Скачать</th>
                                            <th>Дата</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($doc as $post)
                                                <tr>
                                                    <td>{{ $post->filename }}</td>
                                                    <td><a href="{{ asset('document/' . $post->path) }}" download="{{ $post->filename }}">скачать</a></td>
                                                    <td>{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}</td>
                                                    <td><form action="{{ route('documents.destroy', $post->id) }}" method="POST">
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
                                <p>Документы не загружены...</p>
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
