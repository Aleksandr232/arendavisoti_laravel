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
                <div id="chat-messages">
                    @foreach ($messages as $message)
                        <div>{{ $message->content }}</div>
                    @endforeach
                </div>

                <form id="chat-form">
                    <input type="text" id="message-content">
                    <button type="submit">Отправить сообщение</button>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
