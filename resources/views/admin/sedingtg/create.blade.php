@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Отправка сообщения</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- form start -->
                <form role="form" method="POST" action="{{ route('sendTg') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="phones">ID пользователя</label>
                            @if (count($contact))
                            <select name="phones" id="title">
                                @foreach($contact as $post)
                                    @if(is_numeric($post->telegram))
                                        <option value={{ $post->telegram }}>{{ $post->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @else
                            <p>Добавьте id телеграмм клиента</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="messages">Cообщение</label>
                            <textarea name="messages" id="title"  class="form-control @error('title') is-invalid @enderror" rows="10" placeholder="Напишите сообщение..."></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="file">Договор </label>
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input @error('title') is-invalid @enderror" id="img">
                                <label class="custom-file-label" for="file">Выберите файл</label>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        {{-- <a href="{{ route('posts.index') }}" type="button" class="btn btn-success">Назад</a> --}}
                        <button type="submit" class="btn btn-primary">Отправить сообщение</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
