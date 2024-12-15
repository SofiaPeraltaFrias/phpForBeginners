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

              <footer class="mt-6">
                <a href="/notes/edit?id=<?= $note['id'] ?>" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
              </footer>

              <!-- <form class="mt-6" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="text-sm text-red-500">Delete</button>
              </form> -->
            </div>
        </main>
    </div>

</body>
</html>