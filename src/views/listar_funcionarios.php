<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Funcionários</title>
    <style>
    body {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
        color: #333;
    }

    .main-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #343a40;
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }

    .header-links {
        display: flex;
        gap: 15px;
    }

    .header-link {
        color:rgb(0, 66, 136);
        text-decoration: none;
        font-weight: bold;
    }

    .header-link:hover {
        color: #ffc107;
        text-decoration: underline;
    }

    .logout {
        padding: 5px 10px;
        background-color: #dc3545;
        color: #fff;
        border-radius: 3px;
        text-decoration: none;
        transition: transform 0.3s ease;
    }
    .logout:hover {
        transform: scale(1.1);
        cursor: pointer;
    }

    .header-title {
        font-size: 24px;
        color: #f8f9fa;
        margin: 0;
    }

    .table-container {
        max-width: 80%;
        max-height: 500px;
        margin: 20px auto;
        overflow-x: auto;
        overflow-y: auto;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 15px;
    }

    .actions-btns {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-bottom: 15px;
    }

    .header-link:hover {
        text-decoration: underline;
        color: #0056b3;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #343a40;
        color: #f8f9fa;
        font-weight: bold;
    }

    .table tr:hover {
        background-color: #f1f1f1;
    }

    .mui-button {
        text-decoration: none;
        transition: transform 0.3s ease;
        font-weight: bold;
    }

    .mui-button--edit {
        padding: 5px 10px;
        background-color: #ffc107;
        color: #343a40;
        border-radius: 3px;
        text-align: center;
        display: inline-block;
    }

    .mui-button--edit:hover {
        text-decoration: underline;
        transform: scale(1.1);
        cursor: pointer;
    }

    .mui-button--delete {
        padding: 5px 10px;
        background-color: #dc3545;
        color: #fff;
        border-radius: 3px;
        text-align: center;
        display: inline-block;
    }

    .mui-button--delete:hover {
        text-decoration: underline;
        transform: scale(1.1);
        cursor: pointer;
    }

    @media screen and (max-width: 768px) {
        .table-container {
            max-width: 100%;
        }

        .table th, .table td {
            font-size: 14px;
        }

        .actions-btns {
            flex-direction: column;
            align-items: flex-start;
        }
    }
    .blue-row {
        background-color: #ADD8E6;
    }

    .red-row {
        background-color: #FFCCCC; 
    }

    </style>
    <?php
    require_once '../src/utils/formatar_cpf.php';
    require_once '../src/utils/formatar_rg.php';
    ?>
</head>
<body>
<header class="main-header">
    <h1 class="header-title">Titan</h1>
        <div class="header-links">
            <a href="?controller=login&action=logout" class="logout">Sair</a>
        </div>
    </header>
    <div>
        <div class="table-container">
        <div class="actions-btns">
            <a href="?controller=funcionario&action=cadastrar" class="header-link">Cadastrar Funcionário</a>
            <a href="?controller=empresa&action=cadastrar" class="header-link">Cadastrar Empresa</a>
        </div>
        <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Email</th>
            <th>Empresa</th>
            <th>Data</th>
            <th>Salário</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($funcionarios)): ?>
            <tr>
                <td colspan="9" style="text-align: center;">Nenhum funcionário cadastrado.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($funcionarios as $funcionario): ?>
            <?php
                $rowClass = '';
                if ($funcionario['bonificacao'] == 0.1) {
                    $rowClass = 'blue-row'; 
                } elseif ($funcionario['bonificacao'] == 0.2) {
                    $rowClass = 'red-row'; 
                }
               
            ?>
            <tr class="<?= $rowClass ?>">
                <td><?php echo $funcionario['id_funcionario']; ?></td>
                <td><?php echo $funcionario['nome']; ?></td>
                <td><?php echo formatarCPF($funcionario['cpf']); ?></td>
                <td><?php echo formatarRG($funcionario['rg']); ?></td>
                <td><?php echo $funcionario['email']; ?></td>
                <td><?php echo $funcionario['empresa']; ?></td>
                <td><?= date('d/m/Y', strtotime($funcionario['data_cadastro'])) ?></td>
                <td>R$ <?= number_format($funcionario['salario'], 2, ',', '.') ?></td>
                <td>
                    <a href="?controller=funcionario&action=editar&id=<?php echo $funcionario['id_funcionario']; ?>" class="mui-button mui-button--edit">Editar</a>
                    <a href="?controller=funcionario&action=excluir&id=<?php echo $funcionario['id_funcionario']; ?>" class="mui-button mui-button--delete" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

    </div>     
    </div>
    <!-- <a href="?controller=funcionario&action=exportarPdf">Exportar para PDF</a> -->
</body>
</html>

