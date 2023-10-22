@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавления клиента</h1>
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
                                    <form role="form" method="post" action="{{ route('customerbase.store') }}" enctype="multipart/form-data">
                                        @csrf
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
                                                <option value="оплачено">оплачено</option>
                                                <option value="не оплачено">не оплачено</option>
                                                <option value="заключили сделку">заключили сделку</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="act" id="">
                                                <option value="отгружено">отгружено</option>
                                                <option value="частичный возврат">частичный возврат</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="date" name="dateact" id="">
                                        </td>
                                        <td>
                                            <input placeholder="Введите контрагента" type="text" name="counterparty">
                                        </td>
                                        <td><input placeholder="Введите адресс доставки" type="text" name="adreess"></td>
                                        <td>
                                            <input placeholder="Введите номер клиента" type="text-number" name="phone">
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
                                                                <option value="неделя">неделя</option>
                                                                <option value="2 недели">2 недели</option>
                                                                <option value="месяц">месяц</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <input placeholder="Введите сумму договора" type="number" name="contractamount">
                                                        </th>
                                                        <th>
                                                            <select name="calculation" id="">
                                                                <option value="нал">нал</option>
                                                                <option value="б/н">б/н</option>
                                                                <option value="б/н с НДС">б/н с НДС</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <input type="date" name="paidby">
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
                                                            <option value="привоз/увоз">привоз/увоз</option>
                                                            <option value="самовывоз">самовывоз</option>
                                                            <option value="увоз">увоз</option>
                                                            <option value="самопривоз">самопривоз</option>
                                                        </select></th>
                                                        <th><input placeholder="Введите стоимость рейса" name="cost" type="number"></th>
                                                        <th>
                                                            <select name="flights" id="">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <input placeholder="Введите сумму доставки" type="number" name="amount">
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
                                                        <th><input placeholder="Введите длину для автамотического расчета" id="length" type="number"></th>
                                                        <th><input placeholder="Введите высоту для автамотического расчета" id="height" type="number"></th>
                                                        <th><input  name="area" id="area" type="number"></th>
                                                        <th><input  type="number" name="stairsframes" id="stairsFrames"></th>
                                                        <th><input  type="number" name="passageframes" id="passageFrames"></th>
                                                        <th><input  type="number" name="doubleconnections" id="doubleConnections"></th>
                                                        <th><input  type="number" name="singleconnections" id="singleConnections"></th>
                                                        <th><input type="number" name="alllevelrafters" id="allLevelRafters"></th>
                                                        <th><input  type="number" name="alllevelpanels" id="allLevelPanels"></th>
                                                        <th><input   type="number" name="bash" id="bash"></th>
                                                        <th><input  type="number" name="jack" id="jack" name="jack"></th>
                                                        <th><input type="number" name="equipment" id="equipment" name="equipment"></th>
                                                        <th><input placeholder="Дата договора" type="date" name="contract"></th>
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
                                                                <option value="10000">10000</option>
                                                                <option value="20000">20000</option>
                                                                <option value="30000">30000</option>
                                                                <option value="40000">40000</option>
                                                                <option value="50000">50000</option>
                                                                <option value="60000">60000</option>
                                                                <option value="70000">70000</option>
                                                                <option value="74000">74000</option>
                                                                <option value="80000">80000</option>
                                                                <option value="без залога">без залога</option>
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
                                    <button type="submit" class="btn btn-primary">Добавить клиента</button>
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
