@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование прайса</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- form start -->
                <form role="form" method="post" action="{{ route('pricescaff.update', $pricescaff->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group col-6">
                            <label for="img">Прайс</label>
                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input @error('img') is-invalid @enderror" id="img" value="{{ $pricescaff->path }}">
                                <label class="custom-file-label" for="file">Выберите фото</label>
                            </div>
                            <div style="margin-top: 40px; width: 50%;">
                                <img src="{{ asset('prices/' . $pricescaff->path) }}" style="width: 100%; object-fit: cover" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('pricescaff.index') }}" type="button" class="btn btn-success">Назад</a>
                        <button type="submit" class="btn btn-primary">Сохранить прайс</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
