@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавление статьи</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- form start -->
                <form role="form" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Заголовок статьи</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Введите заголовок">
                        </div>
                        <div class="form-group">
                            <label for="content">Описание статьи</label>
                            <textarea class="editor" name="content" id="content" class="form-control @error('title') is-invalid @enderror" rows="10" placeholder="Напишите статью ..."></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="meida">Медиа</label>
                            <div class="custom-file">
                                <input type="file" name="media" class="custom-file-input @error('title') is-invalid @enderror" id="img">
                                <label class="custom-file-label" for="file">Выберите файл</label>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('posts.index') }}" type="button" class="btn btn-success">Назад</a>
                        <button type="submit" class="btn btn-primary">Добавить статью</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

