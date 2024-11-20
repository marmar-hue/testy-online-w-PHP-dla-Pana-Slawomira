<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
    <style> 
 /* Ogólne style dla strony */
/* Wycentrowanie treści */
body {
    font-family: Arial, sans-serif;
    background-color: #f3f4f6;
    margin: 0;
    padding: 0;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    box-sizing: border-box;
}

/* Formularz */
form {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
    text-align: center;
}

/* Styl pytań */
form div {
    margin-bottom: 15px;
    text-align: left;
}

form p {
    font-size: 1rem;
    margin-bottom: 5px;
    color: #34495e;
}

/* Pola tekstowe */
input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #bdc3c7;
    border-radius: 4px;
    font-size: 1rem;
    transition: border-color 0.2s;
    box-sizing: border-box;
}

input[type="text"]:focus {
    border-color: #3498db;
    outline: none;
}

/* Dodatkowe */
::placeholder {
    color: #95a5a6;
    font-style: italic;
}

    
.button-33{
        background-color: #c2fbd7;
        border-radius: 100px;
        box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
        color: green;
        cursor: pointer;
        display: inline-block;
        font-family: CerebriSans-Regular,-apple-system,system-ui,Roboto,sans-serif;
        padding: 7px 20px;
        text-align: center;
        text-decoration: none;
        transition: all 250ms;
        border: 0;
        font-size: 16px;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button-33:hover {
        box-shadow: rgba(44,187,99,.35) 0 -25px 18px -14px inset,rgba(44,187,99,.25) 0 1px 2px,rgba(44,187,99,.25) 0 2px 4px,rgba(44,187,99,.25) 0 4px 8px,rgba(44,187,99,.25) 0 8px 16px,rgba(44,187,99,.25) 0 16px 32px;
        transform: scale(1.05) rotate(-1deg);
        }
    </style>
</head>
<body>
    <form action="wynik.php" method="POST">
        <?php include 'pytania.php'; ?>
        <?php foreach ($zapytania as $id_pytania => $pytanie){ ?>
            <div>
                <p><?php echo $pytanie; ?></p>
                <input type="text" id="odp" name="odp[<?php echo $id_pytania; ?>]" placeholder="Wpisz tutaj odpowiedz" required>
            </div>
        <?php }; ?>
        <button class="button-33" type="submit">Zakończ quiz</button>
    </form>
</body>
</html>
