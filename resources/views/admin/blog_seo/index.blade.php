@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Настройка SEO</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- form start -->
                <form role="form" method="post" action="{{ route('post_seo', $blog->id) }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div id="form-group" class="form-group">
                            <label for="titles">Заголовок страницы</label>
                            <input type="text" value="{{$blog->titles}}" name="titles" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                            <label for="description">Описание страницы</label>
                            <input type="text" value="{{$blog->description}}" name="description" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                            <label for="keywords">Ключевые слова</label>
                            <input type="text" value="{{$blog->keywords}}" name="keywords" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('postsblog.index') }}" type="button" class="btn btn-success">Назад</a>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
