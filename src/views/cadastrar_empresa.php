<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Empresa</title>
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
            height: 100vh;
            color: #fff;
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
            max-width: 400px;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        input:focus {
            outline: none;
            border-color: #2575fc;
            box-shadow: 0 0 5px rgba(37, 117, 252, 0.5);
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2575fc;
            color: #fff;
            border: none;
            border-radius: 4px;
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

            input, button {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <form action="?controller=empresa&action=salvar" method="POST">
        <h1>Cadastrar Empresa</h1>
        <label for="nome">Nome da Empresa:</label>
        <input type="text" id="nome" name="nome" required
        placeholder="Ex:Salgados LTDA">
        <br><br>
        <button type="submit">Cadastrar</button>
        <a href="?controller=funcionario&action=listar" class="button-return">Retornar</a>
    </form>
</body>
</html>
