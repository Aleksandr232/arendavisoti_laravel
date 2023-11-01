@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Прайс вышки-туры</h1>
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
                            {{-- <a href="{{ route('pricetours.create') }}" class="btn btn-primary mb-3">Добавить прайс</a> --}}
                            @if (count($pricetours))
                                <div class="table-responsive">
                                    <a style="position: absolute; bottom:10px;" href="https://www.zamzar.com/ru/convert/xls-to-jpg/">тут можно конвертировать xls в jpg</a>
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Прайс</th>
                                            <th>Дата создания</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pricetours -> reverse() as $post)
                                            <tr>
                                                <td style="width: 80px;">
                                                    <img src="{{ asset('prices/' . $post->path) }}" style="width: 100%; object-fit: cover" alt="">
                                                </td>
                                                <td>{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}</td>
                                                <td style="display: flex;">
                                                    <a href="{{ route('pricetours.edit',  $post->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <form action="{{ route('pricetours.destroy', $post->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <button type="submit" class="btn btn-danger btn-sm">
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
                                <p>Прайс вышки-туры еще не добавлен...</p>
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
