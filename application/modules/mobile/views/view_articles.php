<?php
main_header(['dashboard']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            /* background-color: #333; */
            color: white;
            text-align: center;
            padding: 1em;
            margin-top: 2rem;
        }

        section {
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            line-height: 1.6;
            color: #666;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header style="background-color:#026E09">View Latest Articles</header>
<section>
    <?php foreach ($articles as $article): ?>
        <h2 style="color:#026E09"><?= $article->Title?></h2><br>
        <img src="<?= base_url() . "assets/images/banners/".rand(1,10).".jpg" ?>" style="width:15rem;height:10rem;display:block;margin: 0 auto;">
        <br><p><?= $article->ShortDes ?></p>
        <a style="color:#026E09" href="<?= $article->Link ?>">Continue reading...</a>
        <br><hr>
    <?php endforeach; ?>
</section>

</body>

<?php
main_footer();
?>
</html>
