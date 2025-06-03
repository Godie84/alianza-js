<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD API Test Interface</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">CRUD API Test Interface</h1>

        <!-- Crear nuevo post -->
        <div class="card mb-4">
            <div class="card-header">Crear Nuevo Post</div>
            <div class="card-body">
                <form id="createForm">
                    <div class="mb-3">
                        <label for="createTitle" class="form-label">Título</label>
                        <input type="text" class="form-control" id="createTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="createBody" class="form-label">Contenido</label>
                        <textarea class="form-control" id="createBody" name="body" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="createUserId" class="form-label">ID de Usuario</label>
                        <input type="number" class="form-control" id="createUserId" name="userId" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

        <!-- Actualizar post -->
        <div class="card mb-4">
            <div class="card-header">Actualizar Post</div>
            <div class="card-body">
                <form id="updateForm">
                    <div class="mb-3">
                        <label for="updateId" class="form-label">ID del Post</label>
                        <input type="number" class="form-control" id="updateId" name="id" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateTitle" class="form-label">Título</label>
                        <input type="text" class="form-control" id="updateTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateBody" class="form-label">Contenido</label>
                        <textarea class="form-control" id="updateBody" name="body" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="updateUserId" class="form-label">ID de Usuario</label>
                        <input type="number" class="form-control" id="updateUserId" name="userId" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Actualizar</button>
                </form>
            </div>
        </div>

        <!-- Eliminar post -->
        <div class="card mb-4">
            <div class="card-header">Eliminar Post</div>
            <div class="card-body">
                <form id="deleteForm">
                    <div class="mb-3">
                        <label for="deleteId" class="form-label">ID del Post</label>
                        <input type="number" class="form-control" id="deleteId" name="id" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>

        <!-- Mostrar posts -->
        <div class="card mb-4">
            <div class="card-header">Ver Todos los Posts</div>
            <div class="card-body">
                <button id="viewPostsBtn" class="btn btn-info mb-3">Ver Posts</button>
                <div id="postsContainer"></div>
            </div>
        </div>
    </div>

    <script>
        const API_BASE = ''; // Puedes usar 'http://localhost/api/' si tu API está en una subcarpeta

        // Crear post
        document.getElementById('createForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            const response = await fetch(API_BASE + 'create.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();
            alert(result.message || result.error);
            this.reset();
        });

        // Actualizar post
        document.getElementById('updateForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            const response = await fetch(API_BASE + 'update.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();
            alert(result.message || result.error);
        });

        // Eliminar post
        document.getElementById('deleteForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            const response = await fetch(API_BASE + 'delete.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();
            alert(result.message || result.error);
        });

        // Ver posts
        document.getElementById('viewPostsBtn').addEventListener('click', async function () {
            const container = document.getElementById('postsContainer');
            container.innerHTML = 'Cargando...';

            const response = await fetch(API_BASE + 'read.php');
            const posts = await response.json();

            if (!Array.isArray(posts)) {
                container.innerHTML = '<p class="text-danger">Error al cargar los posts.</p>';
                return;
            }

            if (posts.length === 0) {
                container.innerHTML = '<p>No hay posts disponibles.</p>';
                return;
            }

            container.innerHTML = posts.map(post => `
                <div class="mb-3 p-3 border rounded">
                    <h5>${post.title}</h5>
                    <p>${post.body.replace(/\n/g, "<br>")}</p>
                    <small><strong>ID:</strong> ${post.id} | <strong>Usuario:</strong> ${post.userId}</small>
                </div>
            `).join('');
        });
    </script>
</body>

</html>
