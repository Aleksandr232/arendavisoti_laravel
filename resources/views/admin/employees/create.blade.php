@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавление сотрудника</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- form start -->
                <form role="form" method="post" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Имя сотрудника</label>
                            <input type="text" name="name" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Введите имя клиента">
                        </div>
                        <div class="form-group">
                            <label for="phone">Номер сотрудника</label>
                            <input type="number" name="phone" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Введите номер клиента">
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес сотрудника</label>
                            <input type="text" name="address" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Введите номер клиента">
                        </div>
                        <div class="form-group">
                            <label for="date">Дата рождения</label>
                            <input type="date" name="date" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Введите номер клиента">
                        </div>
                        <div class="custom-file">
                            <input type="file" name="img" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">загрузить фотографию</label>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('employees.index') }}" type="button" class="btn btn-success">Назад</a>
                        <button type="submit" class="btn btn-primary">Добавить сотрудника</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
