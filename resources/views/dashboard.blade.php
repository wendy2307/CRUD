<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Estadísticas</h1>
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<div id="stats"></div>

<script>
fetch('/api/libros')
.then(res => res.json())
.then(data => {
    document.getElementById('stats').innerHTML =
        `<p>Total Libros: ${data.total}</p>`;
});
</script>

</body>
</html>