<!-- resources/views/reviews/reviews-cards.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Reseñas de Libros</h2>
        <a href="{{ route('reviews.create') }}" class="btn btn-success mb-3">Agregar Reseña</a>

        <!-- Tarjetas de reseñas -->
        <div class="row">
            @foreach ($reviews as $review)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $review->user->name }}</h5>
                            <p class="card-text"><strong>Comentario:</strong> {{ $review->comment }}</p>
                            <p class="card-text"><strong>Calificación:</strong> {{ $review->rating }}/5</p>
                            <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
