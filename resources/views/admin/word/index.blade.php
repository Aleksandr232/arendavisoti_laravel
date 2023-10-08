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
                            <img style="width: 100px; height:100px" src={{ asset('frontend/img/modal_cart/lesa_botan.png') }} alt="Image 1">
                                        <div class="stock_lesa">{{$post->lesa}} кв.м</div>
                            <img style="width: 100px" src={{ asset('frontend/img/modal_cart/turs.png') }} alt="Image 1">
                                        <div class="stock_tours">{{$post->tours}} шт</div>
                            <img style="width: 100px" src={{ asset('frontend/img/modal_cart/isuzu.png') }}  alt="Image 1">
                                <div class="stock_texnica" >
                                    @if($post->texnica == 'готова')
                                        <div style="color: green; font-size:20px;">
                                            isuzu  {{$post->texnica}}
                                        </div>
                                    @else
                                        <div style="color: red; font-size:20px;">
                                            isuzu  {{$post->texnica}}
                                        </div>
                                    @endif
                                </div>
                            <img style="width: 100px" src={{ asset('frontend/img/modal_cart/texnica3.png') }}  alt="Image 1">
                                        <div class="stock_tractor" >
                                            @if($post->tractor == 'исправен')
                                                <div style="color: green; font-size:20px;">
                                                  барсик  {{$post->tractor}}
                                                </div>
                                            @else
                                                <div style="color: red; font-size:20px;">
                                                  барсик  {{$post->tractor}}
                                                </div>
                                            @endif
                                        </div>
                            <div class="stock_gazel">
                                <img style="width: 100px" src={{ asset('frontend/img/modal_cart/gazel-new.png') }}  alt="Image 1">
                                <div class="stock_gazel_new" >
                                    @if($post->gazelnew == 'готова')
                                        <div style="color: green; font-size:20px;">
                                          газель 5 м  {{$post->gazelnew }}
                                        </div>
                                    @else
                                        <div style="color: red; font-size:20px;">
                                            газель 5 м   {{$post->gazelnew }}
                                        </div>
                                    @endif
                                </div>
                                <img style="width: 100px" src={{ asset('frontend/img/modal_cart/gazel-old.png') }}  alt="Image 1">
                                <div class="stock_gazel_old" >
                                    @if($post->gazelold == 'готова')
                                        <div style="color: green; font-size:20px;">
                                          газель 4,30 м  {{$post->gazelold }}
                                        </div>
                                    @else
                                        <div style="color: red; font-size:20px;">
                                            газель 4,30 м   {{$post->gazelold }}
                                        </div>
                                    @endif
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
