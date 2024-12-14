<?php require('partials/head.php') ?>

<body class="h-full">

    <div class="min-h-full">

        <?php require('partials/nav.php') ?>

        <?php require('partials/banner.php') ?>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <p>This is the notes page</p>

                <?php foreach ($notes as $note) : ?>
                  <li>
                    <?= $note['body'] ?>
                  </li>
                <?php endforeach; ?>

            </div>
        </main>
    </div>

</body>
</html>