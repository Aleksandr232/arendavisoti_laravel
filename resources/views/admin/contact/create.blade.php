@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавление клиента</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- form start -->
                <form role="form" method="post" action="{{ route('contacts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>
                                <input type="hidden" name="hidden" value="1">
                            </label>
                            <label for="name">Имя клиента</label>
                            <input type="text" name="name" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Введите имя клиента">
                        </div>
                        <div class="form-group">
                            <label for="phone">Номер клиента</label>
                            <input type="number" name="phone" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Введите номер клиента">
                        </div>
                        <div class="form-group">
                            <label for="company">Компания</label>
                            <input type="text" name="company" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Укажите компанию">
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес</label>
                            <input type="text" name="address" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Укажите адрес">
                        </div>
                        <div class="form-group">
                            <label for="telegram">id пользователя</label>
                            <input type="text" name="telegram" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Укажите id клиента в телеграмме">
                        </div>
                        <div class="form-group">
                            <label for="email">Почта</label>
                            <input type="text" name="email" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Укажите электроную почту клиента">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ route('contacts.index') }}" type="button" class="btn btn-success">Назад</a>
                        <button type="submit" class="btn btn-primary">Добавить клиента</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
