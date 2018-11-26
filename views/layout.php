<DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    </head>

    <body>
        <header>
            <a href='/DAW2/vistacontrolador/blog_php_mvc'>Home</a>
            <a href='?controller=posts&action=index'>Posts</a>
            <a href='?controller=posts&action=insert'>Insert</a>
        </header>

        <?php require_once('routes.php'); ?>

        <footer>
            Copyright
        </footer>
    </body>

    </html>
