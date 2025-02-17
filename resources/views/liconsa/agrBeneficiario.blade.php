<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LICONSA</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        .header {
            background-image: url('{{asset('/img/FondoV1.png')}}');
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 80px;
            padding: 40px;
        }

        .footer {
            background-image: url('{{asset('/img/FondoR1.png')}}');
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80px;
            padding: 20px;
        }

        .content {
            background-color: #D4C19C;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            width: 100%; /* Ajuste del ancho del formulario */
            max-width: 800px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-container {
            display: block;
            justify-content: center;
            margin-top: 20px;
        }

        .btn1 {
            margin: 0 10px;
            padding: 15px 30px;
            border-radius: 5px;
            background-color: #621132;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn1:hover {
            background-color: #4a0e27;
        }

        .mynav {
            background-color: #285C4D;
            color: white;
            display: flex;
            align-items: center;
            justify-content: right;
            height: 40px;
        }

        .navbar {
            background-color: #285C4D;
            height: 40px;
        }

        .navbar a {
            color: white;
            background-color: #285C4D;
        }

        .navbar a:hover {
            color: #621132;
            background-color: #285C4D;
        }

        .navbar-toggler {
            background-color: #285C4D;
            color: white;
            border: none;
        }

        .navbar-toggler:hover {
            background-color: #285C4D;
            color: #621132;
        }

        .asd {
            background-color: #285C4D;
        }

        .alerta2 {
            --bs-alert-bg: transparent;
            --bs-alert-padding-x: 1rem;
            --bs-alert-padding-y: 1rem;
            --bs-alert-margin-bottom: 0;
            --bs-alert-color: inherit;
            --bs-alert-border-color: transparent;
            --bs-alert-border: var(--bs-border-width) solid var(--bs-alert-border-color);
            --bs-alert-border-radius: var(--bs-border-radius);
            --bs-alert-link-color: inherit;
            position: relative;
            padding: var(--bs-alert-padding-y) var(--bs-alert-padding-x);
            margin-bottom: var(--bs-alert-margin-bottom);
            color: var(--bs-alert-color);
            background-color: var(--bs-alert-bg);
            border: var(--bs-alert-border);
            border-radius: var(--bs-alert-border-radius);
        }

        .obligatorio {
            color: red;
        }
    </style>
    @vite(['resources/js/app.js'])

</head>
<body class="font-sans  antialiased">
<header class="header">
    <h1>Liconsa</h1>
    <h2>Gobierno de México</h2>
</header>
<div class="mynav">

    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid asd">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse asd" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('index')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('beneficiarios.list')}}">Lista de Beneficiarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('beneficiarios.nuevo')}}">Registrar Beneficiario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('add.sell')}}">Registrar Nueva Venta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.nuevo')}}"> Registrar Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('trabajadores.list')}}">Lista De Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('ventas.list')}}">Lista De Ventas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</div>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
@endif
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </ul>
    </div>
@endif


<div class="content">
    <div class="form-container">
        <div class="card-header text-center"><h2>Agregar beneficiario</h2></div>
        <form action="../beneficiarios/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <b>Nombre del interesado:</b><label for="nombre" class="form-label obligatorio">*</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Gerardo"
                       value="{{isset($beneficiario->nombre)?$beneficiario->nombre:old('nombre')}}">
            </div>
            <div class="form-group">
                <b>Apellido paterno:</b><label for="apellido_p" class="form-label obligatorio">*</label>
                <input type="text" class="form-control" id="apellido_p" name="apellido_p" placeholder="Ej. Gutiérrez"
                       value="{{isset($beneficiario->apellido_p)?$beneficiario->apellido_p:old('apellido_p')}}">
            </div>
            <div class="form-group">
                <b>Apellido materno:</b><label for="apellido_m" class="form-label obligatorio">*</label>
                <input type="text" class="form-control" id="apellido_m" name="apellido_m" placeholder="Ej. Ramírez"
                       value="{{isset($beneficiario->apellido_m)?$beneficiario->apellido_m:old('apellido_m')}}">
            </div>
            <div class="form-group">
                <b>CURP del interesado:</b><label for="curp" class="form-label obligatorio">*</label>
                <input type="text" class="form-control" id="curp" name="curp" placeholder="Ej. GURG080412HDFDRRA3"
                       value="{{isset($beneficiario->curp)?$beneficiario->curp:old('curp')}}">
            </div>
            <div class="form-group">
                <b>Dirección:</b><label for="direccion" class="form-label obligatorio">*</label>
                <input type="text" class="form-control" id="direccion" name="direccion"
                       placeholder="Ej. Villa del Real, Canes 35, Tecámac Edo.Mex."
                       value="{{isset($beneficiario->direccion)?$beneficiario->direccion:old('direccion')}}">
            </div>
            <div class="form-group">
                <b>Fecha de nacimiento:</b><label for="fecha_nac" class="form-label obligatorio">*</label>
                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" placeholder="Ej. 12/08/2004"
                       value="{{isset($beneficiario->fecha_nac)?$beneficiario->fecha_nac:old('fecha_nac')}}">
            </div>
            <div class="form-group">
                <b>Número de dependientes:</b><label for="n_dependientes" class="form-label obligatorio">*</label>
                <input type="number" class="form-control" id="n_dependientes" name="n_dependientes" placeholder="Ej. 3"
                       onchange="showCurpsInputs(this.value)">
            </div>
            <div class="form-group">
                <b>CURP de los dependientes:</b><label for="curp_beneficiarios" class="form-label obligatorio">*</label>
                <div id="curpsInputsContainer">
                    <input class="form-control" id="curp_beneficiarios" name="curp_beneficiarios"
                           placeholder="Ej. GURG080412HDFDRRA3">
                </div>
            </div>

            <div class="form-group">
                <b>Dias de asistencia</b><label for="d_asis" class="form-label obligatorio">*</label>
                <input type="text" class="form-control" id="d_asist1" name="d_asist1"
                       placeholder="Ej. Lunes"
                       value="{{isset($beneficiario->d_asist1)?$beneficiario->d_asist1:old('d_asist1')}}">
                <input type="text" class="form-control" id="d_asist2" name="d_asist2"
                       placeholder="Ej. Miercoles"
                       value="{{isset($beneficiario->d_asist2)?$beneficiario->d_asist2:old('d_asist2')}}">
                <input type="text" class="form-control" id="d_asist3" name="d_asist3"
                       placeholder="Ej. Viernes"
                       value="{{isset($beneficiario->d_asist3)?$beneficiario->d_asist3:old('d_asist3')}}">
            </div>

            <div class="form-group">
                <b>N° Lecheria:</b><label for="num_lecheria" class="form-label obligatorio">*</label>
                <input type="number" class="form-control" id="num_lecheria" name="num_lecheria"
                       placeholder="Ej. 65469158647"
                       value="{{isset($beneficiario->num_lecheria)?$beneficiario->num_lecheria:old('num_lecheria')}}">
            </div>

            <div class="btn-container text-center">
                <button type="submit" class="btn1"><i class="fas fa-save"></i>Guardar</button>
                <button type="reset" onclick="index()" class="btn1"><i class="fas fa-times"></i>Cancelar</button>
            </div>


        </form>

    </div>
</div>
<footer class="footer">
    <p>LICONSA © 2024</p>
</footer>

<!-- Bootstrap JS (optional) -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Función para mostrar u ocultar los inputs de CURP de dependientes
    function showCurpsInputs(numDependientes) {
        // Obtener el contenedor de los inputs de CURP
        const curpsContainer = document.getElementById('curpsInputsContainer');
        // Crear y mostrar los inputs según el número de dependientes
        curpsContainer.innerHTML = '';
        if (numDependientes <= 0) {
            const inputCurp = document.createElement('input');
            inputCurp.type = 'text';
            inputCurp.className = 'form-control';
            inputCurp.name = 'curp_beneficiarios[]'; // Usar corchetes para recibir varios valores en PHP
            inputCurp.placeholder = 'Ej. GURG080412HDFDRRA3';

            // Agregar input al contenedor
            curpsContainer.appendChild(inputCurp);
        } else {
            for (let i = 0; i < numDependientes; i++) {
                // Crear input de CURP
                const inputCurp = document.createElement('input');
                inputCurp.type = 'text';
                inputCurp.className = 'form-control';
                inputCurp.name = 'curp_beneficiarios[]'; // Usar corchetes para recibir varios valores en PHP
                inputCurp.placeholder = 'Ej. GURG080412HDFDRRA3';

                // Agregar input al contenedor
                curpsContainer.appendChild(inputCurp);
            }
        }
    }

    function index() {
        window.location.href = "{{ route('index') }}"; // Reemplaza 'route('index')' con la ruta adecuada en tu aplicación
    }
</script>
</body>
</html>
