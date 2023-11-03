@extends('site.layouts.main')

@section('title', 'Аренда лесов и вышек-тур')
@section('description', 'строительные леса, вышки-туры, раздвижные лестницы, минитрактор, грузоперевозки, очистка снега с крыш')
@section('keywords', 'грузоперевозки, грузоперевозки казань, грузоперевозки газель, авито грузоперевозки, грузоперевозки +по городу, дешевые грузоперевозки, газель грузоперевозки +по городу, аренда лесов, аренда строительных лесов, аренда строительных лесов цена, аренда лесов казань, строительные леса +в аренду казань, вышка тура аренда, аренда вышки туры +в казани')

@section('header_title')
    <div class="header-content my-container">
        <h1>Аренда строительного оборудования <span>в Казани</span></h1>
        <p>Предлагаем в аренду рамные строительные леса, строительные вышки-туры, раздвижные лестницы. Дополнительно оказываем услуги на минитракторе МКСМ, а также услуги строительного альпинизма по очистке снега с крыш. Осуществляем доставку оборудования нашим автотранспортом по Казани и Республике Татарстан</p>
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
                    <h3>Свяжитесь с нами</h3>
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
                            <h3>Скидки</h3>
                        </div>
                        <p>Программа лояльности<br> для клиентов</p>
                    </div>
                </div>
                <div class="cta-advantage__card advantage-card__two">
                    <div class="advantage-card__insert__square"></div>
                    <div class="cta-advantage__card__content">
                        <div class="advantage-card__content__title">
                            <img src="{{ asset('frontend/img/icons/help.svg') }}" width="40" height="40" alt="иконка хелп аренда высоты">
                            <h3>Помощь</h3>
                        </div>
                        <p>Консультации,<br> поддержка</p>
                    </div>
                </div>
                <div class="cta-advantage__card advantage-card__three">
                    <div class="cta-advantage__card__content">
                        <div class="advantage-card__content__title">
                            <img src="{{ asset('frontend/img/icons/delivery.svg') }}" width="40" height="40" alt="доставка строительных лесов по татарстану">
                            <h3>Доставка</h3>
                        </div>
                        <p>Оперативная доставка<br> 2-12 часов</p>
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
