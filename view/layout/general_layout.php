<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('part/_head')
    <title>%title%</title>
    <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css?v=<?= time()?>">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendors/OwlCarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/OwlCarousel/dist/assets/owl.theme.default.min.css">
    <style>
        .alert{
            text-transform: capitalize;
            border-radius: 0;
        }
    </style>
</head>
<?php 
if (isset($body_class)) {
    $body_class = set_body_class('header-fixed');
}
?>
<body <?= $body_class ?? '' ?>>
    %@content%
    <script src="<?= base_url()."assets/js/jquery.js" ?>"></script>
    <script src="assets/vendors/OwlCarousel/dist/owl.carousel.min.js"></script>
</body>
</html>