@extends('site.layouts.main')

@section('title', 'Аренда лесов и вышек-тур')
@section('description', 'Откройте для себя преимущества эффективной аренды оборудования. Как оптимизировать расходы, используя современные технологии и инструменты. Рассмотрим, как аренда строительного оборудования в Казани и Татарстане может стать ключевым фактором для вашего строительного успеха')
@section('keywords', 'аренда оборудования, аренда строительного оборудования, прокат оборудования, аренда строительного оборудования в казани, прокат строительного оборудования в татарстане, аренда лестницы, аренда лестницы 5 метров, лестница раздвижная в аренду, выдвижная лестница в аренду')

@section('header_title')
    <div class="header-content-home my-container">
            <br/>
        <h1>Аренда строительного оборудования в Казани со скидкой до <span>40%</span></h1>
        <p>С минимальным или нулевым залогом. Доставка от 2х часов<br/>
        ☑️ Работаем с физ. и юр. лицами в т.ч. с НДС<br/>
        ☑️ Аренда выгоднее покупки до 15 раз<br/>
        ☑️ Минимальный заказ всего 5000 руб<br/>
        ☑️ Доставка по РТ от 2х часов<br/>
        <br/>
        <br/><br/>
        </p>
        <div class="modal_home">
            <form action="{{ route('send')}}" method="post" autocomplete="on">
                @csrf
                <h4 class="modal-title">Введите ваш номер, и мы перезвоним вам в течение 10 минут в рабочее время</h4>
                <label>
                    <input type="hidden" name="hidden" value="Заявка на услуги с главной страницы">
                </label>
                <label>
                    <input type="hidden" name="telegram" value="Заявка на обратный звонок">
                </label>
                <label>
                    <input type="hidden" name="email" value="Заявка на обратный звонок">
                </label>
                <label>
                    <input type="hidden" name="company" value="Заявка на обратный звонок">
                </label>
                <label>
                    <input type="hidden" name="address" value="Заявка на обратный звонок">
                </label>
                <label>
                    <input type="tel" name="phone" class="input-name__phone mask-phone" placeholder="Введите номер телефона" required>
                </label>
                @php
                    use App\Models\RunStr;
                    $active = RunStr::all()->first();
                @endphp
                @if($active->is_hcaptcha == 1)
                    <div class="checkbox-wrap">
                        <label class="checkbox">
                            @include('site.layouts.hcaptcha')
                        </label>
                    </div>
                @else
                    <div class="checkbox-wrap">
                        <label class="checkbox">
                            <input type="checkbox" name="checkbox" value="1" checked required>
                            <span class="their-checkbox"></span>
                        </label>
                        <div class="checkbox-content">
                            <p>Нажимая на кнопку «Оставить заявку», вы даёте согласие на <a href="{{ asset('frontend/doc/privacy.pdf') }}" rel="nofollow" target="_blank" class="modal-doc">обработку своих персональных данных</a></p>
                        </div>
                    </div>
                @endif
                <input type="submit" name="submit" value="Перезвоните мне" class="modal-btn">
            </form>
        </div>
    </div>
@endsection

@section('content')
    <section id="our-products">
        <div class="our-products my-container">
            @include('site.inc.main_products')
            @include('site.inc.products_additional')
        </div>
    </section>
    <section class="alert_news">
        <div id="alert-box">
            <div class="alert-message">
              <span class="close-btn" onclick="closeAlert(); openAlert()">&times;</span>
              <p>Арендуйте у нас строительное оборудование</p>
            </div>
          </div>
    </section>
    <section id="call-to__action">
        <div class="call-to__action my-container">
            <div class="cta-form">
                <div class="cta-form__content">
                    <h3>Оставьте заявку в форме ниже и получите персональную скидку до 40%</h3>
                    <p>Мы предложим самые выгодные цены на сегодняшний день</p>
                    <div class="cta-form__phone">
                        <a href="tel:+79867120059">8 986 712-00-59</a>
                        <a href="https://wa.me/+79867120059" title="Напишите нам в Whatsapp" target="_blank">
                            <img src="{{ asset('frontend/img/icons/whatsapp.svg') }}" width="20" height="20" alt="леса в аренду">
                        </a>
                    </div>
                    <button  class="cta-form__btn btn" data-btn="Заявка на обратный звонок"><div class="theme_white">Заказать звонок</div></button>
                </div>
            </div>
            <div class="cta-advantage">
                <div class="advantage-insert__rectangle"></div>
                <div class="cta-advantage__card advantage-card__one">
                    <div class="advantage-card__insert__square"></div>
                    <div class="cta-advantage__card__content">
                        <div class="advantage-card__content__title">
                            <img src="{{ asset('frontend/img/icons/percent.svg') }}" width="40" height="40" alt="аренда лесов со скидкой ">
                            <h3>Сезонные скидки</h3>
                        </div>
                        <p>Программа лояльности для клиентов<br></p>
                        <br/>
                        <button onclick="openModalDiscounts()" class="cta-form__btn">Получить скидку</button>
                    </div>
                </div>
                <div class="cta-advantage__card advantage-card__two">
                    <div class="advantage-card__insert__square"></div>
                    <div class="cta-advantage__card__content">
                        <div class="advantage-card__content__title">
                            <img src="{{ asset('frontend/img/icons/help.svg') }}" width="40" height="40" alt="иконка хелп аренда высоты">
                            <h3>Персональный менеджер</h3>
                        </div>
                        <p>На связи с вами по любому вопросу </p>
                    </div>
                </div>
                <div class="cta-advantage__card advantage-card__three">
                    <div class="cta-advantage__card__content">
                        <div class="advantage-card__content__title">
                            <img src="{{ asset('frontend/img/icons/delivery.svg') }}" width="40" height="40" alt="доставка строительных лесов по татарстану">
                            <h3>Доставка от 2х часов</h3>
                        </div>
                        <p>Собственным автотранспортом</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about-us">
        <div class="about-us my-container">
            <div class="au-photo">
                <picture>
                    <source type="image/webp" srcset="{{ asset('frontend/img/about-us.webp') }}">
                    <img src="{{ asset('frontend/img/about-us.webp') }}" width="644" height="300" alt="леса в аренду">
                </picture>
            </div>
            <div class="au-content">
                <h3>О нас</h3>
                <p>Аренда высоты - компания с 5-летней историей непрерывного развития, от небольшого гаража до склада в 300 кв. м. с собственным автопарком. Мы продолжаем совершенствоваться, чтобы вы смогли снизить свои затраты и получить ощутимые преимущества от сотрудничества с нами. Мы предоставляем оборудование не только для нужд малоэтажного строительства, но с нами также строят крупные объекты, где объемы строительных лесов доходят до тысячи кв. м. Арендовать оборудование быстро и недорого возможно, благодаря нашей стратегии, профессиональной команде сотрудников и многолетнему опыту работы</p>
            </div>
        </div>
    </section>
    <section id="about-comments">
        <h3>Отзывы</h3>
         <div class="sw-app" data-app="e8ee69fc9d01afdf2b2b298d9fafd3d1"></div>

    </section>
@endsection
