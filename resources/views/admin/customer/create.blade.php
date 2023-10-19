@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Доплнить информацию о клиенте</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- form start -->
                <form role="form" method="post" action="{{ route('info_client', $info->id) }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div id="form-group" class="form-group">
                            <label for="uraddress">Юр.адрес</label>
                            <input type="text" value="{{$info->uraddress}}" name="uraddress" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Юр.адрес клиента?">
                            {{-- <label for="phone">Телефон, факс</label>
                            <input type="number" name="phone" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="телефон клиента?"> --}}
                            <label for="mailaddress">Почт.арес</label>
                            <input type="text" value="{{$info->mailaddress}}" name="mailaddress" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Почт.арес клиента?">
                            <label for="email">E-mail</label>
                            <input type="text" value="{{$info->email}}" name="email" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="email клиента?">
                            <label for="orgn">ОРГН</label>
                            <input type="number"  value="{{$info->orgn}}" name="orgn" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="ОРГН клиента?">
                            <label for="inn">ИНН</label>
                            <input type="number"  value="{{$info->inn}}" name="inn" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="ИНН клиента?">
                            <label for="kpp">КПП</label>
                            <input type="number" value="{{$info->kpp}}" name="kpp" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="КПП клиента?">
                            <label for="rs">Р/счет</label>
                            <input type="number"  value="{{$info->rs}}" name="rs" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Р/счет клиента?">
                            <label for="ks">К/счет</label>
                            <input type="number" name="ks" value="{{$info->ks}}" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="К/счет клиента?">
                            <label for="bank">Банк</label>
                            <input type="text" name="bank" value="{{$info->bank}}"  id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Банк клиента?">
                            <label for="bik">БИК</label>
                            <input type="text" name="bik" value="{{$info->bik}}"   id="title" class="form-control @error('title') is-invalid @enderror" placeholder="БИК клиента?">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {{-- <a href="{{ route('employees.index') }}" type="button" class="btn btn-success">Назад</a> --}}
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
