@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>База клиентов вышки-туры</h1>
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
                            <a href="{{ route('customerbasetours.create') }}" class="fa fa-user-plus"> Добавить клиента</a>
                            {{-- <button class="btn btn-danger btn-sm" onclick="toggleCheckboxes()">Удалить клиентов </button> --}}
                            @if (count($basetours))
                                <div class="table-responsive">
                                    <form class="form_customer" action="{{ route('customerbasetours.index') }}" method="GET">
                                        <input type="text" name="search" placeholder="Введите имя клиента" value="{{ request('search') }}">
                                        <input type="date" name="filter_date" placeholder="Введите дату акта">
                                        <button class="btn btn-primary" type="submit">Найти</button>
                                    </form>
                                    <a id='finace_btn_report_lesa' href="{{ route('pdf.generate.Tours') }}" class="btn btn-success">скачать отчет <i class='fas fa-file-pdf'></i> </a>
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                             <th>№</th>
                                            <th>Действия</th>
                                            <th>Признак</th>
                                            <th>Акт</th>
                                            <th>Дата акта</th>
                                            <th>Наименование контрагента</th>
                                            <th>Адресс доставки</th>
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
                                                        <th>Наименование вышек</th>
                                                        <th>основание 1,5*2 м. с 4-мя колёсами</th>
                                                        <th>площадка 0,45*2 м.</th>
                                                        <th>рама 1*2 м.</th>
                                                        <th>ригель 2 м.</th>
                                                        <th>связи 0,7 м.</th>
                                                        <th>рама 1*1 м.</th>
                                                        <th>упор стабильности 2 м.</th>
                                                        <th>основание 0,7*2 м. с 4-мя колёсами</th>
                                                        <th>площадка 0,7*1,5 м.</th>
                                                        <th>рама 0,7*2 м. </th>
                                                        <th>ригель 1,5 м.</th>
                                                        <th>рама 0,7*1 м.</th>
                                                        <th>основание 2,4 м. с 2-мя колёсами</th>
                                                        <th>соединительная профильная труба 2 м.</th>
                                                        <th>рама 1,4*2 м.</th>
                                                        <th>связи 0,9 м.</th>
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

                                        @foreach($basetours  as $post)
                                        <thead>
                                            @if($post->sign == 'оплачено')
                                            <tr style="background: green; color:white">
                                            <td >
                                                {{ $post->id }}
                                            </td>
                                            <td style="background: white">
                                                <div style="display: grid; grid-template-columns: repeat(3,35px);
                                                grid-gap: 1px; ">
                                                    <form action="{{ route('customerbasetours.destroy', $post->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <button title="удалить клиента" type="submit" class="btn btn-secondary btn-sm">
                                                            <i
                                                            class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('customerbasetours.edit', $post->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form role="form" method="post" action="{{ route('updateStatusTours', $post->id)  }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <button title="оплачено"  class="btn btn-success btn-sm"  type="submit">
                                                            <i class="fas fa-thumbs-up"></i>
                                                        </button>
                                                    </form>
                                                    <form role="form" method="post" action="{{ route('updateStatusUnpaidTours', $post->id)  }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <button title="не оплачено" class="btn btn-danger btn-sm" type="submit">
                                                            <i class="fas fa-thumbs-down"></i>
                                                        </button>
                                                    </form>
                                                    <form role="form" method="post" action="{{ route('updateStatusClientTours', $post->id)  }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <button title="хороший постоянный клиент" class="btn btn-success btn-sm" type="submit">
                                                            <i class="fas fa-handshake"></i>
                                                        </button>
                                                    </form>
                                                    <form role="form" method="post" action="{{ route('updateStatusDebtorTours', $post->id)  }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <button title="ДОЛЖНИК" class="btn btn-danger btn-sm" type="submit">
                                                            <i class="fas fa-handshake-alt-slash"></i>
                                                        </button>
                                                    </form>
                                                    <form role="form" method="post" action="{{ route('updateStatusInfoTours', $post->id)  }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-info btn-sm" type="submit" title="отгружено">
                                                            <i class="fas fa-dolly"></i>
                                                        </button>
                                                    </form>
                                                    <form role="form" method="post" action="{{ route('updateStatusRefundTours', $post->id)  }}" enctype="multipart/form-data">
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
                                            <td>{{$post->adreess}}</td>
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
                                                        <th>Наименование вышек</th>
                                                        <th>основание 1,5*2 м. с 4-мя колёсами</th>
                                                        <th>площадка 0,45*2 м.</th>
                                                        <th>рама 1*2 м.</th>
                                                        <th>ригель 2 м.</th>
                                                        <th>связи 0,7 м.</th>
                                                        <th>рама 1*1 м.</th>
                                                        <th>упор стабильности 2 м.</th>
                                                        <th>основание 0,7*2 м. с 4-мя колёсами</th>
                                                        <th>площадка 0,7*1,5 м.</th>
                                                        <th>рама 0,7*2 м. </th>
                                                        <th>ригель 1,5 м.</th>
                                                        <th>рама 0,7*1 м.</th>
                                                        <th>основание 2,4 м. с 2-мя колёсами</th>
                                                        <th>соединительная профильная труба 2 м.</th>
                                                        <th>рама 1,4*2 м.</th>
                                                        <th>связи 0,9 м.</th>
                                                        <th>Сумма оборудования</th>
                                                        <th>Дата договора</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{{$post->name_tours}}</td>
                                                            <td>{{$post->footing1_5}} шт</td>
                                                            <td>{{$post->area0_45}} шт</td>
                                                            <td>{{$post->rama1_2}} шт</td>
                                                            <td>{{$post->rigel2}} шт</td>
                                                            <td>{{$post->link0_7}} шт</td>
                                                            <td>{{$post->rama1_1}} шт</td>
                                                            <td>{{$post->emphasis}} шт</td>
                                                            <td>{{$post->footing0_7}} шт</td>
                                                            <td>{{$post->area07_15}} шт</td>
                                                            <td>{{$post->rama0_7}} шт</td>
                                                            <td>{{$post->rigel1_5}} шт</td>
                                                            <td>{{$post->rama0_7_1}} шт</td>
                                                            <td>{{$post->footing2_4}} шт</td>
                                                            <td>{{$post->pipe}} шт</td>
                                                            <td>{{$post->rama1_4}} шт</td>
                                                            <td>{{$post->link0_9}} шт</td>
                                                            <td>{{$post->sum_equipment}} руб</td>
                                                            <td>{{$post->data_contract}} </td>
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
                                                            <th>{{$post->deposit}} руб</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                                </tr>
                                                @elseif($post->sign == 'не оплачено')
                                                <tr style="background: red; color:white">
                                                    <td >
                                                        {{ $post->id }}
                                                    </td>
                                                    <td style="background: white">
                                                        <div style="display: grid; grid-template-columns: repeat(3,35px);
                                                        grid-gap: 1px;">
                                                            <form action="{{ route('customerbasetours.destroy', $post->id) }}" method="POST">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}

                                                                <button title="удалить клиента" type="submit" class="btn btn-secondary btn-sm">
                                                                    <i
                                                                    class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                            <a href="{{ route('customerbasetours.edit', $post->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <form role="form" method="post" action="{{ route('updateStatusTours', $post->id)  }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <button title="оплачено"  class="btn btn-success btn-sm"  type="submit">
                                                                    <i class="fas fa-thumbs-up"></i>
                                                                </button>
                                                            </form>
                                                            <form role="form" method="post" action="{{ route('updateStatusUnpaidTours', $post->id)  }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <button title="не оплачено" class="btn btn-danger btn-sm" type="submit">
                                                                    <i class="fas fa-thumbs-down"></i>
                                                                </button>
                                                            </form>
                                                            <form role="form" method="post" action="{{ route('updateStatusClientTours', $post->id)  }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <button title="хороший постоянный клиент" class="btn btn-success btn-sm" type="submit">
                                                                    <i class="fas fa-handshake"></i>
                                                                </button>
                                                            </form>
                                                            <form role="form" method="post" action="{{ route('updateStatusDebtorTours', $post->id)  }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <button title="ДОЛЖНИК" class="btn btn-danger btn-sm" type="submit">
                                                                    <i class="fas fa-handshake-alt-slash"></i>
                                                                </button>
                                                            </form>
                                                            <form role="form" method="post" action="{{ route('updateStatusInfoTours', $post->id)  }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <button class="btn btn-info btn-sm" type="submit" title="отгружено">
                                                                    <i class="fas fa-dolly"></i>
                                                                </button>
                                                            </form>
                                                            <form role="form" method="post" action="{{ route('updateStatusRefundTours', $post->id)  }}" enctype="multipart/form-data">
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
                                                    <td>{{$post->adreess}}</td>
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
                                                                    <th>Наименование вышек</th>
                                                                    <th>основание 1,5*2 м. с 4-мя колёсами</th>
                                                                    <th>площадка 0,45*2 м.</th>
                                                                    <th>рама 1*2 м.</th>
                                                                    <th>ригель 2 м.</th>
                                                                    <th>связи 0,7 м.</th>
                                                                    <th>рама 1*1 м.</th>
                                                                    <th>упор стабильности 2 м.</th>
                                                                    <th>основание 0,7*2 м. с 4-мя колёсами</th>
                                                                    <th>площадка 0,7*1,5 м.</th>
                                                                    <th>рама 0,7*2 м. </th>
                                                                    <th>ригель 1,5 м.</th>
                                                                    <th>рама 0,7*1 м.</th>
                                                                    <th>основание 2,4 м. с 2-мя колёсами</th>
                                                                    <th>соединительная профильная труба 2 м.</th>
                                                                    <th>рама 1,4*2 м.</th>
                                                                    <th>связи 0,9 м.</th>
                                                                    <th>Сумма оборудования</th>
                                                                    <th>Дата договора</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{$post->name_tours}}</td>
                                                                    <td>{{$post->footing1_5}} шт</td>
                                                                    <td>{{$post->area0_45}} шт</td>
                                                                    <td>{{$post->rama1_2}} шт</td>
                                                                    <td>{{$post->rigel2}} шт</td>
                                                                    <td>{{$post->link0_7}} шт</td>
                                                                    <td>{{$post->rama1_1}} шт</td>
                                                                    <td>{{$post->emphasis}} шт</td>
                                                                    <td>{{$post->footing0_7}} шт</td>
                                                                    <td>{{$post->area07_15}} шт</td>
                                                                    <td>{{$post->rama0_7}} шт</td>
                                                                    <td>{{$post->rigel1_5}} шт</td>
                                                                    <td>{{$post->rama0_7_1}} шт</td>
                                                                    <td>{{$post->footing2_4}} шт</td>
                                                                    <td>{{$post->pipe}} шт</td>
                                                                    <td>{{$post->rama1_4}} шт</td>
                                                                    <td>{{$post->link0_9}} шт</td>
                                                                    <td>{{$post->sum_equipment}} руб</td>
                                                                    <td>{{$post->data_contract}} </td>
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
                                                                    <th>{{$post->deposit}} руб</th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                        </tr>
                                                        @elseif($post->sign == 'хороший постоянный клиент')
                                                        <tr style="background: LightGreen; color:black">
                                                            <td >
                                                                {{ $post->id }}
                                                            </td>
                                                            <td style="background: white">
                                                                <div style="display: grid; grid-template-columns: repeat(3,35px);
                                                                grid-gap: 1px;">
                                                                    <form action="{{ route('customerbasetours.destroy', $post->id) }}" method="POST">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}

                                                                        <button title="удалить клиента" type="submit" class="btn btn-secondary btn-sm">
                                                                            <i
                                                                            class="fas fa-trash-alt"></i>
                                                                        </button>
                                                                    </form>
                                                                    <a href="{{ route('customerbasetours.edit', $post->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form role="form" method="post" action="{{ route('updateStatusTours', $post->id)  }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button title="оплачено"  class="btn btn-success btn-sm"  type="submit">
                                                                            <i class="fas fa-thumbs-up"></i>
                                                                        </button>
                                                                    </form>
                                                                    <form role="form" method="post" action="{{ route('updateStatusUnpaidTours', $post->id)  }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button title="не оплачено" class="btn btn-danger btn-sm" type="submit">
                                                                            <i class="fas fa-thumbs-down"></i>
                                                                        </button>
                                                                    </form>
                                                                    <form role="form" method="post" action="{{ route('updateStatusClientTours', $post->id)  }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button title="хороший постоянный клиент" class="btn btn-success btn-sm" type="submit">
                                                                            <i class="fas fa-handshake"></i>
                                                                        </button>
                                                                    </form>
                                                                    <form role="form" method="post" action="{{ route('updateStatusDebtorTours', $post->id)  }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button title="ДОЛЖНИК" class="btn btn-danger btn-sm" type="submit">
                                                                            <i class="fas fa-handshake-alt-slash"></i>
                                                                        </button>
                                                                    </form>
                                                                    <form role="form" method="post" action="{{ route('updateStatusInfoTours', $post->id)  }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button class="btn btn-info btn-sm" type="submit" title="отгружено">
                                                                            <i class="fas fa-dolly"></i>
                                                                        </button>
                                                                    </form>
                                                                    <form role="form" method="post" action="{{ route('updateStatusRefundTours', $post->id)  }}" enctype="multipart/form-data">
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
                                                            <td>{{$post->adreess}}</td>
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
                                                                            <th>Наименование вышек</th>
                                                                            <th>основание 1,5*2 м. с 4-мя колёсами</th>
                                                                            <th>площадка 0,45*2 м.</th>
                                                                            <th>рама 1*2 м.</th>
                                                                            <th>ригель 2 м.</th>
                                                                            <th>связи 0,7 м.</th>
                                                                            <th>рама 1*1 м.</th>
                                                                            <th>упор стабильности 2 м.</th>
                                                                            <th>основание 0,7*2 м. с 4-мя колёсами</th>
                                                                            <th>площадка 0,7*1,5 м.</th>
                                                                            <th>рама 0,7*2 м. </th>
                                                                            <th>ригель 1,5 м.</th>
                                                                            <th>рама 0,7*1 м.</th>
                                                                            <th>основание 2,4 м. с 2-мя колёсами</th>
                                                                            <th>соединительная профильная труба 2 м.</th>
                                                                            <th>рама 1,4*2 м.</th>
                                                                            <th>связи 0,9 м.</th>
                                                                            <th>Сумма оборудования</th>
                                                                            <th>Дата договора</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>{{$post->name_tours}}</td>
                                                                            <td>{{$post->footing1_5}} шт</td>
                                                                            <td>{{$post->area0_45}} шт</td>
                                                                            <td>{{$post->rama1_2}} шт</td>
                                                                            <td>{{$post->rigel2}} шт</td>
                                                                            <td>{{$post->link0_7}} шт</td>
                                                                            <td>{{$post->rama1_1}} шт</td>
                                                                            <td>{{$post->emphasis}} шт</td>
                                                                            <td>{{$post->footing0_7}} шт</td>
                                                                            <td>{{$post->area07_15}} шт</td>
                                                                            <td>{{$post->rama0_7}} шт</td>
                                                                            <td>{{$post->rigel1_5}} шт</td>
                                                                            <td>{{$post->rama0_7_1}} шт</td>
                                                                            <td>{{$post->footing2_4}} шт</td>
                                                                            <td>{{$post->pipe}} шт</td>
                                                                            <td>{{$post->rama1_4}} шт</td>
                                                                            <td>{{$post->link0_9}} шт</td>
                                                                            <td>{{$post->sum_equipment}} руб</td>
                                                                            <td>{{$post->data_contract}} </td>
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
                                                                            <th>{{$post->deposit}} руб</th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                                </tr>
                                                                @elseif($post->sign == 'ДОЛЖНИК')
                                                                <tr style="background: LightCoral; color:white">
                                                                    <td >
                                                                        {{ $post->id }}
                                                                    </td>
                                                                    <td style="background: white">
                                                                        <div style="display: grid; grid-template-columns: repeat(3,35px);
                                                                        grid-gap: 1px;">
                                                                            <form action="{{ route('customerbasetours.destroy', $post->id) }}" method="POST">
                                                                                {{ csrf_field() }}
                                                                                {{ method_field('DELETE') }}

                                                                                <button title="удалить клиента" type="submit" class="btn btn-secondary btn-sm">
                                                                                    <i
                                                                                    class="fas fa-trash-alt"></i>
                                                                                </button>
                                                                            </form>
                                                                            <a href="{{ route('customerbasetours.edit', $post->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </a>
                                                                            <form role="form" method="post" action="{{ route('updateStatusTours', $post->id)  }}" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button title="оплачено"  class="btn btn-success btn-sm"  type="submit">
                                                                                    <i class="fas fa-thumbs-up"></i>
                                                                                </button>
                                                                            </form>
                                                                            <form role="form" method="post" action="{{ route('updateStatusUnpaidTours', $post->id)  }}" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button title="не оплачено" class="btn btn-danger btn-sm" type="submit">
                                                                                    <i class="fas fa-thumbs-down"></i>
                                                                                </button>
                                                                            </form>
                                                                            <form role="form" method="post" action="{{ route('updateStatusClientTours', $post->id)  }}" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button title="хороший постоянный клиент" class="btn btn-success btn-sm" type="submit">
                                                                                    <i class="fas fa-handshake"></i>
                                                                                </button>
                                                                            </form>
                                                                            <form role="form" method="post" action="{{ route('updateStatusDebtorTours', $post->id)  }}" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button title="ДОЛЖНИК" class="btn btn-danger btn-sm" type="submit">
                                                                                    <i class="fas fa-handshake-alt-slash"></i>
                                                                                </button>
                                                                            </form>
                                                                            <form role="form" method="post" action="{{ route('updateStatusInfoTours', $post->id)  }}" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button class="btn btn-info btn-sm" type="submit" title="отгружено">
                                                                                    <i class="fas fa-dolly"></i>
                                                                                </button>
                                                                            </form>
                                                                            <form role="form" method="post" action="{{ route('updateStatusRefundTours', $post->id)  }}" enctype="multipart/form-data">
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
                                                                    <td>{{$post->adreess}}</td>
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
                                                                                    <th>Наименование вышек</th>
                                                                                    <th>основание 1,5*2 м. с 4-мя колёсами</th>
                                                                                    <th>площадка 0,45*2 м.</th>
                                                                                    <th>рама 1*2 м.</th>
                                                                                    <th>ригель 2 м.</th>
                                                                                    <th>связи 0,7 м.</th>
                                                                                    <th>рама 1*1 м.</th>
                                                                                    <th>упор стабильности 2 м.</th>
                                                                                    <th>основание 0,7*2 м. с 4-мя колёсами</th>
                                                                                    <th>площадка 0,7*1,5 м.</th>
                                                                                    <th>рама 0,7*2 м. </th>
                                                                                    <th>ригель 1,5 м.</th>
                                                                                    <th>рама 0,7*1 м.</th>
                                                                                    <th>основание 2,4 м. с 2-мя колёсами</th>
                                                                                    <th>соединительная профильная труба 2 м.</th>
                                                                                    <th>рама 1,4*2 м.</th>
                                                                                    <th>связи 0,9 м.</th>
                                                                                    <th>Сумма оборудования</th>
                                                                                    <th>Дата договора</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{$post->name_tours}}</td>
                                                                                    <td>{{$post->footing1_5}} шт</td>
                                                                                    <td>{{$post->area0_45}} шт</td>
                                                                                    <td>{{$post->rama1_2}} шт</td>
                                                                                    <td>{{$post->rigel2}} шт</td>
                                                                                    <td>{{$post->link0_7}} шт</td>
                                                                                    <td>{{$post->rama1_1}} шт</td>
                                                                                    <td>{{$post->emphasis}} шт</td>
                                                                                    <td>{{$post->footing0_7}} шт</td>
                                                                                    <td>{{$post->area07_15}} шт</td>
                                                                                    <td>{{$post->rama0_7}} шт</td>
                                                                                    <td>{{$post->rigel1_5}} шт</td>
                                                                                    <td>{{$post->rama0_7_1}} шт</td>
                                                                                    <td>{{$post->footing2_4}} шт</td>
                                                                                    <td>{{$post->pipe}} шт</td>
                                                                                    <td>{{$post->rama1_4}} шт</td>
                                                                                    <td>{{$post->link0_9}} шт</td>
                                                                                    <td>{{$post->sum_equipment}} руб</td>
                                                                                    <td>{{$post->data_contract}} </td>
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
                                                                                    <th>{{$post->deposit}} руб</th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                        </tr>
                                                                        @else
                                                                        <tr >
                                                                            <td >
                                                                                {{ $post->id }}
                                                                            </td>
                                                                            <td >
                                                                                <div style="display: grid; grid-template-columns: repeat(3,35px);
                                                                                grid-gap: 1px;">
                                                                                    <form action="{{ route('customerbasetours.destroy', $post->id) }}" method="POST">
                                                                                        {{ csrf_field() }}
                                                                                        {{ method_field('DELETE') }}

                                                                                        <button title="удалить клиента" type="submit" class="btn btn-secondary btn-sm">
                                                                                            <i
                                                                                            class="fas fa-trash-alt"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                    <a href="{{ route('customerbasetours.edit', $post->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                                                        <i class="fas fa-pencil-alt"></i>
                                                                                    </a>
                                                                                    <form role="form" method="post" action="{{ route('updateStatusTours', $post->id)  }}" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <button title="оплачено"  class="btn btn-success btn-sm"  type="submit">
                                                                                            <i class="fas fa-thumbs-up"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                    <form role="form" method="post" action="{{ route('updateStatusUnpaidTours', $post->id)  }}" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <button title="не оплачено" class="btn btn-danger btn-sm" type="submit">
                                                                                            <i class="fas fa-thumbs-down"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                    <form role="form" method="post" action="{{ route('updateStatusClientTours', $post->id)  }}" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <button title="хороший постоянный клиент" class="btn btn-success btn-sm" type="submit">
                                                                                            <i class="fas fa-handshake"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                    <form role="form" method="post" action="{{ route('updateStatusDebtorTours', $post->id)  }}" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <button title="ДОЛЖНИК" class="btn btn-danger btn-sm" type="submit">
                                                                                            <i class="fas fa-handshake-alt-slash"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                    <form role="form" method="post" action="{{ route('updateStatusInfoTours', $post->id)  }}" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <button class="btn btn-info btn-sm" type="submit" title="отгружено">
                                                                                            <i class="fas fa-dolly"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                    <form role="form" method="post" action="{{ route('updateStatusRefundTours', $post->id)  }}" enctype="multipart/form-data">
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
                                                                            <td>{{$post->adreess}}</td>
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
                                                                                            <th>Наименование вышек</th>
                                                                                            <th>основание 1,5*2 м. с 4-мя колёсами</th>
                                                                                            <th>площадка 0,45*2 м.</th>
                                                                                            <th>рама 1*2 м.</th>
                                                                                            <th>ригель 2 м.</th>
                                                                                            <th>связи 0,7 м.</th>
                                                                                            <th>рама 1*1 м.</th>
                                                                                            <th>упор стабильности 2 м.</th>
                                                                                            <th>основание 0,7*2 м. с 4-мя колёсами</th>
                                                                                            <th>площадка 0,7*1,5 м.</th>
                                                                                            <th>рама 0,7*2 м. </th>
                                                                                            <th>ригель 1,5 м.</th>
                                                                                            <th>рама 0,7*1 м.</th>
                                                                                            <th>основание 2,4 м. с 2-мя колёсами</th>
                                                                                            <th>соединительная профильная труба 2 м.</th>
                                                                                            <th>рама 1,4*2 м.</th>
                                                                                            <th>связи 0,9 м.</th>
                                                                                            <th>Сумма оборудования</th>
                                                                                            <th>Дата договора</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>{{$post->name_tours}}</td>
                                                                                            <td>{{$post->footing1_5}} шт</td>
                                                                                            <td>{{$post->area0_45}} шт</td>
                                                                                            <td>{{$post->rama1_2}} шт</td>
                                                                                            <td>{{$post->rigel2}} шт</td>
                                                                                            <td>{{$post->link0_7}} шт</td>
                                                                                            <td>{{$post->rama1_1}} шт</td>
                                                                                            <td>{{$post->emphasis}} шт</td>
                                                                                            <td>{{$post->footing0_7}} шт</td>
                                                                                            <td>{{$post->area07_15}} шт</td>
                                                                                            <td>{{$post->rama0_7}} шт</td>
                                                                                            <td>{{$post->rigel1_5}} шт</td>
                                                                                            <td>{{$post->rama0_7_1}} шт</td>
                                                                                            <td>{{$post->footing2_4}} шт</td>
                                                                                            <td>{{$post->pipe}} шт</td>
                                                                                            <td>{{$post->rama1_4}} шт</td>
                                                                                            <td>{{$post->link0_9}} шт</td>
                                                                                            <td>{{$post->sum_equipment}} руб</td>
                                                                                            <td>{{$post->data_contract}} </td>
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
                                                                                            <th>{{$post->deposit}} руб</th>
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
                                                <th>основание 1,5*2 м. с 4-мя колёсами</th>
                                                <th>площадка 0,45*2 м.</th>
                                                <th>рама 1*2 м.</th>
                                                <th>ригель 2 м.</th>
                                                <th>связи 0,7 м.</th>
                                                <th>рама 1*1 м.</th>
                                                <th>упор стабильности 2 м.</th>
                                                <th>основание 0,7*2 м. с 4-мя колёсами</th>
                                                <th>площадка 0,7*1,5 м.</th>
                                                <th>рама 0,7*2 м. </th>
                                                <th>ригель 1,5 м.</th>
                                                <th>рама 0,7*1 м.</th>
                                                <th>основание 2,4 м. с 2-мя колёсами</th>
                                                <th>соединительная профильная труба 2 м.</th>
                                                <th>рама 1,4*2 м.</th>
                                                <th>связи 0,9 м.</th>
                                                <th>Сумма оборудования</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>ПО КОНТРАГЕНТУ</th>
                                                <th>{{ $footing1_5}} шт</th>
                                                <th>{{$area0_45}} шт</th>
                                                <th>{{$rama1_2}} шт</th>
                                                <th>{{$rigel2}} шт</th>
                                                <th>{{$link0_7}} шт</th>
                                                <th>{{$rama1_1}} шт</th>
                                                <th>{{$emphasis}} шт</th>
                                                <th>{{$footing0_7}} шт</th>
                                                <th>{{$area07_15}} шт</th>
                                                <th>{{$rama0_7 }} шт</th>
                                                <th>{{$rigel1_5}} шт</th>
                                                <th>{{$rama0_7_1}} шт</th>
                                                <th>{{$footing2_4}} шт</th>
                                                <th>{{$pipe}} шт</th>
                                                <th>{{$rama1_4}} шт</th>
                                                <th>{{$link0_9}} шт</th>
                                                <th>{{$sum_equipment}} руб</th>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            @foreach($stock  as $post)
                                            <tr>
                                                <th>НА СКЛАДЕ</th>
                                                <th>{{$post->footing1_5}} шт</th>
                                                <th>{{$post->area0_45}} шт</th>
                                                <th>{{$post->rama1_2}} шт</th>
                                                <th>{{$post->rigel2}} шт</th>
                                                <th>{{$post->link0_7}} шт</th>
                                                <th>{{$post->rama1_1}} шт</th>
                                                <th>{{$post->emphasis}} шт</th>
                                                <th>{{$post->footing0_7}} шт</th>
                                                <th>{{$post->area07_15}} шт</th>
                                                <th>{{$post->rama0_7 }} шт</th>
                                                <th>{{$post->rigel1_5}} шт</th>
                                                <th>{{$post->rama0_7_1}} шт</th>
                                                <th>{{$post->footing2_4}} шт</th>
                                                <th>{{$post->pipe}} шт</th>
                                                <th>{{$post->rama1_4}} шт</th>
                                                <th>{{$post->link0_9}} шт</th>
                                                <th>{{($post->footing1_5 * 4000) + ($post->area0_45 * 2000) + ($post->rama1_2 * 1700) + ($post->rigel2 * 450) + ($post->link0_7 * 100) + ($post->rama1_1 * 1000) + ($post->emphasis * 1000) + ($post->footing0_7 * 3600) + ($post->area07_15 * 2100) + ($post->rama0_7 * 1600) + ($post->rigel1_5 * 350) + ($post->rama0_7_1 * 900) + ($post->footing2_4 * 3000) + ($post->pipe * 800) + ($post->rama1_4 * 1800) + ($post->link0_9 * 120) }} руб</th>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                     </table>
                                </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $basetours->links() }}

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
