<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/login.css"> 
    <title>login</title>
</head>
<body>

    <?php
    try {
        // Connection en utlisant la connexion PDO avec le moteur en prefix
        $pdo = new PDO('sqlite:db.sqlite');
        // Permet de gérer le niveau des erreurs
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Erreur :'. $e->getMessage();
    }

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        if($email!= "" && $password != ""){
            $req = $pdo->query("Select * from users where email= '$email' and mdp = '$password'");
            $req = $req->fetch();
            if($req["id"] != False){
                
                echo"Vous êtes connecté";
            }
            else{
                $error_msg = "Email ou mdp incorrect";
            }
        }
    }
    
    
    
    ?>
    <main>

        <section id='logo'>
            <h1>LOGIN HERE</h1>
            <img src="images/logo.png" alt="Logo">
        </section>

        <section id="log">
            <form method="POST" action="">
                <label for="email">Email</label>
                <input type="email" placeholder="Entrer votre Email" id="email" name="email" required>

                <label for="password">Mot de passe</label>
                <input type="password" placeholder="Entrer votre Mot de passe" id="password" name="password" required>

                <!-- <input type="submit" value="Se connecter" name="ok"> -->
                <button>
                    <span class="box">
                        Hover!
                    </span>
                </button>
                

                <p>Vous n’avez pas de compte ? <a href="/inscription">Inscrivez-vous!</a></p>

            </form>
        </section>
    </main>


    <?php
        if ($error_msg){
            echo $error_msg;
        } 
    ?>
    
</body>
</html>