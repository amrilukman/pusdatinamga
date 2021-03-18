<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>PUSDATIN AMGA - <?php $uri = current_url(true);
                            echo ucfirst($uri->getSegment(2)) ?>
    </title>
    <!-- Favicon -->
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url('../assets/vendor/nucleo/css/nucleo.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?= base_url('../assets/css/argon.css?v=1.2.0') ?>" type="text/css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        /* .search {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
        }

        .search * {
            outline: none;
            box-sizing: border-box;
        } */

        .search__wrapper {
            position: relative;
        }

        .search__field {
            width: 44px;
            height: 44px;
            color: transparent;
            padding: 0.35em 45px 0.35em 0;
            border-color: transparent;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .search__field:focus {
            width: 40vw;
            color: #2b2b2b;
            padding-left: 45px;
        }

        .search__field:focus~.search__icon {
            background-color: transparent;
            cursor: pointer;
            pointer-events: auto;
        }

        .search__icon {
            background-color: #ffffff;
            padding-left: 12px;
            border-radius: 4px;
            position: absolute;
            width: 44px;
            height: 44px;
            font-size: 15px;
            text-align: center;
            border-color: transparent;
            pointer-events: none;
            display: inline-block;
            transition: background-color 0.2s ease-in-out;
        }

        .search__field::-webkit-input-placeholder {
            position: relative;
            top: 0;
            left: 0;
            transition-property: top, color;
            transition-duration: .1s;
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-perspective: 1000;
            perspective: 1000;
        }

        .search__field:-moz-placeholder {
            position: relative;
            top: 0;
            left: 0;
            transition-property: top, color;
            transition-duration: .1s;
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-perspective: 1000;
            perspective: 1000;
        }

        .search__field:-ms-input-placeholder {
            position: relative;
            top: 0;
            left: 0;
            transition-property: top, color;
            transition-duration: .1s;
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-perspective: 1000;
            perspective: 1000;
        }

        .search__field::-webkit-input-placeholder[style*=hidden] {
            color: #83b0c1;
            font-size: .65em;
            font-weight: normal;
            top: -20px;
            opacity: 1;
            visibility: visible !important;
        }

        .search__field:-moz-placeholder[style*=hidden] {
            color: #83b0c1;
            font-size: .65em;
            font-weight: normal;
            top: -20px;
            opacity: 1;
            visibility: visible !important;
        }

        .search__field::-moz-placeholder[style*=hidden] {
            color: #83b0c1;
            font-size: .65em;
            font-weight: normal;
            top: -20px;
            opacity: 1;
            visibility: visible !important;
        }

        .search__field:-ms-input-placeholder[style*=hidden] {
            color: #83b0c1;
            font-size: .65em;
            font-weight: normal;
            top: -20px;
            opacity: 1;
            visibility: visible !important;
        }
    </style>
</head>