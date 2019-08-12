<?php
    include "../vendor/autoload.php";
    use PosAlfa\BancoDeDados;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trabalho Galvão - Rangel</title>
</head>

<body>
    <h3 class="text-center">Listagem de usuários</h3>
    <div class="container">
        <?php
        
        $usuarios = new \PosAlfa\BancoDeDados();

        foreach ($usuarios as $usuario):
        ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data Nascimento</th>
                    <th>Função</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $usuario->id ?></td>
                    <td><?= $usuario->nome ?></td>
                    <td><?= $usuario->data_nascimento ?></td>
                    <td><?= $usuario->funcao ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>