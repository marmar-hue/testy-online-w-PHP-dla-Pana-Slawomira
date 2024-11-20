<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
</head>
<body>
    <h1>Quiz</h1>
    <form action="wynik.php" method="POST">
        <?php include 'pytania.php'; ?>
        <?php foreach ($zapytania as $id_pytania => $pytanie){ ?>
            <div>
                <p><?php echo $pytanie; ?></p>
                <input type="text" id="odp" name="odp[<?php echo $id_pytania; ?>]" placeholder="Wpisz tutaj odpowiedz" required>
            </div>
        <?php }; ?>
        <button type="submit">Zakończ Quiz</button>
    </form>
</body>
</html>
