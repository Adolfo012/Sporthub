<h1>Editar Perfil</h1>

    <form action="{{route('user.update',['user' =>$user,'userID' => auth()->user()->id])}}" method="POST">
        @csrf
        @method('put')
        <h1 class="login-h1"> Registro </h1>
        
        <div class="inputbox">
            <label for=""> Nombre(s) </label>
            <input name="name" type="text" required value="{{old('name',$user->name)}}" autofocus> <br>
            @error('name')  {{-- Checks if there has been an error in the "name" field --}}
            <span>*{{$message}}</span> {{--print a message if there is an error--}}
            <br>
            @enderror
        </div>
        <div class="inputbox">
            <label for=""> Apellido Paterno </label>
            <input name="fsurname" type="text" required value="{{old('fsurname',$user->fsurname)}}"> <br>
            @error('fsurname')  {{-- Checks if there has been an error in the "name" field --}}
            <span>*{{$message}}</span> {{--print a message if there is an error--}}
            <br>
            @enderror
        </div>
        <div class="inputbox">
            <label for=""> Apellido Materno </label>
            <input name="msurname" type="text" required value="{{old('msurname',$user->msurname)}}"> <br>
            @error('msurname')  {{-- Checks if there has been an error in the "name" field --}}
            <span>*{{$message}}</span> {{--print a message if there is an error--}}
            <br>
            @enderror
        </div>
        <div class="inputbox-birthday">
            <label class="birthday">Fecha de Nacimiento</label>
            <input name="birthdate" type="date" required value="{{old('birthdate',$user->birthdate)}}"> <br>
            @error('birthdate')  {{-- Checks if there has been an error in the "name" field --}}
            <span>*{{$message}}</span> {{--print a message if there is an error--}}
            <br>
            @enderror
        </div>
        <div class="inputbox-gender">
            <label class="genero" >Género</label>
            <div class="radio-group">
                <label for="male">Hombre</label>
                <input type="radio" id="male" name="gender" value="male" required value="{{old('gender',$user->gender)}}"> <br>
                <label for="female">Mujer</label>
                <input type="radio" id="female" name="gender" value="female" required value="{{old('gender',$user->gender)}}"> <br>
                <label for="non-binary">Sin mencionar</label>
                <input type="radio" id="non-binary" name="gender" value="non-binary" required value="{{old('gender',$user->gender)}}"> <br>
            </div>
            @error('gender')  {{-- Checks if there has been an error in the "name" field --}}
            <span>*{{$message}}</span> {{--print a message if there is an error--}}
            <br>
            @enderror
        </div>
        <div class="inputbox">
            <label for=""> Apodo </label>
            <input name="nickname"type="text" required value="{{old('nickname',$user->nickname)}}"> <br>
            @error('nickname')  {{-- Checks if there has been an error in the "name" field --}}
            <span>*{{$message}}</span> {{--print a message if there is an error--}}
            <br>
            @enderror
        </div>
        <div class="inputbox">
            <label for=""> Correo </label>
            <input name="email" type="email" required value="{{old('email',$user->email)}}"> <br>
            @error('email')  {{-- Checks if there has been an error in the "name" field --}}
            <span>*{{$message}}</span> {{--print a message if there is an error--}}
            <br>
            @enderror
        </div>
        <!--{{-- <div class="inputbox">
            <label for=""> Contraseña </label>
            <input name="password" type="password" requiredvalue="{{old('password',$user->password)}}">
            @error('password')  
            <span>*{{$message}}</span> 
            <br>
            @enderror
        </div>
        <div class="inputbox">
            <label for=""> Confirmar Contraseña </label>
            <input name="confirmpassword" type="password" required>
            @error('confirmpassword') 
            <span>*{{$message}}</span> 
            <br>
            @enderror
        </div> --}}-->
        <button class="login-button" type="submit"> Editar </button>
        <a class="back-form" href="/dashboard">volver</a>
    </form>

