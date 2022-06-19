@extends('layouts.main')

@section('content')
<h1>Edit menu</h1>
<form class="user-container" method="POST" action="">
  @csrf
  @method('PUT')
  <section>
    <label for="spiciness">Spiciness</label>
    <select id="spiciness_id" name="spiciness_id" required>
    <option value="0">Niet gekruid</option>
      @foreach($spiciness as $spice)
        @if ($dish->spiciness_id == $spice->id)
            <option value="{{$spice->id}}" selected>{{$spice->description}}</option>\
        @else
            <option value="{{$spice->id}}">{{$spice->description}}</option>
        @endif
      @endforeach
    </select>
  </section>
  <section>
    <label for="allergens">Bevat</label>
    <select class="row selectpicker" multiple data-live-search="true"  multiple ="multiple" name="allergens[]" id="allergens">
        @foreach($allergens as $allergen)
            @if(old('allergens') && in_array($allergen->id,old('allergens')))
                <option value="{{$allergen->id}}" selected>{{$allergen->name}}</option>
            @elseif($dish->allergens()->get()->contains($allergen))
                <option value="{{$allergen->id}}" selected>{{$allergen->name}}</option>
            @else
                <option value="{{$allergen->id}}">{{$allergen->name}}</option>
            @endif
        @endforeach
    </select>
  </section>

  <section>
    <button type="submit">
      Update
    </button>
  </section>
</form>
@endsection

<script type="text/javascript">
    $(document).ready(function() {
        $('allergens').selectpicker();
    });
</script>
