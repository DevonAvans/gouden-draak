<div class="container">
    <div class="menulist">
        @foreach ($categories as $cat)
            <div class="griditem">
                {{$cat->name}}<br>
                @foreach ($dishes as $dish)
                    @if ($dish->category->id == $cat->id)
                        {{ $dish->menu_text }}. {{ $dish->name }} ฿ {{$dish->price}}<br>
                        @if (isset($dish->spiciness_id))
                        {{ $dish->spiciness->description }},
                        @else
                        Niet gekruid,
                        @endif
                        @foreach ($dish->allergens as $allergen)
                            {{$allergen->description}},
                        @endforeach
                        <br>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</div>

<style>
.container{
    background-color:#fff4ba;
}

.menulist{
    column-count: 1;
    column-gap: 1em;
    margin: 1em;
}

.griditem{
    display: inline-block;
    margin: 0 0 1em;
    width: 100%;
}
</style>
