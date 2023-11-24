<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\MiembroEquipo;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index($id){
        $notification = new Notification();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        $existingNotification = Notification::where('user_id', $user_id)->where('equipo_id', $id)->first();
        $existingMember = MiembroEquipo::where('user_miembro', $user->name)->where('equipo_id', $id)->first();
       
        if($existingNotification || $existingMember){ //validates that the notification has already been sent
            return '¡Algo salió mal! Has intentado envíar más de una solicitud o ya te encuentras registrado en el equipo.';
        }else{ //If it has not been sent, send it
            
            $notification->user_id = auth()->user()->id;
            $notification->equipo_id = $id;
            $notification->status = 'pending';
            $notification->save();
            return 'Se envió la notificacion al representante.';
        }
        
    }
    public function send(Request $request,MiembroEquipo $miembro){
        if($request->action == 'aceptada'){
            //When the notification is accepted, the participant is saved as a member
            $miembro = new MiembroEquipo();
            $user = User::find($request->user_id);
            $miembro->user_miembro = $user->name;
            $miembro->equipo_id = $request->equipo_id;
            $miembro->save();     
            //Ppdates current notifications
            Notification::where('user_id', $request->user_id)->where('equipo_id', $request->equipo_id)->delete();
            $user = auth()->user();
            $notifications = $user->notifications;
            return view('Notificaciones.show',compact('notifications'));
          
        }
        else{
            //When the notification was rejected it is deleted 
            Notification::where('user_id', $request->user_id)->where('equipo_id', $request->equipo_id)->delete();
            $user = auth()->user();
            $notifications = $user->notifications;
            return view('Notificaciones.show',compact('notifications'));
        }
       
    }
    public function show(){
        $user = auth()->user();
        $notifications = $user->notifications;
        return view('Notificaciones.show',compact('notifications'));
    }
}
