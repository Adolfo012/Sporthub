            <title>Equipo {{ $equipo->name }}</title>
            <h2>Equipo {{ $equipo->name }}</h2>
            <p>
                El equipo juega: {{ $equipo->tipoJuego }} <br> Representante: {{ $representante->name }}</p>
            <a href="{{ route('dash_home') }}">Volver</a>
            @php
                $miembros = App\Models\MiembroEquipo::all();
            @endphp
            <h2>Miembros del equipo:</h2>
            @foreach ($miembros as $miembro)
                @if ($equipo->id == $miembro->equipo_id)
                    Miembro: {{ $miembro->user_miembro }}<br>
                @endif
            @endforeach
            <form action="{{ route('notification.index', ['id' => $equipo->id]) }}" method="POST">
                @csrf
                <button type="submit">Enviar solicitud de inscripción </button><br>
                @if (isset($mensaje))
                    <b>
                        <p>{{ $mensaje }}</p>
                    </b>
                @endif
            </form>
