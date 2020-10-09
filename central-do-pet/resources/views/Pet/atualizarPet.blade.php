<html>
<head>
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Nav bar -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #E14B56;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(Página atual)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/listar/pets">Adotar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Consultar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listar/funcionarios">Equipe</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ajuda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
      </ul>
    </div>
</nav>
</head>

<body>
  <div class='jumbotron'>

  <h1>Atualizar pet <img src="https://img.icons8.com/ios-glyphs/30/000000/hachiko.png"/></h1>
  <p class="lead">Atualize as informações do pet selecionado</p>
  </div>

<div class='container'>
    @if(trim(Auth::user()->funcao) == trim("Tutor") and trim(Auth::user()->funcao) == trim("Médico Veterinário"))
        <script type="text/javascript">
            window.location = "/paineladm";
        </script>
    @endif
    <form action="/atualizar/pet" method="post" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-group">
            <label for="id">ID do pet:</label>
            <select class="form-control" name="id">
                <option value="{{$pet->id}}">{{$pet->id}}</option>
            </select>
        </div>

      <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" name="nome" value="{{$pet->nome}}"/>
      </div>

      <div class="form-group">
      <label for="sexo">Sexo:</label>
      <select class="form-control" name="sexo">
                <option value="Macho">Macho</option>
                <option value="Femea">Femea</option>
            </select>
      </div>

      <div class="form-group">
      <label for="castrado">Castrado:</label>
      <select class="form-control" name="castrado">
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
            </select>
      </div>

      <div class="form-group">
      <label for="necessidade_especiais">Necessidades Especiais:</label>
      <input type="text" class="form-control" name="necessidades_especiais" value="{{$pet->necessidades_especiais}}"/>
      </div>

      <div class="form-group">
      <label for="data_de_nascimento">Data de nascimento:</label>
      <input type="date" class="form-control" name="data_de_nascimento" value="{{$pet->data_de_nascimento}}"/>
      </div>

      <div class="form-group">
      <label for="dono_id">ID do Dono:</label>
      <input type="text" class="form-control" name="dono_id" value="{{$pet->dono_id}}"/>
      </div>

        <div class="input-group">
            <div class="custom-file">
                <input type="file" name="foto" class="custom-file-input" value="{{$pet->image}}"/>
                <label class="custom-file-label">Escolha uma foto</label>
            </div>
        </div>

        <br>

      <input type="submit" class="btn btn-primary" value="Atualizar" />
    </form>
  </div>
  </body>
</html>
