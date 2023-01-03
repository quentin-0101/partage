

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/espace.css">
    <title>Document</title>
</head>
<body>
<h1>Administrator Espace</h1>

<div class="">

<a href="?controller=categoriePrincipale&action=create" class="btn btn-primary">Add a new (main) category</a>
<br>
<br>
<a href="?controller=categorieProduit&action=create" class="btn btn-primary">Add a new (sub) category</a>
<br>
<br>
<a href="?controller=categoriePrincipale&action=readAll" class="btn btn-primary">Edit existing categories</a>
<br>
<br>
<!--
<a href="?controller=produit&action=validePendingRequest" class="btn btn-primary">Process pending requests</a>
<br>
-->
<a href="?controller=utilisateur&action=disconnect">se déconnecter</a>
</div>
</body>
</html>