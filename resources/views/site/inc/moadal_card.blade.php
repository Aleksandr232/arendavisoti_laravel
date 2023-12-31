<div id="modal-card">
    <!-- Контент модального окна -->
    <div id="modal_card_content" class="modal_card_content">
      <span class="close">&times;</span>

      <!-- Форма -->
      <form action="{{ route('sendOrder')}}"     method="post" autocomplete="on">
        @csrf
            <fieldset>
                <input class='input-name__field' placeholder="Ваше имя" type="text" name="name" required/>
                <input class='input-name__field' placeholder="Ваш номер" type="tel" name="phone" required />
                <div class="inputs">
                    <input class="input_check" type="checkbox" name="order" value="леса"  >
                    <img style="width: 100px; height:100px" src={{ asset('frontend/img/modal_cart/lesa_botan.webp') }} alt="Image 1">
                <input class="input_check1"  type="checkbox" name="order" value="вышки-туры"  >
                    <img style="width: 100px" src={{ asset('frontend/img/modal_cart/turs.webp') }} alt="закажите вышки-туры">
                <input class="input_check2"   type="checkbox" name="order" value="грузоперевозки"  >
                    <img style="width: 100px" src={{ asset('frontend/img/modal_cart/isuzu.webp') }}  alt="закажите грузоперевозки">
                <input class="input_check3"   type="checkbox" name="order" value="минитрактор"  >
                    <img style="width: 100px" src={{ asset('frontend/img/modal_cart/texnica3.webp') }}  alt="аренда минитрактора">
                </div>
                <div class="checkbox-wrap">
                    <label class="checkbox">
                        {{-- <input type="checkbox" name="checkbox" value="1" checked required>
                        <span class="their-checkbox"></span> --}}
                        {!! HCaptcha::display() !!}
                        {!! HCaptcha::script() !!}
                    </label>
                    {{-- <div class="checkbox-content">
                        <p>Нажимая на кнопку «Оставить заявку», вы даёте согласие на <a href="{{ asset('frontend/doc/privacy.pdf') }}" rel="nofollow" target="_blank" class="modal-doc">обработку своих персональных данных</a></p>
                    </div> --}}
                    <input type="submit" name="submit" value="Оформить" class="modal-btn">
                </div>

            </fieldset>
      </form>
    </div>
  </div>
