@foreach($notis as $noti)
    <div class="table">
        Notificatienummer: {{ $noti->id }}<br>
        Tafel: {{ $noti->table->id }}<br>
        Tijd van notification: {{$noti->time}}<br>
    </div>
@endforeach
