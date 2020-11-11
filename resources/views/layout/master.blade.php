<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bridge Africa Online Market Place</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        #loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: 9999;
            text-align: center;
            color: white;
            font-weight: bolder;
            font-size: xx-large;
            margin-inside: 50%;
        }

        .card-header.ch-img {
            background-repeat: no-repeat;
            -webkit-background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            -o-background-size: 100% 100%;
            background-size: 100% 100%;
            background-position: center;
        }

        .card-header {
            position: relative;
            padding: 30px;
            border-radius: 2px 2px 0 0;
        }

        .bgm-white {
            background-color: #ffffff !important;
        }

        .payment-card-heading {
            padding: 20px;
            text-align: center;
            /*margin: 0 auto;*/
        }

        .alert-warning {
            background-color: #ffc107;
            border-color: transparent;
            color: #ffffff;
        }
    </style>
</head>
<body style="background-color: #ebebeb;">
<div class="container">
    @yield('content')
    <br/>
</div>
<footer class="footer mt-auto py-3 container">
    <nav class="navbar" style="background-color: #ffff; margin-bottom: -17px; margin-left: 10px;margin-right: 10px">
        <div style="color: orange">
            &copy; <a style="color: orange" href="http://go-groups.net" target="_blank">Bridge Africa Online Markplace</a><br>
            Yaounde Cameroon <br>
            P.O Box 1111 Yaounde.
        </div>
    </nav>
</footer>

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>