@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Обновление поста</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- form start -->
                <form role="form" method="post" action="{{route('postsblog.update', $blog->id )}}"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Заголовок поста</label>
                            <input type="text" value="{{$blog->title}}" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Введите заголовок">
                        </div>
                        <div class="form-group">
                            <label for="content">Описание поста</label>
                            <textarea class="editor" name="content" id="content" class="form-control @error('title') is-invalid @enderror" rows="10" placeholder="Напишите статью ...">{{$blog->content}}</textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="img">Медиафайл поста</label>
                            <div class="custom-file">
                                <input type="file" value="{{$blog->media}}" name="media" class="custom-file-input @error('media') is-invalid @enderror" id="img">
                                <label class="custom-file-label" for="file">Выберите фото</label>
                            </div>
                            @if($blog->media == 'MP4' || $blog->media == 'mp4' || $blog->media == 'avi' || $blog->media == 'mov')
                            <div style="margin-top: 40px; width: 280px;">
                                <video style="width: 100%; object-fit: cover"  controls="controls">
                                    <source src="{{ asset('blog/' . $blog->path) }}" >
                                </video>
                            </div>
                            @else
                                <div style="margin-top: 40px; width: 280px;">
                                    <img src="{{ asset('blog/' . $blog->path) }}" style="width: 100%; object-fit: cover" alt="">
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('postsblog.index') }}" type="button" class="btn btn-success">Назад</a>
                        <button type="submit" class="btn btn-primary">Обновить пост</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
