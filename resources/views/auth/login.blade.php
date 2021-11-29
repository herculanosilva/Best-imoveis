
@extends('auth.layout.principal')

@section('conteudo-principal')


<section class="section">
    <form action="" method="get">
        <div class="row valign-wrapper">
            <div class="row">
                <form action="{{ 'LoginController.authenticate' }}" class="col s12">
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="name" type="text">
                      <label for="name">Nome</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <input id="email" type="email">
                      <label for="email">Email</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <input id="password" type="password">
                      <label for="password">Senha</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <input id="password" type="password">
                      <label for="password">Confirmar Senha</label>
                    </div>
                  </div>

                  <div class="row">
                        <div class="row right-align">
                            <a href="" class="btn-flat waves-effect">Não tem conta? registra-se</a>
                            <button type="submit" class="btn waves-effect waves-alight">ENTRAR</button>
                        </div>
                  </div>
                </form>
              </div>
        </div>
    </form>
</section>



@endsection


{{-- <span class="helper-text" data-error="wrong" data-success="right">Helper text</span> --}}

