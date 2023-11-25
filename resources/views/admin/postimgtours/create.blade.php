@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавление медиа в галерею вышки-туры</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- form start -->
                <form role="form" method="post" action="{{ route('postsimgtours.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Назначение</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Введите назначение">
                            <label for="title">Высота туры</label>
                            <input type="text" name="height" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Введите высоту туры">
                            <label for="content">Объект</label>
                            <input type="text" name="content" id="title" class="form-control @error('title') is-invalid @enderror"  placeholder="Напишите названия объекта"/>
                        </div>
                        {{-- <div class="form-group">
                            <label for="content">Объект</label>
                            <input name="content" id="content" class="form-control @error('title') is-invalid @enderror"  placeholder="Напишите названия объекта"></input>
                        </div> --}}
                        <div class="form-group col-6">
                            <label for="img">Медиа </label>
                            <div class="custom-file">
                                <input type="file" name="media" class="custom-file-input @error('title') is-invalid @enderror" id="img">
                                <label class="custom-file-label" for="file">Выберите файл</label>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('postsimgtours.index') }}" type="button" class="btn btn-success">Назад</a>
                        <button type="submit" class="btn btn-primary">Добавить файл</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

