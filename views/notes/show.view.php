<?php require basepath('views/partials/head.php') ?>

<body class="h-full">

    <div class="min-h-full">

        <?php require basepath('views/partials/nav.php') ?>

        <?php require basepath('views/partials/banner.php') ?>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
              <p>
                <a href="/notes" class="text-blue-500 underline">Go back..</a>
              </p>
              <p><?= htmlspecialchars($note['body']) ?></p>
            </div>
        </main>
    </div>

</body>
</html>