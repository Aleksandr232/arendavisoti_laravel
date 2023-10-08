@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Финансы</h1>
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
                            <h1>Транзакции</h1>
                            @if ($lastTotalAmount)
                            <p>Текущая сумма: {{ $lastTotalAmount }} руб</p>
                            @else
                            <p>сумма появится, когда вы введите данные</p>
                            @endif
                            <form action="{{ route('add') }}" method="post">
                                @csrf
                                <label for="amount">Сумма:</label>
                                <input placeholder="введите сумму"  type="number" name="amount" id="amount">

                                <label for="action">Действие:</label>
                                <select name="action" id="action">
                                    <option value="получено">Получено</option>
                                    <option value="отдано">Отдано</option>
                                </select>

                                <label for="action">Комментарий:</label>
                                <input placeholder="коммент" type="text" name="comment">

                                <button class="btn btn-primary" type="submit">Отправить</button>
                            </form>
                            <a id="finace_btn"  class="btn btn-danger" href="{{ route('deleteAll') }}">Очистить историю транкзаций</a>
                            <a id='finace_btn_report' href="{{ route('pdf.generate') }}" class="btn btn-success">скачать отчет <i class='fas fa-file-pdf'></i> </a>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Сумма</th>
                                        <th>Действия</th>
                                        <th>Комментарий</th>
                                        <th>Дата</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($finance as $post)
                                        @if($post->action == 'получено')
                                            <tr style="background: green; color:white">
                                                <td>{{$post->amount }} руб</td>
                                                <td>{{$post->action}}</td>
                                                <td>{{$post->comment}}</td>
                                                <td>{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}</td>
                                            </tr>
                                        @elseif($post->action == 'отдано')
                                            <tr style="background: red; color:white">
                                                <td>{{$post->amount }} руб</td>
                                                <td>{{$post->action}}</td>
                                                <td>{{$post->comment}}</td>
                                                <td>{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $finance->links() }}

                           {{--  <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul> --}}
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
