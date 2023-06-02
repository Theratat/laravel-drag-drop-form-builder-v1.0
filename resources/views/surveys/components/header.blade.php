<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SLASH</title>

<!-- bootstrap-5.2.0 -->
<!-- <link rel="stylesheet" type="text/css" href="themes/website/assets/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="/themes/website/assets/css/bootstrap.min.css">

<!-- font-awesome-5.15.4 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- style -->
<!-- <link rel="stylesheet" type="text/css" href="themes/website/assets/css/style.css"> -->
<link rel="stylesheet" type="text/css" href="/themes/website/assets/css/style.css">

<link rel="shortcut icon" href="/themes/website/assets/img/2022-08-22_143612.png" type="image/x-icon">

<!-- bootstrap-5.2.0 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!--<script src="./assets/js/bootstrap.bundle.min.js"></script>-->

<!-- slider -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script>
    $(document).ready(function() {
        $('.customer-logos').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
    });
    </script>
    
    <style>
    .bg-gradient-primary {
        background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
    }
    
    .btn-gradient-primary {
        background: #fff;
        border: 1px solid linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
        color: #825ee4;
    }
    
    .btn-gradient-primary {
        background: #fff;
        border: 1px solid linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
        color: #825ee4;
        transition: all 0.5s ease;
        padding: 6px 20px;
    }
    
    .btn-gradient-primary:hover {
        background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
        border: 1px solid linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
        color: #fff;
    }
    
    .btn-gradient-primary2 {
        background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
        border: 1px solid linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
        color: #fff;
        transition: all 0.5s ease;
        padding: 6px 20px;
    }
    
    .btn-gradient-primary2:hover {
        background: #fff !important;
        border: 1px solid linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
        color: #825ee4;
    }
    
    .text-gradient-primary {
        /* Create the gradient. */
        background-image: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
    
        /* Set the background size and repeat properties. */
        background-size: 100%;
        background-repeat: repeat;
    
        /* Use the text as a mask for the background. */
        /* This will show the gradient as a text color rather than element bg. */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        -moz-background-clip: text;
        -moz-text-fill-color: transparent;
    }
    
    .border-gradient-primary {
        border: 2px solid #5e72e4;
    }
    
    .sha {
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }
    
    .header-survey img {
        width: 100%;
    }
    
    .bg-survey {
        background: url("{{ asset('/assets/img/healthy-diet-healthy-eating-pyramid-health-food-mix-fruit.png') }}") !important;
    }
    
    .cursor-pointer {
        cursor: pointer !important;
    }
    
    @media (max-width: 576px) {
    
        .btn-gradient-primary,
        .btn-gradient-primary2 {
            width: 100%;
        }
    
        .fontSurveyThanks {
            font-size: larger;
        }
    }
    </style>
