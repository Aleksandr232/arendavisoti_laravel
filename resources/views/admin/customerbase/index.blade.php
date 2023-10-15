@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>База клиентов</h1>
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('customerbase.create') }}" class="fa fa-user-plus"> Добавить клиента</a>
                            {{-- <button class="btn btn-danger btn-sm" onclick="toggleCheckboxes()">Удалить клиентов </button> --}}
                            @if (count($base))
                                <div class="table-responsive">
                                    <form class="form_customer" action="{{ route('customerbase.index') }}" method="GET">
                                        <input type="text" name="search" placeholder="Введите имя клиента" value="{{ request('search') }}">
                                        <input type="date" name="filter_date" placeholder="Введите дату акта">
                                        <button class="btn btn-primary" type="submit">Найти</button>
                                    </form>
                                    <a id='finace_btn_report_lesa' href="{{ route('pdf.generate.lesa') }}" class="btn btn-success">скачать отчет <i class='fas fa-file-pdf'></i> </a>
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Действия</th>
                                            <th>Признак</th>
                                            <th>Акт</th>
                                            <th>Дата акта</th>
                                            <th>Наименование контрагента</th>
                                            <th>Телефон</th>
                                            <th>Сумма договора</th>
                                            <th>Доставка</th>
                                            <th>Оборудование</th>
                                            <th>Залог</th>
                                        </tr>
                                        <tr style="display: none">
                                        <td></td>
                                        <td>вп</td>
                                        <td>вп</td>
                                        <td>вп</td>
                                        <td>вп</td>
                                        <td>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <th>Продолжительность аренды</th>
                                                        <th>Сумма договора</th>
                                                        <th>н/ б/н</th>
                                                        <th>Оплачено по</th>
                                                    </tr>
                                                    <tr>
                                                        <th>ljk</th>
                                                        <th>gjg</th>
                                                        <th>gg</th>
                                                        <th>cf</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <th>Вид</th>
                                                        <th>Стоимость рейса</th>
                                                        <th>Кол-во рейсов</th>
                                                        <th>Сумма доставки, руб.</th>
                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <th>Площадь лесов, кв.м.</th>
                                                        <th>Рама с лестницей</th>
                                                        <th>Рама проходная</th>
                                                        <th>Диагональ 2я</th>
                                                        <th>Связь 1я</th>
                                                        <th>Ригель</th>
                                                        <th>Щит</th>
                                                        <th>Башмак</th>
                                                        <th>Домкрат витовой</th>
                                                        <th>Сумма оборудования</th>
                                                        <th>Дата договора</th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <th>Сумма залога, руб.</th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                        </thead>

                                        @foreach($base  as $post)
                                        <thead>
                                            @if($post->sign == 'оплачено')
                                            <tr style="background: green; color:white">
                                            <td title="
                                            @if(auth()->user()->name == $post->added_by)
                                            Клиента добавил я
                                            @else
                                                Клиента добавил {{$post->added_by}}
                                            @endif" >
                                                {{ $post->id }}
                                            </td>
                                            <td style="background: white">
                                                <div style="display: grid; grid-template-columns: repeat(3,35px);
                                                grid-gap: 1px; ">
                                                    <form action="{{ route('customerbase.destroy', $post->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <button title="удалить клиента" type="submit" class="btn btn-secondary btn-sm">
                                                            <i
                                                            class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('customerbase.edit', $post->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form role="form" method="post" action="{{ route('updateStatus', $post->id)  }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <button title="оплачено"  class="btn btn-success btn-sm"  type="submit">
                                                            <i class="fas fa-thumbs-up"></i>
                                                        </button>
                                                    </form>
                                                    <form role="form" method="post" action="{{ route('updateStatusUnpaid', $post->id)  }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <button title="не оплачено" class="btn btn-danger btn-sm" type="submit">
                                                            <i class="fas fa-thumbs-down"></i>
                                                        </button>
                                                    </form>
                                                    <form role="form" method="post" action="{{ route('updateStatusClient', $post->id)  }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <button title="хороший постоянный клиент" class="btn btn-success btn-sm" type="submit">
                                                            <i class="fas fa-handshake"></i>
                                                        </button>
                                                    </form>
                                                    <form role="form" method="post" action="{{ route('updateStatusDebtor', $post->id)  }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <button title="ДОЛЖНИК" class="btn btn-danger btn-sm" type="submit">
                                                            <i class="fas fa-handshake-alt-slash"></i>
                                                        </button>
                                                    </form>
                                                    <form role="form" method="post" action="{{ route('updateStatusInfo', $post->id)  }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-info btn-sm" type="submit" title="отгружено">
                                                            <i class="fas fa-dolly"></i>
                                                        </button>
                                                    </form>
                                                    <form role="form" method="post" action="{{ route('updateStatusRefund', $post->id)  }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-info btn-sm" type="submit" title="частичный возврат">
                                                            <i class="fas fa-dolly-flatbed"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>
                                            <td>{{$post->sign}}</td>
                                            <td>{{$post->act}}</td>
                                            <td>{{$post->dateact}}</td>
                                            <td>{{$post->counterparty}}</td>
                                            <td>{{$post->phone}}</td>
                                            <td>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>Продолжительность аренды</th>
                                                            <th>Сумма договора</th>
                                                            <th>н/ б/н</th>
                                                            <th>Оплачено по</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{{$post->duration}}</td>
                                                            <td>{{$post->contractamount}} руб</td>
                                                            <td>{{$post->calculation}}</td>
                                                            <td>{{$post->paidby}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>Вид</th>
                                                            <th>Стоимость рейса</th>
                                                            <th>Кол-во рейсов</th>
                                                            <th>Сумма доставки, руб.</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{{$post->view}}</td>
                                                            <td>{{$post->cost}} руб</td>
                                                            <td>{{$post->flights}}</td>
                                                            <td>{{$post->amount}} руб</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>Площадь лесов, кв.м.</th>
                                                            <th>Рама с лестницей</th>
                                                            <th>Рама проходная</th>
                                                            <th>Диагональ 2я</th>
                                                            <th>Связь 1я</th>
                                                            <th>Ригель</th>
                                                            <th>Щит</th>
                                                            <th>Башмак</th>
                                                            <th>Домкрат витовой</th>
                                                            <th>Сумма оборудования</th>
                                                            <th>Дата договора</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{{$post->area}} кв.м.</td>
                                                            <td>{{$post->stairsframes}} шт</td>
                                                            <td>{{$post->passageframes}} шт</td>
                                                            <td>{{$post->doubleconnections}} шт</td>
                                                            <td>{{$post->singleconnections}} шт</td>
                                                            <td>{{$post->alllevelrafters}} шт</td>
                                                            <td>{{$post->alllevelpanels}} шт</td>
                                                            <td>{{$post->bash}} шт</td>
                                                            <td>{{$post->jack}} шт</td>
                                                            <td>{{$post->equipment}} руб</td>
                                                            <td>{{$post->contract}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>Сумма залога, руб.</th>
                                                        </tr>
                                                        <tr>
                                                            <th>{{$post->collateral}} руб</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                                </tr>
                                                @elseif($post->sign == 'не оплачено')
                                                <tr style="background: red; color:white">
                                                    <td title="@if(auth()->user()->name == $post->added_by)
                                                        Клиента добавил я
                                                        @else
                                                            Клиента добавил {{$post->added_by}}
                                                        @endif" >
                                                        {{ $post->id }}
                                                    </td>
                                                    <td style="background: white">
                                                        <div style="display: grid; grid-template-columns: repeat(3,35px);
                                                        grid-gap: 1px;">
                                                            <form action="{{ route('customerbase.destroy', $post->id) }}" method="POST">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}

                                                                <button title="удалить клиента" type="submit" class="btn btn-secondary btn-sm">
                                                                    <i
                                                                    class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                            <a href="{{ route('customerbase.edit', $post->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <form role="form" method="post" action="{{ route('updateStatus', $post->id)  }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <button title="оплачено"  class="btn btn-success btn-sm"  type="submit">
                                                                    <i class="fas fa-thumbs-up"></i>
                                                                </button>
                                                            </form>
                                                            <form role="form" method="post" action="{{ route('updateStatusUnpaid', $post->id)  }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <button title="не оплачено" class="btn btn-danger btn-sm" type="submit">
                                                                    <i class="fas fa-thumbs-down"></i>
                                                                </button>
                                                            </form>
                                                            <form role="form" method="post" action="{{ route('updateStatusClient', $post->id)  }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <button title="хороший постоянный клиент" class="btn btn-success btn-sm" type="submit">
                                                                    <i class="fas fa-handshake"></i>
                                                                </button>
                                                            </form>
                                                            <form role="form" method="post" action="{{ route('updateStatusDebtor', $post->id)  }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <button title="ДОЛЖНИК" class="btn btn-danger btn-sm" type="submit">
                                                                    <i class="fas fa-handshake-alt-slash"></i>
                                                                </button>
                                                            </form>
                                                            <form role="form" method="post" action="{{ route('updateStatusInfo', $post->id)  }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <button class="btn btn-info btn-sm" type="submit" title="отгружено">
                                                                    <i class="fas fa-dolly"></i>
                                                                </button>
                                                            </form>
                                                            <form role="form" method="post" action="{{ route('updateStatusRefund', $post->id)  }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <button class="btn btn-info btn-sm" type="submit" title="частичный возврат">
                                                                    <i class="fas fa-dolly-flatbed"></i>
                                                                </button>
                                                            </form>
                                                        </div>

                                                    </td>
                                                    <td>{{$post->sign}}</td>
                                                    <td>{{$post->act}}</td>
                                                    <td>{{$post->dateact}}</td>
                                                    <td>{{$post->counterparty}}</td>
                                                    <td>{{$post->phone}}</td>
                                                    <td>
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <th>Продолжительность аренды</th>
                                                                    <th>Сумма договора</th>
                                                                    <th>н/ б/н</th>
                                                                    <th>Оплачено по</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{$post->duration}}</td>
                                                                    <td>{{$post->contractamount}} руб</td>
                                                                    <td>{{$post->calculation}}</td>
                                                                    <td>{{$post->paidby}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <th>Вид</th>
                                                                    <th>Стоимость рейса</th>
                                                                    <th>Кол-во рейсов</th>
                                                                    <th>Сумма доставки, руб.</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{$post->view}}</td>
                                                                    <td>{{$post->cost}} руб</td>
                                                                    <td>{{$post->flights}}</td>
                                                                    <td>{{$post->amount}} руб</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <th>Площадь лесов, кв.м.</th>
                                                                    <th>Рама с лестницей</th>
                                                                    <th>Рама проходная</th>
                                                                    <th>Диагональ 2я</th>
                                                                    <th>Связь 1я</th>
                                                                    <th>Ригель</th>
                                                                    <th>Щит</th>
                                                                    <th>Башмак</th>
                                                                    <th>Домкрат витовой</th>
                                                                    <th>Сумма оборудования</th>
                                                                    <th>Дата договора</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{$post->area}} кв.м.</td>
                                                                    <td>{{$post->stairsframes}} шт</td>
                                                                    <td>{{$post->passageframes}} шт</td>
                                                                    <td>{{$post->doubleconnections}} шт</td>
                                                                    <td>{{$post->singleconnections}} шт</td>
                                                                    <td>{{$post->alllevelrafters}} шт</td>
                                                                    <td>{{$post->alllevelpanels}} шт</td>
                                                                    <td>{{$post->bash}} шт</td>
                                                                    <td>{{$post->jack}} шт</td>
                                                                    <td>{{$post->equipment}} руб</td>
                                                                    <td>{{$post->contract}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <th>Сумма залога, руб.</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>{{$post->collateral}} руб</th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                        </tr>
                                                        @elseif($post->sign == 'хороший постоянный клиент')
                                                        <tr style="background: LightGreen; color:black">
                                                            <td title="@if(auth()->user()->name == $post->added_by)
                                                                Клиента добавил я
                                                                @else
                                                                    Клиента добавил {{$post->added_by}}
                                                                @endif" >
                                                                {{ $post->id }}
                                                            </td>
                                                            <td style="background: white">
                                                                <div style="display: grid; grid-template-columns: repeat(3,35px);
                                                                grid-gap: 1px;">
                                                                    <form action="{{ route('customerbase.destroy', $post->id) }}" method="POST">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}

                                                                        <button title="удалить клиента" type="submit" class="btn btn-secondary btn-sm">
                                                                            <i
                                                                            class="fas fa-trash-alt"></i>
                                                                        </button>
                                                                    </form>
                                                                    <a href="{{ route('customerbase.edit', $post->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form role="form" method="post" action="{{ route('updateStatus', $post->id)  }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button title="оплачено"  class="btn btn-success btn-sm"  type="submit">
                                                                            <i class="fas fa-thumbs-up"></i>
                                                                        </button>
                                                                    </form>
                                                                    <form role="form" method="post" action="{{ route('updateStatusUnpaid', $post->id)  }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button title="не оплачено" class="btn btn-danger btn-sm" type="submit">
                                                                            <i class="fas fa-thumbs-down"></i>
                                                                        </button>
                                                                    </form>
                                                                    <form role="form" method="post" action="{{ route('updateStatusClient', $post->id)  }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button title="хороший постоянный клиент" class="btn btn-success btn-sm" type="submit">
                                                                            <i class="fas fa-handshake"></i>
                                                                        </button>
                                                                    </form>
                                                                    <form role="form" method="post" action="{{ route('updateStatusDebtor', $post->id)  }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button title="ДОЛЖНИК" class="btn btn-danger btn-sm" type="submit">
                                                                            <i class="fas fa-handshake-alt-slash"></i>
                                                                        </button>
                                                                    </form>
                                                                    <form role="form" method="post" action="{{ route('updateStatusInfo', $post->id)  }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button class="btn btn-info btn-sm" type="submit" title="отгружено">
                                                                            <i class="fas fa-dolly"></i>
                                                                        </button>
                                                                    </form>
                                                                    <form role="form" method="post" action="{{ route('updateStatusRefund', $post->id)  }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button class="btn btn-info btn-sm" type="submit" title="частичный возврат">
                                                                            <i class="fas fa-dolly-flatbed"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>

                                                            </td>
                                                            <td>{{$post->sign}}</td>
                                                            <td>{{$post->act}}</td>
                                                            <td>{{$post->dateact}}</td>
                                                            <td>{{$post->counterparty}}</td>
                                                            <td>{{$post->phone}}</td>
                                                            <td>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>Продолжительность аренды</th>
                                                                            <th>Сумма договора</th>
                                                                            <th>н/ б/н</th>
                                                                            <th>Оплачено по</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>{{$post->duration}}</td>
                                                                            <td>{{$post->contractamount}} руб</td>
                                                                            <td>{{$post->calculation}}</td>
                                                                            <td>{{$post->paidby}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>Вид</th>
                                                                            <th>Стоимость рейса</th>
                                                                            <th>Кол-во рейсов</th>
                                                                            <th>Сумма доставки, руб.</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>{{$post->view}}</td>
                                                                            <td>{{$post->cost}} руб</td>
                                                                            <td>{{$post->flights}}</td>
                                                                            <td>{{$post->amount}} руб</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>Площадь лесов, кв.м.</th>
                                                                            <th>Рама с лестницей</th>
                                                                            <th>Рама проходная</th>
                                                                            <th>Диагональ 2я</th>
                                                                            <th>Связь 1я</th>
                                                                            <th>Ригель</th>
                                                                            <th>Щит</th>
                                                                            <th>Башмак</th>
                                                                            <th>Домкрат витовой</th>
                                                                            <th>Сумма оборудования</th>
                                                                            <th>Дата договора</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>{{$post->area}} кв.м.</td>
                                                                            <td>{{$post->stairsframes}} шт</td>
                                                                            <td>{{$post->passageframes}} шт</td>
                                                                            <td>{{$post->doubleconnections}} шт</td>
                                                                            <td>{{$post->singleconnections}} шт</td>
                                                                            <td>{{$post->alllevelrafters}} шт</td>
                                                                            <td>{{$post->alllevelpanels}} шт</td>
                                                                            <td>{{$post->bash}} шт</td>
                                                                            <td>{{$post->jack}} шт</td>
                                                                            <td>{{$post->equipment}} руб</td>
                                                                            <td>{{$post->contract}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>Сумма залога, руб.</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>{{$post->collateral}} руб</th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                                </tr>
                                                                @elseif($post->sign == 'ДОЛЖНИК')
                                                                <tr style="background: LightCoral; color:white">
                                                                    <td title="@if(auth()->user()->name == $post->added_by)
                                                                        Клиента добавил я

                                                                        @else
                                                                            Клиента добавил {{$post->added_by}}
                                                                        @endif" >
                                                                        {{ $post->id }}
                                                                    </td>
                                                                    <td style="background: white">
                                                                        <div style="display: grid; grid-template-columns: repeat(3,35px);
                                                                        grid-gap: 1px;">
                                                                            <form action="{{ route('customerbase.destroy', $post->id) }}" method="POST">
                                                                                {{ csrf_field() }}
                                                                                {{ method_field('DELETE') }}

                                                                                <button title="удалить клиента" type="submit" class="btn btn-secondary btn-sm">
                                                                                    <i
                                                                                    class="fas fa-trash-alt"></i>
                                                                                </button>
                                                                            </form>
                                                                            <a href="{{ route('customerbase.edit', $post->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </a>
                                                                            <form role="form" method="post" action="{{ route('updateStatus', $post->id)  }}" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button title="оплачено"  class="btn btn-success btn-sm"  type="submit">
                                                                                    <i class="fas fa-thumbs-up"></i>
                                                                                </button>
                                                                            </form>
                                                                            <form role="form" method="post" action="{{ route('updateStatusUnpaid', $post->id)  }}" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button title="не оплачено" class="btn btn-danger btn-sm" type="submit">
                                                                                    <i class="fas fa-thumbs-down"></i>
                                                                                </button>
                                                                            </form>
                                                                            <form role="form" method="post" action="{{ route('updateStatusClient', $post->id)  }}" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button title="хороший постоянный клиент" class="btn btn-success btn-sm" type="submit">
                                                                                    <i class="fas fa-handshake"></i>
                                                                                </button>
                                                                            </form>
                                                                            <form role="form" method="post" action="{{ route('updateStatusDebtor', $post->id)  }}" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button title="ДОЛЖНИК" class="btn btn-danger btn-sm" type="submit">
                                                                                    <i class="fas fa-handshake-alt-slash"></i>
                                                                                </button>
                                                                            </form>
                                                                            <form role="form" method="post" action="{{ route('updateStatusInfo', $post->id)  }}" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button class="btn btn-info btn-sm" type="submit" title="отгружено">
                                                                                    <i class="fas fa-dolly"></i>
                                                                                </button>
                                                                            </form>
                                                                            <form role="form" method="post" action="{{ route('updateStatusRefund', $post->id)  }}" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button class="btn btn-info btn-sm" type="submit" title="частичный возврат">
                                                                                    <i class="fas fa-dolly-flatbed"></i>
                                                                                </button>
                                                                            </form>
                                                                        </div>

                                                                    </td>
                                                                    <td>{{$post->sign}}</td>
                                                                    <td>{{$post->act}}</td>
                                                                    <td>{{$post->dateact}}</td>
                                                                    <td>{{$post->counterparty}}</td>
                                                                    <td>{{$post->phone}}</td>
                                                                    <td>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th>Продолжительность аренды</th>
                                                                                    <th>Сумма договора</th>
                                                                                    <th>н/ б/н</th>
                                                                                    <th>Оплачено по</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{$post->duration}}</td>
                                                                                    <td>{{$post->contractamount}} руб</td>
                                                                                    <td>{{$post->calculation}}</td>
                                                                                    <td>{{$post->paidby}}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th>Вид</th>
                                                                                    <th>Стоимость рейса</th>
                                                                                    <th>Кол-во рейсов</th>
                                                                                    <th>Сумма доставки, руб.</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{$post->view}}</td>
                                                                                    <td>{{$post->cost}} руб</td>
                                                                                    <td>{{$post->flights}}</td>
                                                                                    <td>{{$post->amount}} руб</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th>Площадь лесов, кв.м.</th>
                                                                                    <th>Рама с лестницей</th>
                                                                                    <th>Рама проходная</th>
                                                                                    <th>Диагональ 2я</th>
                                                                                    <th>Связь 1я</th>
                                                                                    <th>Ригель</th>
                                                                                    <th>Щит</th>
                                                                                    <th>Башмак</th>
                                                                                    <th>Домкрат витовой</th>
                                                                                    <th>Сумма оборудования</th>
                                                                                    <th>Дата договора</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{$post->area}} кв.м.</td>
                                                                                    <td>{{$post->stairsframes}} шт</td>
                                                                                    <td>{{$post->passageframes}} шт</td>
                                                                                    <td>{{$post->doubleconnections}} шт</td>
                                                                                    <td>{{$post->singleconnections}} шт</td>
                                                                                    <td>{{$post->alllevelrafters}} шт</td>
                                                                                    <td>{{$post->alllevelpanels}} шт</td>
                                                                                    <td>{{$post->bash}} шт</td>
                                                                                    <td>{{$post->jack}} шт</td>
                                                                                    <td>{{$post->equipment}} руб</td>
                                                                                    <td>{{$post->contract}}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th>Сумма залога, руб.</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>{{$post->collateral}} руб</th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                        </tr>
                                                                        @else
                                                                        <tr >
                                                                            <td title="
                                                                                @if(auth()->user()->name == $post->added_by)
                                                                                Клиента добавил я
                                                                                @else
                                                                                    Клиента добавил {{$post->added_by}}
                                                                                @endif" >
                                                                                {{ $post->id }}
                                                                            </td>
                                                                            <td >
                                                                                <div style="display: grid; grid-template-columns: repeat(3,35px);
                                                                                grid-gap: 1px;">
                                                                                    <form action="{{ route('customerbase.destroy', $post->id) }}" method="POST">
                                                                                        {{ csrf_field() }}
                                                                                        {{ method_field('DELETE') }}

                                                                                        <button title="удалить клиента" type="submit" class="btn btn-secondary btn-sm">
                                                                                            <i
                                                                                            class="fas fa-trash-alt"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                    <a href="{{ route('customerbase.edit', $post->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                                                        <i class="fas fa-pencil-alt"></i>
                                                                                    </a>
                                                                                    <form role="form" method="post" action="{{ route('updateStatus', $post->id)  }}" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <button title="оплачено"  class="btn btn-success btn-sm"  type="submit">
                                                                                            <i class="fas fa-thumbs-up"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                    <form role="form" method="post" action="{{ route('updateStatusUnpaid', $post->id)  }}" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <button title="не оплачено" class="btn btn-danger btn-sm" type="submit">
                                                                                            <i class="fas fa-thumbs-down"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                    <form role="form" method="post" action="{{ route('updateStatusClient', $post->id)  }}" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <button title="хороший постоянный клиент" class="btn btn-success btn-sm" type="submit">
                                                                                            <i class="fas fa-handshake"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                    <form role="form" method="post" action="{{ route('updateStatusDebtor', $post->id)  }}" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <button title="ДОЛЖНИК" class="btn btn-danger btn-sm" type="submit">
                                                                                            <i class="fas fa-handshake-alt-slash"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                    <form role="form" method="post" action="{{ route('updateStatusInfo', $post->id)  }}" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <button class="btn btn-info btn-sm" type="submit" title="отгружено">
                                                                                            <i class="fas fa-dolly"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                    <form role="form" method="post" action="{{ route('updateStatusRefund', $post->id)  }}" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <button class="btn btn-info btn-sm" type="submit" title="частичный возврат">
                                                                                            <i class="fas fa-dolly-flatbed"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                </div>

                                                                            </td>
                                                                            <td>{{$post->sign}}</td>
                                                                            <td>{{$post->act}}</td>
                                                                            <td>{{$post->dateact}}</td>
                                                                            <td>{{$post->counterparty}}</td>
                                                                            <td>{{$post->phone}}</td>
                                                                            <td>
                                                                                <table>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <th>Продолжительность аренды</th>
                                                                                            <th>Сумма договора</th>
                                                                                            <th>н/ б/н</th>
                                                                                            <th>Оплачено по</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>{{$post->duration}}</td>
                                                                                            <td>{{$post->contractamount}} руб</td>
                                                                                            <td>{{$post->calculation}}</td>
                                                                                            <td>{{$post->paidby}}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td>
                                                                                <table>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <th>Вид</th>
                                                                                            <th>Стоимость рейса</th>
                                                                                            <th>Кол-во рейсов</th>
                                                                                            <th>Сумма доставки, руб.</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>{{$post->view}}</td>
                                                                                            <td>{{$post->cost}} руб</td>
                                                                                            <td>{{$post->flights}}</td>
                                                                                            <td>{{$post->amount}} руб</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td>
                                                                                <table>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <th>Площадь лесов, кв.м.</th>
                                                                                            <th>Рама с лестницей</th>
                                                                                            <th>Рама проходная</th>
                                                                                            <th>Диагональ 2я</th>
                                                                                            <th>Связь 1я</th>
                                                                                            <th>Ригель</th>
                                                                                            <th>Щит</th>
                                                                                            <th>Башмак</th>
                                                                                            <th>Домкрат витовой</th>
                                                                                            <th>Сумма оборудования</th>
                                                                                            <th>Дата договора</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>{{$post->area}} кв.м.</td>
                                                                                            <td>{{$post->stairsframes}} шт</td>
                                                                                            <td>{{$post->passageframes}} шт</td>
                                                                                            <td>{{$post->doubleconnections}} шт</td>
                                                                                            <td>{{$post->singleconnections}} шт</td>
                                                                                            <td>{{$post->alllevelrafters}} шт</td>
                                                                                            <td>{{$post->alllevelpanels}} шт</td>
                                                                                            <td>{{$post->bash}} шт</td>
                                                                                            <td>{{$post->jack}} шт</td>
                                                                                            <td>{{$post->equipment}} руб</td>
                                                                                            <td>{{$post->contract}}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td>
                                                                                <table>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <th>Сумма залога, руб.</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th>{{$post->collateral}} руб</th>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                                </tr>
                                                                        @endif
                                            </thead>
                                        @endforeach

                                    </table>

                                @endif
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Остаток</th>
                                                <th>Рама с лестницей</th>
                                                <th>Рама проходная</th>
                                                <th>Диагональ 2я</th>
                                                <th>Связь 1я</th>
                                                <th>Ригель</th>
                                                <th>Щит</th>
                                                <th>Башмак</th>
                                                <th>Домкрат витовой</th>
                                                <th>Сумма оборудования</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>ПО КОНТРАГЕНТУ</th>
                                                <th>{{ $stairsframes}} шт</th>
                                                <th>{{$passageframes}} шт</th>
                                                <th>{{$doubleconnections}} шт</th>
                                                <th>{{$singleconnections}} шт</th>
                                                <th>{{$alllevelrafters}} шт</th>
                                                <th>{{$alllevelpanels}} шт</th>
                                                <th>{{$bash}} шт</th>
                                                <th>{{$jack}} шт</th>
                                                <th>{{  $equipment}} руб</th>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            @foreach($stock  as $post)
                                            <tr>
                                                <th>НА СКЛАДЕ</th>
                                                <th>{{$post->lesa}} шт</th>
                                                <th>{{$post->rama}} шт</th>
                                                <th>{{$post->ramadioganal}} шт</th>
                                                <th>{{$post->conect}} шт</th>
                                                <th>{{$post->rigel}} шт</th>
                                                <th>{{$post->nastil}} шт</th>
                                                <th>{{$post->bash}} шт</th>
                                                <th>{{$post->jack}} шт</th>
                                                <th>{{($post->lesa * 1500) + ($post->rama * 1300)+ ($post->ramadioganal * 530) + ($post->conect * 300) + ($post->nastil * 250) + ($post->rigel * 800) + ($post->bash * 100) + ($post->jack * 800) }} руб</th>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                     </table>
                                </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $base->links() }}

                           {{--  <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul> --}}
                        </div>
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
