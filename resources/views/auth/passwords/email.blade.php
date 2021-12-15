@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="col s8">
        <div class="card">
            <div class="card-content">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    {{-- email --}}
                    <div class="input-field col s12">
                        <input type="text" name="email" id="email" value="{{old('email', $user->email ?? '')}}" required />
                        <label for="email">E-mail</label>
                        @error('email')
                            <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                   <br>
                    {{-- Entrar --}}
                    <div class="form-field center">
                        <button type="submit" class="btn waves-effect waves-red" style="width:50%;">Enviar link para redefinir senha</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
