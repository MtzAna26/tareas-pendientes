<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas Pendientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h2 class="text-center mb-4">Lista de Tareas</h2>

    <form action="{{ route('tareas.store') }}" method="POST" class="mb-3">
        @csrf
        <div class="input-group">
            <input type="text" name="title" class="form-control" placeholder="Nueva tarea" required>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </form>

    <ul class="list-group">
        @foreach ($tareas as $tarea)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="{{ $tarea->completed ? 'text-decoration-line-through text-muted' : '' }}">
                    {{ $tarea->title }}
                </span>
                <div>
                    @if (!$tarea->completed)
                        <form action="{{ route('tareas.update', $tarea) }}" method="POST" class="d-inline">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">✔</button>
                        </form>
                    @endif
                    <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">🗑</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

</body>
</html>
