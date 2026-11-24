<?php
$pageTitle = 'Page not found | Shalento Medical Journey';
include "main.php";
?>
<link rel="stylesheet" href="assets/css/pages.min.css?v=<?= $assetVersion ?>">

<main id="pageWrapper" class="errorPage" tabindex="-1">

    <section class="errorSection darkSection" aria-labelledby="error-title">
        <div class="container">
            <p class="errorCode" aria-hidden="true">404</p>
            <h1 class="errorTitle" id="error-title">Page not found</h1>
            <p class="errorText">The page you are looking for does not exist. It may have been moved or removed. Return to the home page to find what you need.</p>
            <a class="btn btnGold errorAction" href="index.php">
                Back to home
                <img class="btnIcon" src="assets/images/icons/arrow-right-white.svg" width="20" height="20" alt="">
            </a>
        </div>
    </section>

</main>

<?php include "./includes/footer.php"; ?>
