@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Главная страница</h1>
                    @if(auth()->check() && auth()->user()->is_admin && auth()->user()->is_director)
                    <a href="{{ route('director') }}"> Перейти в панель директора</a>
                    @endif
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        @if(count($posts))
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ count($posts) }}</h3>

                                    <p>Всего статей</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('posts.index') }}" class="small-box-footer">Список статей <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        @else
                            <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>0</h3>
                                        <p>Всего статей</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('posts.index') }}" class="small-box-footer">Список статей <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                        @endif
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        @if(count($tours))
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ count($tours)}}</h3>

                                    <p>Всего фото тур</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('postsimgtours.index') }}" class="small-box-footer">фото тур <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        @else
                            <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>0</h3>
                                        <p>Всего фото тур</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('postsimgtours.index') }}" class="small-box-footer">фото тур <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                        @endif
                    </div>
                    <div class="col-lg-3 col-6">
                        @if(count($scaff))
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ count($scaff)}}</h3>

                                    <p>Всего фото лесов</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('postscaff.index') }}" class="small-box-footer">фото лесов <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        @else
                            <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>0</h3>
                                        <p>Всего фото лесов</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('postscaff.index') }}" class="small-box-footer">фото лесов <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                        @endif
                    </div>
                    <div class="col-lg-3 col-6">
                        @if(count($texnica))
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ count($texnica)}}</h3>
                                    <p>Всего фото техника</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('poststexnica.index') }}" class="small-box-footer">фото техника <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        @else
                            <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>0</h3>
                                        <p>Всего фото техника</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('poststexnica.index') }}" class="small-box-footer">фото техника <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                        @endif
                    </div>
                    <div class="col-lg-3 col-6">
                        @if(count($tractor))
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ count($tractor)}}</h3>
                                    <p>Всего фото минитрактор</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('poststractor.index') }}" class="small-box-footer">фото минитрактор <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        @else
                            <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>0</h3>
                                        <p>Всего фото минитрактор</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('poststractor.index') }}" class="small-box-footer">фото минитрактор <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                        @endif
                    </div>
                    <div class="col-lg-3 col-6">
                        @if(count($warehouse))
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ count($warehouse)}}</h3>
                                    <p>Всего фото складов</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('postswarehouse.index') }}" class="small-box-footer">фото складов <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        @else
                            <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>0</h3>
                                        <p>Всего фото складов</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('postswarehouse.index') }}" class="small-box-footer">фото складов  <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                        @endif
                    </div>
                    <div class="col-lg-3 col-6">
                        @if(count($snow))
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ count($snow)}}</h3>
                                    <p>Всего фото уборка снега</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('postssnow.index') }}" class="small-box-footer">фото уборка снега <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        @else
                            <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>0</h3>
                                        <p>Всего фото уборка снега</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('postssnow.index') }}" class="small-box-footer">фото уборка снега  <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                        @endif
                    </div>
                    <div class="col-lg-3 col-6">
                        @if(count($contact))
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ count($contact)}} <i class="fas fa-user nav-icon"></i></h3>
                                    <p>Всего клиентов</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('contacts.index') }}" class="small-box-footer">Клиенты<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        @else
                            <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>0 <i class="fas fa-user nav-icon"></i></h3>
                                        <p>Всего клиентов</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('contacts.index') }}" class="small-box-footer">Клиенты <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                        @endif
                    </div>
                    <div class="col-lg-3 col-6">
                        @if(count($blog))
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ count($blog)}}</h3>
                                    <p>Всего постов</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('postsblog.index') }}" class="small-box-footer">Блог <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        @else
                            <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>0</h3>
                                        <p>Всего постов</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('postsblog.index') }}" class="small-box-footer">Блог <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                        @endif
                    </div>
                </div>
            </div>



        </div>

    </section>
@endsection
