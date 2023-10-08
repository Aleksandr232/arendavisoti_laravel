@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Изменить информацию о клиенте</h1>
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

                                <div class="table-responsive">
                                    <form role="form" method="post" action="{{ route('customerbasetours.update', $base->id)  }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                    <table class="table table-bordered table-hover text-nowrap">

                                        <thead>
                                        <tr>
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

                                        </thead>
                                        <td>
                                            <select name="sign" id="">
                                                <option value="оплачено" {{ $base->sign == 'оплачено' ? 'selected' : '' }}>оплачено</option>
                                                <option value="не оплачено" {{ $base->sign == 'не оплачено' ? 'selected' : '' }}>не оплачено</option>
                                                <option value="заключили сделку" {{ $base->sign == 'заключили сделку' ? 'selected' : '' }}>заключили сделку</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="act" id="">
                                                <option value="отгружено" {{ $base->act == 'отгружено' ? 'selected' : '' }}>отгружено</option>
                                                <option value="частичный возврат" {{ $base->act == 'частичный возврат' ? 'selected' : '' }} >частичный возврат</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="date" value="{{$base->dateact}}" name="dateact" id="">
                                        </td>
                                        <td>
                                            <input placeholder="Введите контрагента" value="{{$base->counterparty}}" type="text" name="counterparty">
                                        </td>
                                        <td><input placeholder="Введите адресс доставки" value="{{$base->adreess}}" type="text" name="adreess"></td>
                                        <td>
                                            <input placeholder="Введите номер клиента" value="{{$base->phone}}" type="text-number" name="phone">
                                        </td>
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
                                                        <th>
                                                            <select name="duration" id="">
                                                                <option value="7 дней" {{ $base->duration == '7 дней' ? 'selected' : '' }}>7 дней</option>
                                                                <option value="14 дней" {{ $base->duration == '14 дней' ? 'selected' : '' }}>14 дней</option>
                                                                <option value="30 дней" {{ $base->duration == '30 дней' ? 'selected' : '' }}>30 дней</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <input placeholder="Введите сумму договора" value="{{$base->contractamount}}" type="number" name="contractamount">
                                                        </th>
                                                        <th>
                                                            <select name="calculation" id="">
                                                                <option value="нал" {{ $base->calculation == 'нал' ? 'selected' : '' }}>нал</option>
                                                                <option value="б/н" {{ $base->calculation == 'б/н' ? 'selected' : '' }}>б/н</option>
                                                                <option value="б/н с НДС" {{ $base->calculation == 'б/н с НДС' ? 'selected' : '' }}>б/н с НДС</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <input value="{{$base->paidby}}" type="date" name="paidby">
                                                        </th>
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
                                                        <th><select name="view" id="">
                                                            <option value="привоз/увоз" {{ $base->view == 'привоз/увоз' ? 'selected' : '' }}>привоз/увоз</option>
                                                            <option value="самовывоз" {{ $base->view == 'самовывоз' ? 'selected' : '' }}>самовывоз</option>
                                                            <option value="увоз" {{ $base->view == 'увоз' ? 'selected' : '' }}>увоз</option>
                                                            <option value="самопривоз" {{ $base->view == 'самопривоз' ? 'selected' : '' }}>самопривоз</option>
                                                        </select></th>
                                                        <th><input value="{{$base->cost}}" placeholder="Введите стоимость рейса" name="cost" type="number"></th>
                                                        <th>
                                                            <select name="flights" id="">
                                                                <option value="1" {{ $base->flights == '1' ? 'selected' : '' }}>1</option>
                                                                <option value="2" {{ $base->flights == '2' ? 'selected' : '' }}>2</option>
                                                                <option value="3" {{ $base->flights == '3' ? 'selected' : '' }}>3</option>
                                                                <option value="4" {{ $base->flights == '4' ? 'selected' : '' }}>4</option>
                                                                <option value="5" {{ $base->flights == '5' ? 'selected' : '' }}>5</option>
                                                                <option value="6" {{ $base->flights == '6' ? 'selected' : '' }}>6</option>
                                                                <option value="7" {{ $base->flights == '7' ? 'selected' : '' }}>7</option>
                                                                <option value="8" {{ $base->flights == '8' ? 'selected' : '' }}>8</option>
                                                                <option value="9" {{ $base->flights == '9' ? 'selected' : '' }}>9</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <input value="{{$base->amount}}" placeholder="Введите сумму доставки" type="number" name="amount">
                                                        </th>
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
                                                        <th><input type="text" value="{{$base->name_tours}}" placeholder="введите значения вышки" name="name_tours"></th>
                                                        <th><input oninput="toursSum()" value="{{$base->footing1_5}}" type="number" placeholder="введите значения" id="footing1_5" name="footing1_5"></th>
                                                        <th><input type="number" value="{{$base->area0_45}}" placeholder="введите значения" id="area0_45" name="area0_45"></th>
                                                        <th>
                                                            <input type="number" value="{{$base->rama1_2}}" placeholder="введите значения" id="rama1_2"  name="rama1_2">
                                                        </th>
                                                        <th>
                                                            <input type="number" value="{{$base->rigel2}}" placeholder="введите значения" id="rigel2" name="rigel2">
                                                        </th>
                                                        <th>
                                                            <input type="number" value="{{$base->link0_7}}" placeholder="введите значения" id="link0_7" name="link0_7">
                                                        </th>
                                                        <th>
                                                            <input type="number" value="{{$base->rama1_1}}" placeholder="введите значения" id="rama1_1" name="rama1_1">
                                                        </th>
                                                        <th>
                                                            <input type="number" value="{{$base->emphasis}}" name="emphasis" id="emphasis" placeholder="введите значения">
                                                        </th>
                                                        <th>
                                                            <input type="number" value="{{$base->footing0_7}}" name="footing0_7" id="footing0_7" placeholder="введите значения">
                                                        </th>
                                                        <th>
                                                            <input type="number" value="{{$base->area07_15}}" name="area07_15" id="area07_15" placeholder="введите значения">
                                                        </th>
                                                        <th>
                                                            <input type="number" value="{{$base->rama0_7}}" name="rama0_7" id="rama0_7" placeholder="введите значения">
                                                        </th>
                                                        <th>
                                                            <input type="number" value="{{$base->rigel1_5}}" name="rigel1_5" id="rigel1_5" placeholder="введите значения">
                                                        </th>
                                                        <th>
                                                            <input type="number" value="{{$base->rama0_7_1}}" name="rama0_7_1" id="rama0_7_1" placeholder="введите значения">
                                                        </th>
                                                        <th>
                                                            <input type="number" value="{{$base->footing2_4}}" name="footing2_4" id="footing2_4" placeholder="введите значения">
                                                        </th>
                                                        <th>
                                                            <input type="number" value="{{$base->pipe}}" name="pipe" id="pipe" placeholder="введите значения">
                                                        </th>
                                                        <th>
                                                            <input type="number" value="{{$base->rama1_4}}" name="rama1_4" id="rama1_4" placeholder="введите значения">
                                                        </th>
                                                        <th>
                                                            <input type="number" value="{{$base->link0_9}}" name="link0_9" id="link0_9" placeholder="введите значения">
                                                        </th>
                                                        <th>
                                                            <input type="number" value="{{$base->sum_equipment}}" name="sum_equipment" id="sum_equipment" placeholder="введите значения">
                                                        </th>
                                                        <th>
                                                            <input type="date" value="{{$base->data_contract}}" name="data_contract" placeholder="введите значения">
                                                        </th>

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
                                                        <th>
                                                            <select name="deposit" id="">
                                                                <option value="10000" {{ $base->deposit == '10000' ? 'selected' : '' }}>10000</option>
                                                                <option value="20000" {{ $base->deposit == '20000' ? 'selected' : '' }}>20000</option>
                                                                <option value="30000" {{ $base->deposit == '30000' ? 'selected' : '' }}>30000</option>
                                                                <option value="40000" {{ $base->deposit == '40000' ? 'selected' : '' }}>40000</option>
                                                                <option value="50000" {{ $base->deposit == '50000' ? 'selected' : '' }}>50000</option>
                                                                <option value="60000" {{ $base->deposit == '60000' ? 'selected' : '' }}>60000</option>
                                                                <option value="70000" {{ $base->deposit == '70000' ? 'selected' : '' }}>70000</option>
                                                                <option value="74000" {{ $base->deposit == '74000' ? 'selected' : '' }}>74000</option>
                                                                <option value="80000" {{ $base->deposit == '80000' ? 'selected' : '' }}>80000</option>
                                                                <option value="без залога" {{ $base->deposit == 'без залога' ? 'selected' : '' }}>без залога</option>
                                                            </select>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>


                                    </table>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('customerbasetours.index') }}" type="button" class="btn btn-success">Назад</a>
                                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>

                        <!-- /.card-body -->
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
