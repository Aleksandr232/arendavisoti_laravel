@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование статьи</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- form start -->
                <form role="form" method="post" action="{{ route('posts.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>
                                <input type="hidden" name="old_img" value="{{ $post->img }}">
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="title">Заголовок статьи</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="content">Описание статьи</label>
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="10">{{ $post->content }}</textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="img">Фотография статьи</label>
                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input @error('img') is-invalid @enderror" id="img" value="{{ $post->img }}">
                                <label class="custom-file-label" for="file">Выберите фото</label>
                            </div>
                            <div style="margin-top: 40px; width: 280px;">
                                <img src="{{ asset('uploads/' . $post->img) }}" style="width: 100%; object-fit: cover" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('posts.index') }}" type="button" class="btn btn-success">Назад</a>
                        <button type="submit" class="btn btn-primary">Сохранить статью</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

