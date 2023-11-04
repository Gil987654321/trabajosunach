<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // dd('Desde Notificación Controller');

        $notificaciones = auth()->user()->unreadNotifications;

        return view('notificaciones.index', [
            'notificaciones' => $notificaciones
        ]);
    }
}
