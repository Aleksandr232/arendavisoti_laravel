@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавление фото в галерею техника</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- form start -->
                <form role="form" method="post" action="{{ route('poststexnica.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="text_img">Название техники</label>
                            <input type="text" name="text_img" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Напишите название техники">
                        </div>
                        <div class="form-group col-6">
                            <label for="img">Фотография </label>
                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input @error('title') is-invalid @enderror" id="img">
                                <label class="custom-file-label" for="file">Выберите фото</label>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('poststexnica.index') }}" type="button" class="btn btn-success">Назад</a>
                        <button type="submit" class="btn btn-primary">Добавить фото</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
