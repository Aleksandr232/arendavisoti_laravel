@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создания договора</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- form start -->
                <form role="form" method="post" action="{{ route('words.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div id="form-group" class="form-group">
                            <label for="title">Название документа</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Введите название документа">
                            <label for="address">Адрес доставки</label>
                            <input type="text" name="address" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="оборудование доставляется и будет использоваться по адресу ?">
                            <label for="name">Имя клиента</label>
                            <input type="text" name="name" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Введите имя клиента">
                            <label for="prices">Цена</label>
                            <input type="number" name="prices" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="арендная плата?">
                            <label for="uraddress">Юр.адрес</label>
                            <input type="text" name="uraddress" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Юр.адрес клиента?">
                            <label for="phone">Телефон, факс</label>
                            <input type="number" name="phone" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="телефон клиента?">
                            <label for="mailaddress">Почт.арес</label>
                            <input type="text" name="mailaddress" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Почт.арес клиента?">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="телефон клиента?">
                            <label for="orgn">ОРГН</label>
                            <input type="number" name="orgn" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="ОРГН клиента?">
                            <label for="inn">ИНН</label>
                            <input type="number" name="inn" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="ИНН клиента?">
                            <label for="kpp">КПП</label>
                            <input type="number" name="kpp" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="КПП клиента?">
                            <label for="rs">Р/счет</label>
                            <input type="number" name="rs" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Р/счет клиента?">
                            <label for="rs">К/счет</label>
                            <input type="number" name="ks" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="К/счет клиента?">
                            <label for="bank">Банк</label>
                            <input type="text" name="bank" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Банк клиента?">
                            <label for="bik">БИК</label>
                            <input type="text" name="bik" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="БИК клиента?">
                            <label for="order">Услуга</label>
                                <select  name="order" id="title">
                                    <option value='строительные леса ЛРСП-200 без настилов'>строительные леса ЛРСП-200 без настилов</option>
                                    <option value='строительные леса ЛРСП-200 с настилами'>строительные леса ЛРСП-200 с настилами</option>
                                    <option value='вышки-туры'>вышки-туры</option>
                                </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {{-- <a href="{{ route('employees.index') }}" type="button" class="btn btn-success">Назад</a> --}}
                        <button type="submit" class="btn btn-primary">Создать договор</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
