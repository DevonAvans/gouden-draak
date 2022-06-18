<table class="table table-bordered data-table">
    <thead>
        <tr>
            <th>Nummer</th>
            <th>Naam</th>
            <th>Categorie</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dishes as $dish)
        <tr>
            <td>{{ $dish->menu_text }}</td>
            <td>{{ $dish->name }}</td>
            <td>{{ $dish->category->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
