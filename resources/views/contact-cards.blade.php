<!-- resources/views/contact/contact-cards.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Contactos</h2>
        <a href="{{ route('contact.create') }}" class="btn btn-success mb-3">Agregar Contacto</a>

        <!-- Tarjetas de contactos -->
        <div class="row">
            @foreach ($contacts as $contact)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $contact->name }}</h5>
                            <p class="card-text"><strong>Correo Electrónico:</strong> {{ $contact->email }}</p>
                            <p class="card-text"><strong>Mensaje:</strong> {{ $contact->message }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
