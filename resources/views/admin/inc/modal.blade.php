<div id="modal-windows">
    <div class="modals">
        <form action="{{ route('checkDiscountCode')}}"  method="post" autocomplete="on">
            @csrf
            <h4 class="modal-title">Проверить код</h4>
            <label>
                <input type="text" name="code" class="input-name__field" placeholder="Введите код клиента" required>
            </label>
            <input type="submit" name="submit" value="Проверить код клиента" class="modal-btn">
            <!-- cross close modal window start -->
            <svg onclick="closesModalDiscounts()" class="close-modal" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
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
    {{-- <div class="modal-bg"></div> --}}
</div>
