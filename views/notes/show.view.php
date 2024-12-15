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

              <form class="mt-6" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="text-sm text-red-500">Delete</button>
              </form>
            </div>
        </main>
    </div>

</body>
</html>