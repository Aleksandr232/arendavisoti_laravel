@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавление файла прайса</h1>
                    <a style="position: relative"  class="btn btn-danger" href="{{ route('destroy') }}">Удалить файлы</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">

                <!-- form start -->
                <form role="form" method="post" action="{{ route('postpricefile.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="custom-file">
                            @if(isset($pricefile))
                                @foreach($pricefile->reverse() as $post)
                                <div style="position: absolute; bottom:44px;">
                                            Всего файлов:{{count($pricefile)}}
                                </div>
                                @endforeach
                            @endif
                            <input type="file" name="filename[]"  class="custom-file-input" id="customFile"  multiple>
                            <label class="custom-file-label" for="customFile">загрузить файл</label>
                          </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Добавить файл</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
