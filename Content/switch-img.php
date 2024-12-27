<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diaporama</title>
    <style>
        * {box-sizing: border-box;}
        body {font-family: Verdana, sans-serif;}
        .slideshow-container {
            width: 200vh;
            position: relative;
            margin: auto;
            
        }
        .mySlides {
            display: none;
        }
        img {
            vertical-align: middle;
            width: 100%;
        }
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
        }
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }
        .text {
            color: #f2f2f2;
            font-size: 22px;
            padding: 8px 12px;
            position: absolute;
            bottom:190px;
            right: 0%;
            width: 100%;
            text-align: center;
        }

        .text1 {
            color: black;
            font-size: 22px;
            padding: 8px 12px;
            position: absolute;
            bottom:190px;
            right: 0%;
            width: 100%;
            text-align: center;
        }
       
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }
        @-webkit-keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
        }
        @keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
        }
        .img3{
            height: 550px;
        }
        .img2{
            height: 550px;
        }
        .img1{
            height: 550px;
        }
        .n052{
            color: black;
        }
    </style>
</head>
<body>

<div class="slideshow-container">
<?php
                    include('Content/connect.php');
                    $listUsers = $con->query('SELECT * FROM  model');
                    while ($unUser = $listUsers->fetch()) {
                    ?>
    <div class="mySlides fade">
        <img class="img1" src="Assets/img_tel/<?php echo $unUser['img']; ?>" alt="Image 1">
        <div class="text"><h1><?php echo $unUser['nom']; ?></h1><br><br><?php echo $unUser['info']; ?></div>
    </div>
                   <?php } ?>
    
    <!-- Boutons précédent/suivant -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>

<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        slides[slideIndex-1].style.display = "block";  
        setTimeout(showSlides, 3000); // Change d'image toutes les 2 secondes
    }

    function plusSlides(n) {
        let slides = document.getElementsByClassName("mySlides");
        slideIndex += n;
        if (slideIndex > slides.length) {slideIndex = 1} 
        if (slideIndex < 1) {slideIndex = slides.length}
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex-1].style.display = "block";
    }
</script>
<!--https://via.placeholder.com/1000x400.png?text=Image+3-->
</body>
</html>
