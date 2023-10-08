<div class="modal-window">
    <div class="modal">
        <form action="{{ route('send') }}" method="post" autocomplete="on">
            @csrf
            <h4 class="modal-title">Оставьте заявку, и мы свяжемся с вами в ближайшее время</h4>
            <label>
                <input type="hidden" name="hidden">
            </label>
            <label>
                <input type="text" name="name" class="input-name__field" placeholder="Введите свое имя" required>
            </label>
            <label>
                <input type="tel" name="phone" class="input-name__phone mask-phone" placeholder="Введите номер телефона" required>
            </label>
            <div class="checkbox-wrap">
                <label class="checkbox">
                    <input type="checkbox" name="checkbox" value="1" checked required>
                    <span class="their-checkbox"></span>
                </label>
                <div class="checkbox-content">
                    <p>Нажимая на кнопку «Оставить заявку», вы даёте согласие на <a href="{{ asset('frontend/doc/privacy.pdf') }}" rel="nofollow" target="_blank" class="modal-doc">обработку своих персональных данных</a></p>
                </div>
            </div>
            <input type="submit" name="submit" value="Оставить заявку" class="modal-btn">
            <!-- cross close modal window start -->
            <svg class="close-modal" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 47.971 47.971" style="enable-background:new 0 0 47.971 47.971;" xml:space="preserve">
                <g>
                    <path d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88
                        c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242
                        C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879
                        s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z"/>
                </g>
            </svg>
            <!-- cross close modal window end -->
        </form>
    </div>
    <div class="modal-bg"></div>
</div>

