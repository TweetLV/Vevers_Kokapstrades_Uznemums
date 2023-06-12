<!DOCTYPE html>
<html lang="lv">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reģistrācijas lapa</title>
    <link rel="stylesheet" href="../css/register.css">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h2>Reģistrācijas forma</h2>

                <?php
                require("connect_db.php");
                session_start();

                $name = $email = $password = $confirm_password = "";
                $name_err = $email_err = $password_err = $confirm_password_err = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty(trim($_POST["lietotajvards"]))) {
                        $name_err = "Lūdzu, ievadiet lietotājvārdu.";
                    } else {
                        $name = trim($_POST["lietotajvards"]);
                    }

                    if (empty(trim($_POST["emails"]))) {
                        $email_err = "Lūdzu, ievadiet e-pasta adresi.";
                    } else {
                        if (!filter_var($_POST["emails"], FILTER_VALIDATE_EMAIL)) {
                            $email_err = "Nederīgs e-pasta formāts.";
                        } else {
                            $email = trim($_POST["emails"]);
                        }
                    }

                    if (empty(trim($_POST["parole"]))) {
                        $password_err = "Lūdzu, ievadiet paroli.";
                    } elseif (strlen(trim($_POST["parole"])) < 6) {
                        $password_err = "Parolei jāsatur vismaz 6 simboli.";
                    } else {
                        $password = trim($_POST["parole"]);
                    }

                    if (empty(trim($_POST["apstiprinat_paroli"]))) {
                        $confirm_password_err = "Lūdzu, apstipriniet paroli.";
                    } else {
                        $confirm_password = trim($_POST["apstiprinat_paroli"]);
                        if (empty($password_err) && ($password != $confirm_password)) {
                            $confirm_password_err = "Paroles nesakrīt.";
                        }
                    }

                    if (empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                        $query = "INSERT INTO lietotaji (lietotajvards, parole, emails) VALUES ('$name', '$hashed_password', '$email')";
                        $result = mysqli_query($savienojums, $query);

                        if ($result) {
                            $name = $email = $password = $confirm_password = "";

                            header("Location: login.php");
                            exit();
                        } else {
                            echo "Error: " . mysqli_error($savienojums);
                        }
                    }
                }
                ?>

                <div>
                    <label>Lietotājvārds:</label>
                    <input type="text" name="lietotajvards" value="<?php echo $name; ?>">
                    <span>
                        <?php echo $name_err; ?>
                    </span>
                </div>
                <div>
                    <label>Ēpasts:</label>
                    <input type="text" name="emails" value="<?php echo $email; ?>">
                    <span>
                        <?php echo $email_err; ?>
                    </span>
                </div>
                <div>
                    <label>Parole:</label>
                    <input type="password" name="parole" value="<?php echo $password; ?>">
                    <span>
                        <?php echo $password_err; ?>
                    </span>
                </div>
                <div>
                    <label>Atkārtot paroli:</label>
                    <input type="password" name="apstiprinat_paroli" value="<?php echo $confirm_password; ?>">
                    <span>
                        <?php echo $confirm_password_err; ?>
                    </span>
                </div>
                <div>
                    <input type="submit" value="Reģistrēties">
                </div>
                <p>Jau ir profils? <a href="login.php">Ienākt šeit</a>.</p>
            </form>
        </div>
    </div>
</body>

</html>