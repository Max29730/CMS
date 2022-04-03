<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <title><?php echo isset($title_for_layout) ? $title_for_layout : 'Mon site' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <!-- SEO -->
    <meta name="Description" content="Description de la page, ceci est important pour le SEO (inclure le mot clé dedans et de préférence au début)">
    <meta name="Revisit-After" content="1 day">
    <meta name="Robots" content="all">
    <meta name="Rating" content="general">
    <meta name="Distribution" content="global">

</head>

<body>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><?php echo isset($title_for_layout) ? $title_for_layout : 'Mon site' ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php $pagesMenu = $this->request('Pages', 'getMenu') ?>
                    <?php foreach ($pagesMenu as $p) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL . '/pages/view/' . $p->idpost ?>" title="<?php echo $p->name ?>"><?php echo $p->name ?></a>
                        </li>
                    <?php endforeach ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo Router::url('posts/index')?>">Actualités</a>
                    </li>
                    <!--<li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li> -->
                </ul>
            </div>
        </nav>

    </header>
    <main>
        <div class="container">
            <?php echo $content_for_layout ?>
        </div>
    </main>
    <footer>

    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>