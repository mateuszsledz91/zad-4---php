<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link href="styl4.css" rel="stylesheet">
</head>

<body>

    <div id="baner">
        <h1>Forum wielbicieli psów</h1>
    </div>

    <div id="lewy">
        <img src="obraz.jpg" alt="foksterir">
    </div>

    <div id="prawy1">
        <h2>Zapisz się</h2>
        <form action="" method="post">
            login: <input type="text" name=login><br> hasło: <input type="password" name=haslo1><br> powtórz hasło: <input type="password" name=haslo2><br>
            <input type="submit" value="Zapisz">



            <?php

$conn = mysqli_connect("localhost","root","","psy");

            if(isset($_POST['login']) and isset($_POST['haslo1']) and isset($_POST['haslo2'])){
                


$sprawdz = 0;




                if($_POST['login']=="" or $_POST['haslo1']=="" or $_POST['haslo2']==""){
                    echo "wypełnij wszystkie pola";
                }else{
                    $login = $_POST['login'];
                        
                        $sqql = "SELECT login from uzytkownicy";
                        $result = mysqli_query($conn,$sqql);

                        while($row = mysqli_fetch_assoc($result)){
                            
                            if($_POST['login'] == $row['login'] ){

                                $sprawdz = 1;
                            }

                        }
                            if($sprawdz == 1){

                                echo "login występuje w bazie danych, konto nie zostało dodane";
                                
                            }else{

                                if($_POST['haslo1'] != $_POST['haslo2']){
                                    
                                    echo "hasła nie są takie same, konto nie zostało dodane";
                                    


                                }else{
                                    $szyfr = sha1($_POST['haslo1']);
                                    

                                    $sql = "INSERT INTO uzytkownicy(login,haslo)
                                    values('$login','$szyfr')";



                                    

                                    if(mysqli_query($conn,$sql)===true){
                                        echo "<p>  Konto zostało dodane  </p>";
                                        
                                        
                                        
                                    }
                                    
                                }
                            }





                        





                


















                }
            }
mysqli_close($conn);

?>

        </form>
    </div>





    <div id="prawy2">
        <h2>Zapraszamy wszyskich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarz</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </div>

    <div id="stopka">
        Stronę wykonał: Mateusz Śledź
    </div>

</body>

</html>