@extends('layouts.main')

@section('content')
<h2>Maak een nieuw gerecht</h2>
    <form method="POST" action="{{ route('menu.store') }}">
        @csrf
        Menu nummer:<input name="menu_text" type="text" placeholder="1A"><br>
        Naam:<input name="name" type="text" placeholder="Kipje Sate"><br>
        Beschrijving:<textarea name="description" placeholder="Kipje met satesaus, lekker!"></textarea><br>
        Prijs:<input name="price" type="number" placeholder="3.10" step=".01" min="0"><br>
        Category:<select name="category_id">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name}}</option>
            @endforeach
        </select><br>
        Allergenen:<select class="row selectpicker" multiple data-live-search="true"  multiple ="multiple" name="allergens[]" id="allergens">
            @foreach($allergens as $allergen)
                <option value="{{$allergen->id}}">{{$allergen->name}}</option>
            @endforeach
        </select><br>
        Kruiden niveau:<select name="spiciness_id">
            <option value="0">Niet gekruid</option>
            @foreach ($spiciness as $spice)
            <option value="{{ $spice->id }}">{{ $spice->description }}</option>
            @endforeach
        </select><br>
        <button type="submit" class="btn btn-primary">Gerecht toevoegen</button>
    </form>
@endsection
