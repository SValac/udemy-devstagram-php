<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index () {
        return view('auth.register');
    }

    public function store( Request $request ) {
        //dd('Post...');
        //dd($request->get('email'));

        /* 
            aqui lo que hacemos es tranasformar a el username
            a url( con slug ) antes de la validacion
            porque en caso contrario cuando aun no esta transformado, pasa la validacion y entra al create
        */
        $request -> request->add(['username' => Str::slug($request -> username)]);

        $this->validate($request, [
            'name' => ['required', 'min:5'],
            'username' => ['required', 'unique:users', 'min:3', 'max:20'],
            'email' => ['required', 'unique:users','email','max:60'],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        User::create([
            'name' => $request -> name,
            'username' => $request -> username,
            'email' => $request -> email,
            'password' => $request -> password,
            /* 
                Laravel 9 ya Hasea el password por default
                en caso de que no lo haga se puede usar
                Hash::make para hasearlo

                'password' => Hash::make( $request -> password )
            */
        ]);

        /* 
            usamos un helper de laravel para autenticar el usuario
          
            auth() -> attempt([
                'email' => $request -> email,
                'password' => $request -> password
            ]);
         */

        // otra forma de authenticar usuario
        auth() -> attempt($request->only('email', 'password'));


        // redireccionar al usuario 
        return redirect() -> route('post.index');
    }
}
