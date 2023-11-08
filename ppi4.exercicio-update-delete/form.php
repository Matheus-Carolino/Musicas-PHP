<?php include "parts/head.php"; ?>
<body>
    <?php include "parts/header.php"; ?>
    <?php
        $id = 0;
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $conn = new PDO("sqlite:musicas.sqlite");
            $conn->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_OBJ);
            $p = $conn->prepare("SELECT *
                FROM musicas WHERE id=:id;");
            $p->bindParam(":id", $id);
            $p->execute();
            $m = $p->fetch();
        }
    ?>
    <main class="container">
        <form action="ws/save.php" method="get">
            <input type="hidden" name="id" value="<?=$id?>">
            <div class="form-group">
                <label for="txtMusica">Música</label>
                <input type="text" class="form-control" name="nome" id="txtMusica" placeholder="Nome da música" value="<?= $id==0?'':$m->nome; ?>">
            </div>
            <div class="form-group">
                <label for="txtBanda">Banda</label>
                <input type="text" class="form-control" name="banda" id="txtBanda" placeholder="Nome da banda" value="<?= $id==0?'':$m->banda; ?>">
            </div>
            <input type="submit" value="Salvar" class="btn btn-success">
        </form>
    </main>
    <?php include "parts/footer.php"; ?>
</body>
</html>