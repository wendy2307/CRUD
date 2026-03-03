<!DOCTYPE html>
<html>
<head>
    <title>Libros</title>
</head>
<body>

<h1>Lista de Libros</h1>
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<input type="text" id="buscar" placeholder="Buscar libro...">

<div id="lista-libros"></div>

<script>
const lista = document.getElementById('lista-libros');
const input = document.getElementById('buscar');

function cargarLibros(filtro = '') {
    fetch(`/api/libros?titulo=${filtro}`)
    .then(res => res.json())
    .then(data => {
        let html = '';
        data.data.forEach(libro => {
            html += `
                <div>
                    <h3>${libro.titulo}</h3>
                    <p>Stock: ${libro.stock_disponible}</p>
                </div>
            `;
        });
        lista.innerHTML = html;
    });
}

input.addEventListener('keyup', () => {
    cargarLibros(input.value);
});

cargarLibros();
</script>

</body>
</html>