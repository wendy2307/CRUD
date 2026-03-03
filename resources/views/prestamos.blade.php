<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Préstamo</title>
</head>
<body>

<h1>Crear Préstamo</h1>
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<form id="formPrestamo">
    <input type="number" id="usuario_id" placeholder="ID Usuario" required>
    <input type="number" id="libro_id" placeholder="ID Libro" required>
    <button type="submit">Prestar</button>
</form>

<p id="mensaje"></p>

<script>
document.getElementById('formPrestamo').addEventListener('submit', function(e){
    e.preventDefault();

    fetch('/api/prestamos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            usuario_id: document.getElementById('usuario_id').value,
            libro_id: document.getElementById('libro_id').value
        })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('mensaje').innerText = "Préstamo creado correctamente";
    })
    .catch(() => {
        document.getElementById('mensaje').innerText = "Error al crear préstamo";
    });
});
</script>

</body>
</html>