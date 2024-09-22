<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Runnin'</title>
    <link rel="icon" href="../trabalho-olimpiadas/images/logo_nossa.png" type="image/png">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/header.css">
    <link rel="stylesheet" href="assets/footer.css">
</head>

<body>
    <?php
    include_once('includes/header.php');
    include_once('includes/connection.php');
    ?>

    <div class="intro">
        <div class="text-intro">
            <h1 class="slogan"><b>O Melhor Portal de Atletismo</b></h1>
            <br>
            <p class="description">
                Aqui você pode explorar 14 modalidades emocionantes do esporte, desde corridas rápidas até saltos e
                arremessos. Descubra a história fascinante do atletismo, tanto globalmente quanto no Brasil, e veja como
                o esporte evoluiu ao longo dos anos. Acompanhe os feitos históricos dos maiores atletas e conheça o
                impacto do atletismo em diferentes competições. Navegue e mergulhe no mundo do atletismo conosco!
            </p>
        </div>
        <img src="images/logo_olimpica.svg" alt="logo das olimpiadas" class="logo_olimpiadas">
    </div>

    <div class="modalidades">
        <h1>Modalidades</h1>
        <div class="carousel">
            <div class="carousel-wrapper">
                <div class="carousel-item"><img src="../trabalho-olimpiadas/images/100m-rasosum.jpg" alt="Imagem 1">
                </div>
                <div class="carousel-item"><img src="../trabalho-olimpiadas/images/110m-barreira.jpg" alt="Imagem 2">
                </div>
                <div class="carousel-item"><img src="../trabalho-olimpiadas/images/200m-rasos.jpg" alt="Imagem 3"></div>
                <div class="carousel-item"><img src="../trabalho-olimpiadas/images/400m-barreira.jpg" alt="Imagem 4">
                </div>
                <div class="carousel-item"><img src="../trabalho-olimpiadas/images/400m-rasos.jpg" alt="Imagem 5"></div>
                <div class="carousel-item"><img src="../trabalho-olimpiadas/images/arremesso-dardo.jpg" alt="Imagem 6">
                </div>
                <div class="carousel-item"><img src="../trabalho-olimpiadas/images/arremesso-disco.jpg" alt="Imagem 7">
                </div>
                <div class="carousel-item"><img src="../trabalho-olimpiadas/images/arremesso-peso.jpg" alt="Imagem 8">
                </div>
                <div class="carousel-item"><img src="../trabalho-olimpiadas/images/revezamento.jpg" alt="Imagem 9">
                </div>
                <div class="carousel-item"><img src="../trabalho-olimpiadas/images/salto_altura.jpeg" alt="Imagem 10">
                </div>
                <div class="carousel-item"><img src="../trabalho-olimpiadas/images/salta_distancia.jpg" alt="Imagem 11">
                </div>
                <div class="carousel-item"><img src="../trabalho-olimpiadas/images/salto_vara.jpeg" alt="Imagem 12">
                </div>
            </div>
        </div>
        <script src="includes/carousel.js"></script>
    </div>

    <div class="medalhas">
        <h1>Quadro de Medalhas</h1>
        <p>Aqui mostraremos o Quadro de Medalhas das Olimpiadas de Paris 2024</p>
    </div>

    <div class="avaliacao">
        <h2>Faça sua Avaliação</h2>
        <form method="POST" action="includes/submit.php">
            <label for="nome_avaliador">Seu Nome:</label>
            <input type="text" id="nome_avaliador" name="nome_avaliador" required>
            <br>

            <label>Nota:</label>
            <div class="stars" id="starRating">
                <span class="star" data-value="5">★</span>
                <span class="star" data-value="4">★</span>
                <span class="star" data-value="3">★</span>
                <span class="star" data-value="2">★</span>
                <span class="star" data-value="1">★</span>
                <input type="hidden" id="nota" name="nota" required>
            </div>
            <br>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>
            <br>
            <input type="submit" value="Enviar Avaliação" class="submit-btn">
        </form>
    </div>


    <div class="avaliacoes-recentes">
        <h2>Avaliações Recentes:</h2>
        <?php
        $sql = "SELECT * FROM feedback ORDER BY id_avaliacao DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="avaliacao-item">';
                echo '<strong>' . htmlspecialchars($row['nome_avaliador']) . '</strong> (Nota: ' . $row['nota'] . ')';
                echo '<p>' . nl2br(htmlspecialchars($row['descricao'])) . '</p>';
                echo '<small>' . $row['data'] . ' ' . $row['horario'] . '</small>';
                echo '</div>';
            }
        } else {
            echo '<p>Nenhuma avaliação encontrada.</p>';
        }
        $conn->close();
        ?>
    </div>

    <?php
    include_once('includes/footer.php');
    ?>
</body>

</html>