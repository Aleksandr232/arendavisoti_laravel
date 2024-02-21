<div class="op-main">
    <div class="op-main__card">
        <a href="{{ route('scaffolding') }}">
            <picture>
                @if(isset($scaff))
                    @php
                        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
                        $latestPhoto = null;
                    @endphp

                    @foreach($scaff->reverse() as $post)
                        @php
                            $extension = pathinfo($post->path, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array(strtolower($extension), $allowedExtensions))
                            @if(!$latestPhoto)
                                @php
                                    $latestPhoto = $post->path;
                                @endphp
                            @endif
                        @endif
                    @endforeach

                    @if($latestPhoto)
                        <source type="image/webp" srcset="{{ 'uploads/' . $latestPhoto }}">
                        <img src="{{ 'uploads/' . $latestPhoto }}" width="670" height="450" alt="аренда лесов казань">
                    @endif
                @endif
            </picture>
        </a>
        <a href="{{ route('scaffolding') }}"><h2 class="op-card__title">Рамные строительные леса</h2></a>
        <a href="{{ route('scaffolding') }}" class="op-card__link">Подробнее →</a>
    </div>
    <div class="op-main__card">
        <a href="{{ route('towers_tour') }}">
            <picture>
                @if(isset($tours))
                    @php
                        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
                        $latestPhoto = null;
                    @endphp

                    @foreach($tours->reverse() as $post)
                        @php
                            $extension = pathinfo($post->path, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array(strtolower($extension), $allowedExtensions))
                            @if(!$latestPhoto)
                                @php
                                    $latestPhoto = $post->path;
                                @endphp
                            @endif
                        @endif
                    @endforeach

                    @if($latestPhoto)
                        <source type="image/webp" srcset="{{ 'uploads/' . $latestPhoto }}">
                        <img src="{{ 'uploads/' . $latestPhoto }}" width="670" height="450" alt="аренда лесов казань">
                    @endif
                @endif
            </picture>
        </a>
        <a href="{{ route('towers_tour') }}"><h2 class="op-card__title">Вышки-туры строительные</h2></a>
        <a href="{{ route('towers_tour') }}" class="op-card__link">Подробнее →</a>
    </div>
</div>
