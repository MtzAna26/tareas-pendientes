<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas Pendientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .completed {
            text-decoration: line-through;
            color:rgb(71, 70, 70);
        }
        .btn-custom {
            background-color: #00FF00;
            border-color: #00FF00; 
            --bs-btn-hover-bg: #32CD32;
            color: white;
            }
        .btn-custom-danger{
            background-color:rgb(255, 17, 0);
            border-color: rgb(255, 17, 0); 
            --bs-btn-hover-bg:rgb(232, 69, 69);
            color: white; 
        }
        .task-card {
            margin-bottom: 15px;
        }
        .task-list {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body class="container mt-5">

    <h2 class="text-center mb-4">Lista de Tareas Pendientes</h2>

    <div class="task-list">
        <!-- Formulario para agregar tarea -->
        <form action="{{ route('tareas.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="input-group">
                <input type="text" name="title" class="form-control" placeholder="Nueva tarea" required>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>

        <!-- Tareas -->
        <ul class="list-group">
            @foreach ($tareas as $tarea)
                <li class="list-group-item d-flex justify-content-between align-items-center task-card">
                    <span class="{{ $tarea->completed ? 'completed' : '' }}">
                        {{ $tarea->title }}
                    </span>
                    <div>
                        @if (!$tarea->completed)
                            <form action="{{ route('tareas.update', $tarea) }}" method="POST" class="d-inline">
                                @csrf @method('PATCH')
                                <button type="submit" class="btn btn-success btn-custom">✔</button>
                            </form>
                        @endif
                        <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-custom-danger">🗑</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <!-- Botón de logout -->
        <form action="{{ route('logout') }}" method="POST" class="d-inline mt-4">
            @csrf
            <button type="submit" class="btn btn-danger btn-custom-danger">Cerrar sesión</button>
        </form>
    </div>

    <!-- Bootstrap JS (opcional, pero recomendado para interactividad) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
