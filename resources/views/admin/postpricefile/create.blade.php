@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавление файла прайса</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- form start -->
                <form role="form" method="post" action="{{ route('postpricefile.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="custom-file">
                            @if(isset($pricefile))
                                @foreach($pricefile->reverse() as $post)

                                    @if($loop->first)
                                        <p style="position: absolute; bottom:44px">Последний  файл: {{ $post->filename }}</p>
                                        <input type="file" name="filename"  class="custom-file-input" id="customFile">
                                    @endif
                                @endforeach
                            @endif

                            <label class="custom-file-label" for="customFile">загрузить файл</label>
                          </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Добавить файл</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
