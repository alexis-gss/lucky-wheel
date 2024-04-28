<!doctype html>
<html lang="en">
<head>
    <title>Lucky wheel</title>

    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lucky wheel with custom values.">
    <meta name="robots" content="index,follow">

    <!-- OPEN GRAPH -->
    <meta property="og:title" content="Lucky wheel" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://lucky-wheel.alexis-gousseau.com/" />
    <meta property="og:site_name" content="Lucky wheel" />
    <meta property="og:image" content="./favicon.ico" />
    <meta property="og:description" content="Lucky wheel with custom values." />

    <!-- FAVICON -->
    <link href="./favicon.ico" rel="icon">
    <link href="./apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
    <link type="image/png" href="./favicon-16x16.png" rel="icon" sizes="16x16">
    <link type="image/png" href="./favicon-32x32.png" rel="icon" sizes="32x32">
    <link href="./site.webmanifest" rel="manifest">
    <link href="./safari-pinned-tab.svg" rel="mask-icon" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#212529">
    <meta name="msapplication-TileImage" content="./mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <!-- CSS LINKS -->
    <link href="./css/app.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- JAVASCRIPT LINKS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.js"></script>
    <script type="text/javascript" src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"
        integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=="></script>
</head>
<body>
    <?php
        if (isset($_GET['selection']))
            $entries = explode(",", $_GET['selection']);
    ?>
    <section class="container pt-3 pb-5 py-lg-3 vw-100 d-flex justify-content-center align-items-center">
        <div class="row justify-content-center align-items-lg-center w-100 overflow-hidden">
            <div class="col-12 col-lg-4 mb-5 mb-lg-0 p-1">
                <!-- FORMULARY -->
                <form action="./index.php" method="GET" class="">
                    <label for="#wheel-values" class="form-label fw-bold">
                        Enter some values
                        <span data-bs-toggle="tooltip"
                            title="The entered some values that will be added to the wheel, respect the format: name1,name2,name3...">
                            <i class="fa-solid fa-circle-info"></i>
                        </span>
                    </label>
                    <div class="input-group d-flex flex-row justify-content-center align-items-center">
                        <input id="wheel-values" type="text" name="selection" class="form-control"
                            placeholder="name1,name2,name3..." value="<?php if (isset($_GET['selection'])) {
                                echo $_GET['selection'];
                            } ?>" autofocus required>
                        <button id="wheel-values-btn" type="submit" data-bs-toggle="tooltip" class="btn btn-outline-primary"
                            title="Add values you have entered to the wheel">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </form>
                <!-- LEGEND -->
                <div class="legend">
                    <div class="list-group w-100 <?php if (isset($_GET['selection']) && count($entries) >= 8) { ?>  border rounded-3 overflow-y-scroll list-group-flush <?php } ?>"></div>
                </div>
            </div>
            <div class="col-12 col-lg-8 h-100">
                <!-- WHEEL -->
                <?php if (isset($_GET['selection'])) { ?>
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="wheel-wrapper position-relative d-flex flex-row justify-content-center align-items-center w-100">
                            <canvas class="wheel-circle" id="wheelChart"></canvas>
                            <button class="wheel-button position-absolute top-50 start-50 translate-middle btn btn-dark rounded-circle fw-bold fs-2">
                                SPIN
                            </button>
                        </div>
                        <script> var target = <?php echo json_encode($entries); ?>; </script>
                        <script type="text/javascript" src="./js/main.js"></script>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="./js/tooltips.js"></script>
</body>
</html>