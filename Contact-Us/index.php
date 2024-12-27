<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Jonas TECH Contacter-Nous</title>
    <style>
        .form {
            margin: auto;
            width: 50%;
        }
        .flex{
            display: flex;
        }
        .fom {
            border: 1px solid black;
            width: 700px;
            padding: 70px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 1px 1px 10px 1px black;
            background-color:white;
            display: flex;
        }
        .mess{
            margin-right: 20px;
        }
        .lbl {
            color: black;
        }

        .input {
            padding: 17px;
            width: 300px;
            /*border-radius: 5px;*/
        }

        .IptS {
            padding: 10px;
            border-radius: 10px;
            width: 200px;
            margin-top: 10px;
        }

       
        img {
            width: 600px;
            height: 500px;
            margin: -40px;
        }

        .img {
            border: 3px dashed #357079;
            border-radius: 10px 100px 100px 100px;
            padding: -30px
        }

        .flex1 {
            display: flex;
            /*background-color: #357079;*/
        }

        .para h1 {
            font-size: 36px;
        }

        .para {
            margin-top: 50px;
            margin-left: 100px;
        }

        .cnto {
            margin-top: 50px;
        }

        .vf {
            display: block;
        }
        .nkmiu{
            padding: 30px;
            border: 1px solid black;
            width: 210px;
            border-radius: 10px;
            background-color: aliceblue;
        }
        .nkmiu1 a{
            text-decoration: none;
            font-size: 18px;
            font-weight: 1000;
            color: black;
        }
        .nkmiu a{
            text-decoration: none;
            font-size: 18px;
            font-weight: 1000;
            color: black;
        }
        .nkmiu1{
            padding: 30px;
            border: 1px solid black;
            width: 210px;
            border-radius: 10px;
            background-color:aliceblue;
        }
        .cnt{
            display: flex;
            justify-content: space-around;
            background-color: #357079;
            padding: 50px;
        }
    </style>
</head>

<body>
    <?php include("../Content/menu.php"); ?>
    <div class="vf">
        <div class="flex1">
            <div class="img">
                <img src="../Assets/img/Gear-Samsung.png" alt="">
            </div>
            <div class="para">
                <h1>Contacter - Nous</h1><br>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. <br> Mollitia velit, laboriosam consequatur prov Lorem ipsum dolor sit amet <br> consectetur adipisicing elit. Quae vero distinctio soluta ipsam omnis en <br>im quidem, dicta veritatis dolore odio provident similique magni illo.</p><br>
                <h1>Rejoignez-Nous</h1>
                <div class="ic">
                    <a href="http://facebook.com" target="_blank" rel="noopener noreferrer"><i class="fa fa-facebook" style="font-size:26px; margin-right:20px;"></i></a>
                    <a href="http://instagram.com" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram" style="font-size:26px; margin-right:20px;"></i></a>
                    <a href="http://youtube.com/chanel/JonasTech" target="_blank" rel="noopener noreferrer"><i class="fa fa-youtube" style="font-size:26px; margin-right:20px;"></i></a>
                    <a href="http://twitter.com" target="_blank" rel="noopener noreferrer"><i class="fa fa-twitter" style="font-size:26px; margin-right:20px;"></i></a>
                </div>
                </p>
            </div>

        </div>
        <div class="cnto">


            <div class="cnt">
                <div class="nkmiu"> Email: <a href="mailto:#">serviceclient@Jonastech.com</a><br></div>
                <div class="nkmiu1">Contact: <br> <a href="tel:+22951037877">+22951037877</a></div>
                <div class="nkmiu1">Adresse: <br> <a href="http://google.maps.com">Benin/ Porto-Novo</a></div>
                <p>
            </div>
        </div>
    </div>
    <div class="form">
        <form class="fom" action="traitMes" method="post">
            <div class="flex">
                <div class="mess">
                    <label class="lbl" for="">Message:</label><br>
                    <textarea name="messages" id="" cols="30" rows="21" required></textarea>
                </div>
                <div>
                    <label class="lbl" for="">Nom:</label><br>
                    <input class="input" type="text" name="nom" id="nom" required><br><br>
                    <label class="lbl" for="">Prenom:</label><br>
                    <input class="input" type="text" name="prenom" required><br><br>
                    <label class="lbl" for="">Numéro de téléphone:</label><br>
                    <input class="input" type="tel" name="num" id="tel" required><br><br>
                    <label class="lbl" for="">Email:</label><br>
                    <input class="input" type="email" name="email" id="" required><br>
                    <input class="IptS" type="submit">
                </div>
            </div>
        </form>
    </div>
    
    <?php include("../Content/footer.php"); ?>
</body>

</html>