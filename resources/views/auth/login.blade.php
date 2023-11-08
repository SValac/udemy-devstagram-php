@extends('layouts.app')

@section('titulo')
    Inicia Session en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-6 items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/login.jpg')}}" alt="registro imagen">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{route('login')}}">
                @csrf
                @if (session('mensaje'))
                    <p class="bg-red-500 text-white text-sm text-center rounded-lg my-2 p-2">{{ session('mensaje') }}</p>
                @endif
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
                
                <input 
                    type="submit"
                    value="Iniciar Sesion"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />

            </form>
        </div>
    </div>
@endsection