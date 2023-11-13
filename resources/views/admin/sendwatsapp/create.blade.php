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
                <form role="form" method="POST" action="{{ route('sendWat') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="phones">Watsapp пользователя</label>
                            {{-- @if (count($contact))
                            <select  name="phones" id="title">
                                @foreach($contact as $post)
                                @if(preg_match('/^7/', $post->phone))
                                    <option value={{ $post->phone }}>{{ $post->name }}</option>
                                @endif
                            @endforeach
                            </select>

                            @else
                            <p>Добавьте номер клиента</p>
                            @endif --}}
                            <input style="position:absolute; top:42px; width:369px; left:20px" type="phone" placeholder="введите номера 790345422342,799923923492" name="phones" id="title">
                        </div>
                        <div class="form-group">
                            <label for="messages">Cообщение</label>
                            <textarea name="messages" id="title"  class="form-control @error('title') is-invalid @enderror" rows="10" placeholder="Напишите сообщение..."></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="file">Файл </label>
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
