<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD API Test Interface</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    <div class="container mt-5">
        <h1 class="text-center mb-4">CRUD API Test Interface</h1>

        <!-- Formulario para crear un nuevo post -->
        <div class="card mb-4">
            <div class="card-header">Crear Nuevo Post</div>
            <div class="card-body">
                <form id="createForm" action="create.php" method="POST">
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

        <!-- Formulario para actualizar un post -->
        <div class="card mb-4">
            <div class="card-header">Actualizar Post</div>
            <div class="card-body">
                <form id="updateForm" action="update.php" method="POST">
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

        <!-- Formulario para eliminar un post -->
        <div class="card mb-4">
            <div class="card-header">Eliminar Post</div>
            <div class="card-body">
                <form id="deleteForm" action="delete.php" method="POST">
                    <div class="mb-3">
                        <label for="deleteId" class="form-label">ID del Post</label>
                        <input type="number" class="form-control" id="deleteId" name="id" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>

        <!-- Mostrar todos los posts -->
        <div class="card mb-4">
            <div class="card-header">Ver Todos los Posts</div>
            <div class="card-body">
                <button id="viewPostsBtn" class="btn btn-info mb-3">Ver Posts</button>
                <div id="postsContainer"></div>
            </div>
        </div>
    </div>

    <script>
        // Validaciones JavaScript
        document.getElementById('createForm').addEventListener('submit', function(event) {
            if (!document.getElementById('createTitle').value || !document.getElementById('createBody').value || !document.getElementById('createUserId').value) {
                alert('Por favor, completa todos los campos.');
                event.preventDefault();
            }
        });

        document.getElementById('updateForm').addEventListener('submit', function(event) {
            if (!document.getElementById('updateId').value || !document.getElementById('updateTitle').value || !document.getElementById('updateBody').value || !document.getElementById('updateUserId').value) {
                alert('Por favor, completa todos los campos.');
                event.preventDefault();
            }
        });

        document.getElementById('deleteForm').addEventListener('submit', function(event) {
            if (!document.getElementById('deleteId').value) {
                alert('Por favor, completa todos los campos.');
                event.preventDefault();
            }
        });

        // Mostrar todos los posts
        document.getElementById('viewPostsBtn').addEventListener('click', function() {
            $.ajax({
                url: 'read.php',
                method: 'GET',
                success: function(data) {
                    $('#postsContainer').html(data);
                }
            });
        });
    </script>
</body>

</html>