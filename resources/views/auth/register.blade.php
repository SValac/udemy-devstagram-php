@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-6 items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/registrar.jpg')}}" alt="registro imagen">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-extrabold" id="name" for="name">Nombre</label>
                    <input 
                        id="name"
                        type="text"
                        name="name"
                        placeholder="Tu nombre"
                        class="border p-3 w-full rounded-lg 
                        @error('name')
                            border-red-500
                        @enderror"   
                        value="{{old('name')}}" 
                    />
                    @error('name')
                        <p class="bg-red-500 text-white text-sm text-center rounded-lg my-2 p-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-extrabold" id="username" for="username">User Name</label>
                    <input 
                        id="username"
                        type="text"
                        name="username"
                        placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg 
                        @error('username')
                            border-red-500
                        @enderror"  
                        value="{{old('username')}}" 
                    />
                    @error('username')
                        <p class="bg-red-500 text-white text-sm text-center rounded-lg my-2 p-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-extrabold" id="email" for="email">Email</label>
                    <input 
                        id="email"
                        type="text"
                        name="email"
                        placeholder="Tu Email"
                        class="border p-3 w-full rounded-lg
                        @error('email')
                            border-red-500
                        @enderror"   
                        value="{{old('email')}}" 
                    />
                    @error('email')
                        <p class="bg-red-500 text-white text-sm text-center rounded-lg my-2 p-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-extrabold" id="password" for="">Password</label>
                    <input 
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Tu password"
                        class="border p-3 w-full rounded-lg
                        @error('password')
                            border-red-500
                        @enderror"    
                    />
                    @error('password')
                        <p class="bg-red-500 text-white text-sm text-center rounded-lg my-2 p-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-extrabold" id="password_confirmation" for="password_confirmation">Confirmar Password</label>
                    <input 
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        placeholder="Confirma tu Password"
                        class="border p-3 w-full rounded-lg"    
                    />
                </div>
                
                <input 
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />

            </form>
        </div>
    </div>
@endsection