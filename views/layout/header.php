<!DOCTYPE html>
<html lang="uk">
<head>
<meta charset="UTF-8">
<title>Мій блог</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-4">
<header class="mb-4">
    <h1 class="text-primary">Мій блог</h1>

    <form class="row g-3" method="GET" action="index.php">
        <div class="col-auto">
            <input type="text" class="form-control" name="search"
                   placeholder="Пошук..."
                   value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Пошук</button>
        </div>
    </form>
</header>
