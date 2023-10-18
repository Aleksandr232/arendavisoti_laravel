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
                                    <form role="form" method="post" action="{{ route('customerbase.update', $base->id)  }}" enctype="multipart/form-data">
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
                                            <input type="text" value="{{$base->counterparty}}" name="counterparty">
                                        </td>
                                        <td><input value="{{$base->adreess}}" placeholder="Введите адресс доставки" type="text" name="adreess"></td>
                                        <td>
                                            <input type="text-number" value="{{$base->phone}}"  name="phone">
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
                                                                <option value="неделя" {{ $base->duration == 'неделя' ? 'selected' : '' }}>неделя</option>
                                                                <option value="2 недели" {{ $base->duration == '2 недели' ? 'selected' : '' }}>2 недели</option>
                                                                <option value="месяц" {{ $base->duration == 'месяц' ? 'selected' : '' }}>месяц</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <input type="number" value="{{$base->contractamount}}" name="contractamount">
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
                                                        <th><input value="{{$base->cost}}" name="cost" type="number"></th>
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
                                                            <input value="{{$base->amount}}" type="number" name="amount">
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <th>Длина</th>
                                                        <th>Высота</th>
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
                                                        <th><input id="length" type="number"></th>
                                                        <th><input id="height" type="number"></th>
                                                        <th><input value="{{$base->area}}" name="area" id="area" type="number"></th>
                                                        <th><input value="{{$base->stairsframes}}" type="number" name="stairsframes" id="stairsFrames"></th>
                                                        <th><input value="{{$base->passageframes}}" type="number" name="passageframes" id="passageFrames"></th>
                                                        <th><input value="{{$base->doubleconnections}}" type="number" name="doubleconnections" id="doubleConnections"></th>
                                                        <th><input value="{{$base->singleconnections}}" type="number" name="singleconnections" id="singleConnections"></th>
                                                        <th><input value="{{$base->alllevelrafters}}" type="number" name="alllevelrafters" id="allLevelRafters"></th>
                                                        <th><input value="{{$base->alllevelpanels}}" type="number" name="alllevelpanels" id="allLevelPanels"></th>
                                                        <th><input value="{{$base->bash}}" type="number" name="bash" id="bash"></th>
                                                        <th><input value="{{$base->jack}}" type="number" name="jack" id="jack" name="jack"></th>
                                                        <th><input value="{{$base->equipment}}" type="number" name="equipment" id="equipment" name="equipment"></th>
                                                        <th><input value="{{$base->contract}}" type="text-number" name="contract"></th>
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
                                                            <select name="collateral" id="">
                                                                <option value="10000" {{ $base->collateral == '10000' ? 'selected' : '' }}>10000</option>
                                                                <option value="20000" {{ $base->collateral == '20000' ? 'selected' : '' }}>20000</option>
                                                                <option value="30000" {{ $base->collateral == '30000' ? 'selected' : '' }}>30000</option>
                                                                <option value="40000" {{ $base->collateral == '40000' ? 'selected' : '' }}>40000</option>
                                                                <option value="50000" {{ $base->collateral == '50000' ? 'selected' : '' }}>50000</option>
                                                                <option value="60000" {{ $base->collateral == '60000' ? 'selected' : '' }}>60000</option>
                                                                <option value="70000" {{ $base->collateral == '70000' ? 'selected' : '' }}>70000</option>
                                                                <option value="74000" {{ $base->collateral == '74000' ? 'selected' : '' }}>74000</option>
                                                                <option value="80000" {{ $base->collateral == '80000' ? 'selected' : '' }}>80000</option>
                                                                <option value="без залога" {{ $base->collateral == 'без залога' ? 'selected' : '' }}>без залога</option>
                                                            </select>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>


                                    </table>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('customerbase.index') }}" type="button" class="btn btn-success">Назад</a>
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
