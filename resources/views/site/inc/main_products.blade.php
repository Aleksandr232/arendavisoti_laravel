<div class="op-main">
    <div class="op-main__card">
        <a href="{{ route('scaffolding') }}">
            <picture>
                @if(isset($scaff))
                    @foreach($scaff->reverse() as $post)
                        @if($loop->first)
                            <source type="image/webp" srcset="{{ 'uploads/' . $post->path }}">
                            <img src="{{ 'uploads/' . $post->path }}" width="670" height="450" alt="аренда лесов казань">
                        @endif
                    @endforeach
                @endif
            </picture>
        </a>
        <h2 class="op-card__title">Рамные строительные леса</h2>
        <a href="{{ route('scaffolding') }}" class="op-card__link">Подробнее →</a>
    </div>
    <div class="op-main__card">
        <a href="{{ route('towers_tour') }}">
            <picture>
                @if(isset($tours))
                    @foreach($tours->reverse() as $post)
                        @if($loop->first)
                            <source type="image/webp" srcset="{{ 'uploads/' . $post->img }}">
                            <img src="{{ 'uploads/' . $post->img }}" width="670" height="450" alt="аренда вышек-тур казань">
                        @endif
                    @endforeach
                @endif
            </picture>
        </a>
        <h2 class="op-card__title">Вышки-туры строительные</h2>
        <a href="{{ route('towers_tour') }}" class="op-card__link">Подробнее →</a>
    </div>
</div>
