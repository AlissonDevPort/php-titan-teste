<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($funcionario) ? 'Editar Funcionário' : 'Cadastrar Funcionário'; ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #fff;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        form {
            background: #fff;
            color: #333;
            width: 100%;
            max-width: 500px;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 0.9rem;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #2575fc;
            box-shadow: 0 0 5px rgba(37, 117, 252, 0.5);
        }

        button {
            background: #2575fc;
            color: #fff;
            border: none;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        button:hover {
            background: #1a5fc7;
            text-decoration: underline;
            transform: scale(1.1);
        }
        .button-return {
            display: inline-block;
            padding: 10px 15px;
            background-color: #6c757d;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            margin-top: 10px;
            width: 100%;
            transition: transform 0.3s ease;
        }

        .button-return:hover {
            background-color: #5a6268;
            text-decoration: underline;
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            form {
                padding: 15px 20px;
            }

            h1 {
                font-size: 1.8rem;
            }

            input, select, button {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <form method="POST" action="?controller=funcionario&action=<?php echo isset($funcionario) ? 'atualizar' : 'salvar'; ?>">
        <h1><?php echo isset($funcionario) ? 'Editar Funcionário' : 'Cadastrar Funcionário'; ?></h1>

        <?php if (isset($funcionario)): ?>
            <input type="hidden" name="id_funcionario" value="<?php echo $funcionario['id_funcionario']; ?>">
        <?php endif; ?>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo isset($funcionario) ? $funcionario['nome'] : ''; ?>" required>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" value="<?php echo isset($funcionario) ? $funcionario['cpf'] : ''; ?>" required>

        <label for="rg">RG:</label>
        <input type="text" name="rg" value="<?php echo isset($funcionario) ? $funcionario['rg'] : ''; ?>">

        <label for="email">E-mail:</label>
        <input type="email" name="email" value="<?php echo isset($funcionario) ? $funcionario['email'] : ''; ?>" required>

        <label for="id_empresa">Empresa:</label>
        <select name="id_empresa" required>
            <?php foreach ($empresas as $empresa): ?>
                <option value="<?php echo $empresa['id_empresa']; ?>" <?php echo isset($funcionario) && $empresa['id_empresa'] == $funcionario['id_empresa'] ? 'selected' : ''; ?>>
                    <?php echo $empresa['nome']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="salario">Salário:</label>
        <input type="text" name="salario" value="<?php echo isset($funcionario) ? $funcionario['salario'] : ''; ?>">

        <button type="submit"><?php echo isset($funcionario) ? 'Atualizar' : 'Salvar'; ?></button>
        <a href="?controller=funcionario&action=listar" class="button-return">Retornar</a>
    </form>
</body>
</html>
