@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Изменить текст скидки</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- form start -->
                <form role="form" method="post" action="{{ route('postsdiscounts.store') }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div id="form-group" class="form-group">
                            <label for="discounts">Изменить скидку бегущий строки</label>
                            <input type="text" value="{{$dis[0]->discounts}}" name="discounts" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Скидка">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
