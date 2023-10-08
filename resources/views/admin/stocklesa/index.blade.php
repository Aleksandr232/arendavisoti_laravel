@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Склад</h1>
                    @foreach($stock as $post)
                        <div>Данные со склада отправил {{$post->username}} в {{$result = date('Y-m-d H:i:s', strtotime($post->updated_at) + 3 * 3600);}}</div>
                    @endforeach
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if(count($stock))
                            @foreach($stock as $post)
                            <div class="stock_lesa_grid">
                            <img style="width: 100px; height:100px" src={{ asset('frontend/img/stock/lesa_lestni.png') }} alt="Image 1">
                                        <div class="stock_lesa">{{$post->lesa}} шт</div>
                                        <div><img style="width: 50px; height:100px" src={{ asset('frontend/img/stock/rama.png') }} alt="Image 1">
                                            <div style="position: relative; left: 165px;
                                            bottom: 57px; font-size: 20px;">{{$post->rama}} шт</div>
                                        </div>
                                        <div><img style="width: 100px; height:100px" src={{ asset('frontend/img/stock/rama_diagonal.png') }} alt="Image 1">
                                            <div style="position: relative; left: 165px;
                                            bottom: 57px; font-size: 20px;">{{$post->ramadioganal}} шт</div>
                                        </div>
                                        <div><img style="width: 90px; height:100px" src={{ asset('frontend/img/stock/conect.png') }} alt="Image 1">
                                            <div style="position: relative; left: 165px;
                                            bottom: 57px; font-size: 20px;" >
                                            {{$post->conect}} шт
                                        </div>
                                        </div>
                                        <div><img style="width: 100px; height:100px" src={{ asset('frontend/img/stock/rigel.png') }} alt="Image 1">
                                            <div style="position: relative; left: 165px;
                                            bottom: 57px; font-size: 20px;">
                                                {{$post->rigel}} шт
                                            </div>
                                        </div>
                                        <div> <img style="width: 60px; height:100px" src={{ asset('frontend/img/stock/nastil.png') }} alt="Image 1">
                                            <div style="position: relative; left: 165px;
                                            bottom: 57px; font-size: 20px;">
                                                {{$post->nastil}} шт
                                            </div>
                                        </div>
                                        <div><img style="width: 50px; height:100px" src={{ asset('frontend/img/stock/bash.png') }} alt="Image 1">
                                            <div style="position: relative; left: 165px;
                                            bottom: 57px; font-size: 20px;">
                                                {{$post->bash}} шт
                                            </div>
                                        </div>
                                        <div> <img style="width: 50px; height:100px" src={{ asset('frontend/img/stock/jack.png') }} alt="Image 1">
                                            <div style="position: relative; left: 165px;
                                            bottom: 57px; font-size: 20px;">
                                                {{$post->jack}} шт
                                            </div>
                                        </div>

                            </div>
                            @endforeach
                        @else
                            <p>Информация со склада еще поступила</p>
                        @endif
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
