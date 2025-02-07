<?php
// filepath: /c:/Users/analista.desarrollo/Documents/laravelProjects/testProject/app/Http/Controllers/MessagesController.php
namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
        $message = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3'
        ]);

        Mail::to('omarazuaje2323@hotmail.com')->queue(new MessageReceived($message));

        return 'Mensaje enviado';
    }
}