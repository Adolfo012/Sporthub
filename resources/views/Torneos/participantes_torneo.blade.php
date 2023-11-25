<form action="{{route('participantes.store',$torneo)}}" method="POST">
    @csrf
    @php
    $users = App\Models\User::all();
    @endphp
    <label for="participante_inscrito">Selecciona un participante disponible a inscribir: </label>
    <select id="participante_inscrito" name="participante_inscrito">
        @foreach($users as $user)
        @php
        $participante = App\Models\ParticipanteTorneo::where('user_id', $user->id)->first();
        @endphp
            @if (!$participante) {{--Valida que la cantidad de participantes, sea menor que la que se indicó en el torneo--}}
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endif
        @endforeach
    </select>
    <button type="submit">Añadir participante</button>
    @if(isset($mensaje))
    <p>{{ $mensaje }}</p>
    @endif
    <a href="{{route('torneos.edit',$torneo)}}">Volver</a>
    </form>