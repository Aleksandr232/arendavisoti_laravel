<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\Element\Section;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Facades\Storage;


class WordDocumentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.word.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Получаем данные из заполненной формы
        $name = $request->input('name');
        $title = $request->input('title');
        $order = $request->input('order');
        $address = $request->input('address');
        $prices = $request->input('prices');
        $uraddress = $request->input('uraddress');
        $mailaddress = $request->input('mailaddress');
        $phone = $request->input('phone');
        $email =$request->input('email');
        $orgn = $request->input('orgn');
        $inn = $request->input('inn');
        $kpp = $request->input('kpp');
        $rs = $request->input('rs');
        $ks = $request->input('ks');
        $bank = $request->input('bank');
        $bik = $request->input('bik');

        $text = trans_choice(
            '{1} один|{2} два|{5} пять|{6} шесть|{7} семь|{0} ноль |{6000} Шесть тыс|{1000} Одна тыс|{2000} Две тыс рублей|{3000} Три тыс|{100000} Сто тыс|{10000} десять тыс  ',
            $prices
        );
        // и т.д.

        // Создаем новый документ
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Добавляем элементы в документ и заполняем их данными
        /* $imagePath = 'frontend/img/about-us.jpg';
        $section->addImage($imagePath, array(
            'width' => 200,
            'height' => 200,
        )); */
        /* $fontStyle = array('name' => 'Times New Roman', 'size' => 14);
        $section->addText('Имя: ' . $name, $fontStyle ); */
        $num = rand(1, 999); // генерируем случайное число от 1 до 999
        $num = str_pad($num, 3, "0", STR_PAD_LEFT); // добавляем
        $number =  $num;
        $section->addText('Договор аренды оборудования №' . $number, array('name' => 'Times New Roman', 'size' => 14, 'bold' => true), array('align' => 'center'));
        $section->addText('г. Казань', array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), array('align' => 'left'));
        $section->addText('Индивидуальный предприниматель Зиновьев Михаил Сергеевич, именуемый в дальнейшем "Арендодатель», с одной стороны, и ', array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), array('align' => 'center'));
        $section->addText("«Арендатор», в лице  $name, именуемый в дальнейшем  «Арендатор», с другой стороны, заключили настоящий Договор о нижеследующем:", array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('1. Предмет и общие условия договора', array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), array('align' => 'center'));
        $section->addText('1.1. Предметом настоящего договора аренды является предоставление Арендодателем за обусловленную сторонами договора плату во
        временное пользование Арендатора оборудования, указанного в Акте приема-передачи оборудования в аренду, являющийся
        неотъемлемой частью настоящего Договора, которое будет использовано последним в своих бытовых или других личных потребностях.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('1.2.	Передаваемое в аренду оборудование должно находиться в исправном состоянии и использоваться Арендатором для целей в
        соответствии с назначением арендуемого имущества.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('1.3.	Стороны договора определили, что эксплуатация арендованного оборудования должна обеспечивать его нормальное и безопасное
        использование в соответствии с целями аренды по настоящему договору.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('1.4.	Оборудование, сдаваемое в аренду, является бывшим в употреблении.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('1.5.	Арендатор не имеет права сдавать Оборудование в субаренду.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText("1.6.	Оборудование доставляется и будет использоваться по адресу: $address
        Перемещение оборудования по другому адресу в течение периода аренды должно быть в обязательном порядке согласовано
        с Арендодателем.
        ", array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('1.7.	Арендатор производит доставку и вывоз оборудования своими силами.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('2. Арендодатель обязуется', array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), array('align' => 'center'));
        $section->addText('2.1.	Передать оборудование по Акту приема-передачи оборудования в аренду Арендатору в течение 3 рабочих дней с момента
        поступления денежных средств за аренду первого арендного периода на расчетный счет Арендодателя.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('2.2.	Передать Арендатору оборудование, предусмотренное настоящим договором, в состоянии, соответствующем условиям договора
        аренды, производственному назначению арендованного оборудования и его пригодности для эксплуатации.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('2.3.	Арендодатель обязан в день, согласованным с Арендатором, принять Оборудование по списку в Акте приёма-передачи оборудования
        в аренду, после чего отдать залог арендатору (при его наличии) при возврате им оборудования в исходном количестве и состоянии
        (с учётом нормального естественного износа).
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('3. Арендатор обязуется', array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), array('align' => 'center'));
        $section->addText('3.1.	Вносить платежи в порядке, согласованном сторонами в п. 5. настоящего договора.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('3.2.	Забрать оборудование у Арендодателя в течение 3 рабочих дней с момента поступления денежных средств за аренду первого месяца
        на расчетный счет Арендодателя.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('3.3.	Использовать полученное в аренду оборудование в соответствии с условиями настоящего договора и исключительно по прямому
        назначению оборудования.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('3.4.	Соблюдать надлежащий режим эксплуатации и хранения арендуемого оборудования, в соответствии с технической документацией.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('3.5.	Нести возникающие в связи с эксплуатацией арендованного оборудования расходы, в том числе на оплату и текущего ремонта и
        расходуемых в процессе эксплуатации материалов, поддерживать оборудование в исправном состоянии.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('3.6.	Возместить Арендодателю убытки, причиненные в случае гибели или повреждения арендованного оборудования, за исключением
        случаев, когда Арендатор докажет, что гибель или повреждение оборудования произошли в результате наступления обстоятельств,
        за которые Арендатор не несет ответственность в соответствии с действующим законодательством или условиями  настоящего
        договора аренды.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('3.7.	Исключить доступ к арендуемому оборудованию не компетентных лиц.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('3.8.	Своими силами производить монтаж и демонтаж оборудования (если иное не оформлено дополнительным соглашением).
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('3.9.	Возвратить арендованное оборудование в день истечения проплаченного арендного периода или прекращения действия договора по
        иным основаниям в состоянии, в котором он его получил, с учетом нормального износа или в состоянии, обусловленном
        соглашением сторон настоящего договора аренды.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('3.10.	Не препятствовать Арендодателю при проверке порядка пользования Арендатором арендуемого оборудования в соответствии с
        условиями настоящего Договора.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('3.11.	В случае, если доставка и вывоз оборудования производятся транспортом Арендодателя, то Арендатор должен обеспечить подъезд
        транспорта к объекту.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('4. Порядок передачи и возврата оборудования', array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), array('align' => 'center'));
        $section->addText('4.1.	В случаях, когда недостатки арендованного оборудования были оговорены при заключении договора или были известны Арендатору,
        либо должны были быть выявлены им при осмотре или проверке исправности оборудования при заключении договора или передаче
        его Арендатору в пользование по договору, Арендодатель не отвечает за подобные недостатки.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('4.2.	Порядок Передачи оборудования:
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('4.2.1.	Передача оборудования Арендодателем Арендатору осуществляется представителями сторон по Акту приема-передачи
        оборудования в аренду, подписываемый в месте нахождения оборудования. Датой передачи оборудования является дата
        подписания Акта приема-передачи оборудования в аренду.
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('4.2.2.	Передача оборудования в аренду осуществляется в течение 3 рабочих дней с момента поступления денежных средств за аренду
        первого месяца на расчетный счет Арендодателя.
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('4.3.	Порядок возврата оборудования:
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('4.3.1.	Возврат оборудования Арендатором Арендодателю осуществляется в день окончания оплаченного срока аренды
        представителями сторон по Акту приема-передачи (возврата) оборудования из аренды. Акт приема-передачи (возврата)
        оборудования из аренды подписывается в месте нахождения Арендодателя.
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('4.3.2.	Конкретный день  и время возврата оборудования заранее согласовывается сторонами.
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('5. Порядок расчетов по договору', array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), array('align' => 'center'));
        $section->addText('5.1.	Арендная плата:
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('5.1.1. Стороны настоящего договора установили, что
        в пользование оборудование составляет:
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText("5.1.1.1.	Арендная плата за   $order: $prices	руб. (  $text рублей ), НДС не облагается.
        Подробнее размер арендной платы указан в Акте выполненных услуг. Размер арендной платы является фиксированным и
        пересмотру не подлежит.
        ",  array('name' => 'Times New Roman', 'size' => 12),
            array('align' => 'center', 'indent' => 1.5));
        $section->addText('5.1.2. Оплата платежа за первый арендный период осуществляется Арендатором в течение 3-х рабочих дней с момента выставления
        счета.', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('5.1.3.	Оплата арендной платы в последующие арендные периоды осуществляется Арендатором в соответствии с выставленными
        счетами, но не позднее, чем за 2 дня до наступления нового арендного периода.
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('5.1.4.	В случае, когда Арендатор не может указать точную дату возврата оборудования и последующий арендный период будет
        короче, чем предусмотрено настоящим договором, то за данный арендный период расчет будет производиться за фактическое
        время аренды оборудования по факту возврата оборудования согласно Акту приема-передачи (возврата) оборудования из
        аренды. Счет выставляется Арендодателем в течение 2-х дней с момента приема оборудования по Акту прима-передачи из
        аренды и оплачивается Арендатором в течение 3-х рабочих дней с момента выставления счета.
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('5.1.5.	Арендная плата по данному договору начисляется Арендодателем до тех пор, пока оборудование, переданное Арендатору по
        Акту приема-передачи оборудования в аренду, не будет полностью возвращено Арендодателю по Акту приема  передачи
        оборудования из аренды.
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('5.1.6.	При осуществлении Арендатором платежей стороны исходят из того, что вначале погашается текущая задолженность
        Арендатора по оплате аренды (в случае, если таковая имеется), после полного погашения имеющейся задолженности
        поступающие денежные средства учитываются в качестве оплаты аренды за отчетный месяц.
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('5.2.	Оплата доставки/вывоза оборудования:
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('5.2.1.	Стоимость услуг по доставке на объект оборудования и вывоз с объекта не включена в его арендную стоимость и оплачивается
        отдельно.
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('5.2.2.	При необходимости доставки/вывоза оборудования силами Арендодателя, стоимость доставки будет определяется устными
        договорённостями Сторон.
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('5.2.3.	Оплата за доставку и вывоз оборудования выставляется Арендодателем в счетах (обычно совместно с платой по арендным
        платежам) и оплачивается в течение 3-х дней с момента выставления счета.
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('5.3.	Оплата в случаях гибели или повреждения арендованного оборудования:
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('5.3.1.	Список оборудования, получившего повреждения, и список утраченного оборудования фиксируются в Акте приема-передачи
        (возврата) оборудования из аренды и согласуются обеими сторонами.
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('5.3.2.	Стоимость ремонта поврежденного оборудования определяется в соответствии с Прейскурантом Арендодателя на ремонт
        оборудования, действующим на момент заключения настоящего договора.
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('5.3.3.	Стоимость возмещения в случае гибели оборудования определяется  по соответствующей стоимости оборудования по Акту
        приема-передачи оборудования в аренду.
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('5.3.4.	Оплата за ремонт и утрату оборудования осуществляется в соответствии со счетами, выставленными Арендодателем, и
        оплачивается в течение 3-х дней с момента выставления счета.
        ', array('name' => 'Times New Roman', 'size' => 12), array('align' => 'center'));
        $section->addText('6. Ответственность сторон и форс-мажор', array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), array('align' => 'center'));
        $section->addText('6.1.	За неисполнение или ненадлежащее исполнение обязанностей, предусмотренных настоящим договором, стороны несут
        имущественную ответственность в соответствии с настоящим Договором и действующим законодательством РФ.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('6.2.	В случае нарушения сроков осуществления платежей, установленных в п.5.настоящего Договора, Арендатор выплачивает
        Арендодателю пеню в размере 0,5 процента от суммы просроченной задолженности за каждый день просрочки.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('6.3.	В случае нарушения сроков передачи Арендатору оборудования, Арендодатель выплачивает Арендатору пеню в размере 0,5 процента
        от суммы арендной платы за один месяц, за каждый календарный день просрочки, но не более 5%.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('6.4.	В случае отсутствия арендованного оборудования по адресу, который согласован в данном договоре, Арендодатель изымает
        оборудование у Арендатора, арендная плата не возвращается.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('6.5.	В случае нарушения п.3.2. настоящего Договора, договор считается расторгнутым, а полученная арендная плата остается у
        Арендодателя в счет возмещения неполученной прибыли.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('6.6.	После подписания Акта приема-передачи оборудования в аренду всю ответственность за утерю и повреждения при транспортировке,
        монтаже и использования арендуемого оборудования, несет Арендатор.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('6.7.	Всю ответственность за любые происшествия, связанные с нарушением правил эксплуатации оборудования, а также с несоблюдением
        мер по технике безопасности в период использования оборудования, несет Арендатор.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('6.8.	Сторона, не исполнившая или ненадлежащим образом исполнившая свои обязательства по договору при выполнении его условий,
        несет ответственность, если не докажет, что надлежащее исполнение обязательств оказалось невозможным вследствие непреодолимой
        силы (форс - мажор), т.е. чрезвычайных и непредотвратимых обстоятельств при конкретных условиях конкретного периода времени.
        Сторона, попавшая под влияние форс-мажорных обстоятельств, обязана уведомить об этом другую сторону не позднее одного месяца
        со днянаступления таких обстоятельств.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('7. Порядок разрешения споров', array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), array('align' => 'center'));
        $section->addText('7.1.	Все споры, вытекающие из любых гражданских правоотношений по настоящему договору, в том числе по заключению, расторжению,
        изменению, признанию недействительным, либо выполнения условий настоящего договора разрешаются путем переговоров.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('7.2.	В случае не урегулирования разногласий в процессе переговоров, стороны разрешают все споры в судебном порядке на основании
        законодательства РФ в Арбитражном суде г. Казани, с обязательным соблюдением досудебного (претензионного) порядка разрешения
        споров. Срок ответа на претензию устанавливается 15 календарных дней с момента получения такой претензии от контрагента.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('8. Сроки действия договора, возможность и порядок расторжения договора', array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), array('align' => 'center'));
        $section->addText('8.1.	Договор вступает в силу с момента подписания и действует до полного возврата Оборудования на склад Арендодателя.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('8.2.	Если Арендатор продолжает пользоваться оборудованием после истечения срока настоящего договора при отсутствии возражений
        со стороны Арендодателя, договор считается пролонгированным на тех же условиях на  неопределенный срок.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('8.3.	Настоящий договор может быть досрочно расторгнут по взаимному соглашению сторон, по инициативе любой из сторон при
        условии предупреждения об этом другой стороны за 10 (десять) дней.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('8.4.	Договор может быть расторгнут Арендодателем в одностороннем порядке в случае нарушения Арендатором сроков оплаты. При
        этом все расходы по возможному демонтажу и доставке оборудования на склад Арендодателя ложатся на Арендатора.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('8.5.	В случае досрочного расторжения договора по инициативе Арендатора, Арендодатель вправе требовать уплаты отступного в размере
        арендной платы за один месяц, возмещения убытков, в том числе упущенной выгоды.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('8.6.	Последствия расторжения договора и порядок расчетов определяются Сторонами в подписываемом ими соглашении о расторжении
        договора.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('9. Заключительные положения', array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), array('align' => 'center'));
        $section->addText('9.1.	Стороны допускают обмен экземплярами договора, дополнений и приложений к нему, актами, уведомлениями, претензиями и
        другими документами по электронной почте и/или с помощью мессенджеров Whatsapp и Telegram. Переписка по электронной почте
        и в мессенджерах Whatsapp и Telegram имеет силу простой электронной подписи и равнозначна бумажным документам с личными
        подписями сторон.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('9.2.	Сообщения направляются по следующим адресам электронной почты:
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('а) в адрес Арендодателя: arenda.visoti.kzn@gmail.com
        ', array('name' => 'Times New Roman', 'size' => 12,),array('align' => 'left', 'indent' => 1));
        $section->addText('б) в адрес Арендатора:
        ', array('name' => 'Times New Roman', 'size' => 12,),array('align' => 'left', 'indent' => 1));
        $section->addText('9.3.	Переписка с представителями Арендатора может осуществляться помощью аккаунтов Арендодателя в мессенджерах Whatsapp и
        Telegram, зарегистрированных на следующие номера телефонов:
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('а) +7 986 712-00-59
        ', array('name' => 'Times New Roman', 'size' => 12,),array('align' => 'left', 'indent' => 1));
        $section->addText('б) +7 960 062-55-25
        ', array('name' => 'Times New Roman', 'size' => 12,),array('align' => 'left', 'indent' => 1));
        $section->addText('в) +7 960 040-60-39
        ', array('name' => 'Times New Roman', 'size' => 12,),array('align' => 'left', 'indent' => 1));
        $section->addText('9.4.	Все уведомления и сообщения, отправленные Сторонами друг другу по вышеуказанным адресам накалам связи, признаются
        Сторонами официальной перепиской в рамках Договора. Датой передачи соответствующего сообщения считается день отправления
        сообщения. Ответственность за получение сообщений и уведомлений вышеуказанным способом лежит на получающей  Стороне.
        Сторона, направившая сообщение, не несет ответственности за задержку доставки сообщения, если такая задержка явилась
        результатом неисправности систем связи, действия (бездействия) провайдеров или форс-мажорных обстоятельств.
        ', array('name' => 'Times New Roman', 'size' => 12,));
        $section->addText('10. Юридические адреса и реквизиты сторон', array('name' => 'Times New Roman', 'size' => 12, 'bold' => true), array('align' => 'center'));
        /* $section->addText('Арендодатель: ', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'left'));
        $section->addText('Арендатор: ', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'right')); */
        $table = $section->addTable();
        $table->addRow();
        $table1 = $section->addTable();
        $table1->addRow();
        $table2 = $section->addTable();
        $table2->addRow();
        $table3 = $section->addTable();
        $table3->addRow();
        $table4 = $section->addTable();
        $table4->addRow();
        $table5 = $section->addTable();
        $table5->addRow();
        $table6 = $section->addTable();
        $table6->addRow();
        $table7 = $section->addTable();
        $table7->addRow();
        $table8 = $section->addTable();
        $table8->addRow();
        $table9 = $section->addTable();
        $table9->addRow();
        $table10 = $section->addTable();
        $table10->addRow();
        $table11 = $section->addTable();
        $table11->addRow();
        $table12 = $section->addTable();
        $table12->addRow();
        $table13 = $section->addTable();
        $table13->addRow();
        $table14 = $section->addTable();
        $table14->addRow();
        $table15 = $section->addTable();
        $table15->addRow();
        $table->addCell(4000)->addText('Арендодатель:', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'center'));
        $table->addCell(4000)->addText('Арендатор:', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'right'));
        $table1->addCell(4000)->addText('ИП Зиновьев Михаил Сергеевич', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'left'));
        $table1->addCell(4000)->addText("Юр.адрес: $uraddress", array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'center'));
        $table2->addCell(4000)->addText('ОГРНИП 318169000079419
        ', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'left'));
        $table2->addCell(4000)->addText("Почт.арес: $mailaddress", array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'center'));
        $table3->addCell(4000)->addText('ИНН 166019181137', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'left'));
        $table3->addCell(4000)->addText("Телефон, факс: $phone", array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'center'));
        $table4->addCell(4000)->addText('Адрес 420129, г. Казань, ул. Сабантуй, 35г', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'left'));
        $table4->addCell(4000)->addText("E-mail: $email", array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'center'));
        $table5->addCell(4000)->addText('E-mail: arenda.visoti.kzn@gmail.com', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'left'));
        $table5->addCell(4000)->addText("ОРГН: $orgn", array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'center'));
        $table6->addCell(4000)->addText('Телефон: 8 986 712 00 59', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'left'));
        $table6->addCell(4000)->addText("ИНН: $inn", array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'center'));
        $table7->addCell(4000)->addText('8 960 040 60 39 (менеждер)', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'left'));
        $table7->addCell(4000)->addText("КПП: $kpp", array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'center'));
        $table8->addCell(4000)->addText('Р/счет: 40802810362000024540', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'left'));
        $table8->addCell(4000)->addText("Р/счет: $rs", array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'center'));
        $table9->addCell(4000)->addText('К/счет: 30101810600000000603', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'left'));
        $table9->addCell(4000)->addText("К/счет: $ks", array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'center'));
        $table10->addCell(4000)->addText('Волго-Вятский банк ПАО Сбербанк', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'left'));
        $table10->addCell(4000)->addText("Банк: $bank", array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'center'));
        $table11->addCell(4000)->addText('424000, РТ, г. Казань, ул. Проспект Победы,', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'left'));
        $table11->addCell(4000)->addText("БИК: $bik", array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'center'));
        $table12->addCell(4000)->addText('д. 62/4', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'left'));
        $table13->addCell(4000)->addText('Код БИК 049205603', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'left'));
        $table14->addCell(4000)->addText("_______________________  (Зиновьев М.С.) (м.п)", array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'left'));
        $table14->addCell(4000)->addText('____________________(м.п)', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'center'));
        $table15->addCell(4000)->addText('', array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'center'));
        $table15->addCell(4000)->addText(date("Y-m-d H:i:s", time() + 3 * 3600), array('name' => 'Times New Roman', 'size' => 9, 'bold' => true), array('align' => 'right'));



        // Генерируем имя файла и сохраняем документ
        $filename = ( $title . '.docx');
        $path = storage_path($filename);
        $phpWord->save($path);



        // Возвращаем ответ для скачивания файла и удаляем его

        return response()->download($path, $filename, [
            'Content-Disposition' => "attachment; filename={$filename}",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function show(Word $word)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
    {
        //
    }
}
