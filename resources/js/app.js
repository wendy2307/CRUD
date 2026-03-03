import './bootstrap';
const style = document.createElement("style");
style.innerHTML = `
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #4e73df, #1cc88a);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        background: white;
        width: 90%;
        max-width: 900px;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        animation: fadeIn 0.5s ease-in-out;
    }

    h1 {
        text-align: center;
        color: #4e73df;
        margin-bottom: 20px;
    }

    .card {
        background: #f8f9fc;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 15px;
        transition: 0.3s;
        border-left: 5px solid #4e73df;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    }

    button {
        background: #4e73df;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    button:hover {
        background: #2e59d9;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
`;
document.head.appendChild(style);


// 📦 Crear estructura principal
const app = document.getElementById("app");

app.innerHTML = `
    <div class="container">
        <h1>📚 Biblioteca</h1>
        <div id="libros"></div>
    </div>
`;

fetch("http://127.0.0.1:8000/api/libros")
    .then(res => res.json())
    .then(data => {
        const contenedor = document.getElementById("libros");

        data.forEach(libro => {
            const card = document.createElement("div");
            card.className = "card";

            card.innerHTML = `
                <h3>${libro.titulo}</h3>
                <p><strong>ISBN:</strong> ${libro.isbn}</p>
                <p><strong>Stock:</strong> ${libro.stock_disponible}</p>
                <button onclick="alert('Libro seleccionado')">
                    Ver Detalles
                </button>
            `;

            contenedor.appendChild(card);
        });
    })
    .catch(error => {
        console.error("Error:", error);
    });
