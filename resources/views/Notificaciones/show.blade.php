<h1>Notificaciones</h1>
<h3>¡Hola {{auth()->user()->name}}! Aquí podrás encontrar las notificaciones de tus equipos y torneos que lideres.</h3>
 @foreach ($notifications as $notification)
    <form action="{{ route('notification.send') }}" method="post">
    @csrf
    @php
    $equipo = App\Models\Equipo::find($notification->equipo_id);
    $user = App\Models\User::find($notification->user_id);
    @endphp
    De: {{$user->name}} desea ser miembro del equipo "{{$equipo->name}}."
    <input type="hidden" name="user_id" value="{{$notification->user_id}}" />
    <input type="hidden" name="equipo_id" value="{{$notification->equipo_id}}" />
    <button type="submit" name="action" value="aceptada">Aceptar</button>
    <button type="submit" name="action" value="rechazada">Rechazar</button>
</form>
@endforeach
<a href="\dashboard">Volver</a>