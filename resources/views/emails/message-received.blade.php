<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>{{ $msg['name'] }} envio un mensaje</title>
</head>

<body>
    <style>
        .header__principal {
            padding: 5px 0;
            width: 100%;
            background: var(--color-negro);
        }

        :root {
            --max-width: 85vw;
            --border-radius: 15px;
            --color-amarillo: #e7bb41;
            --color-rojo: #e74141;
            --color-negro: #393e41;
            --color-blanco: #e7e5df;
            --color-gris: #d3d0cb;
        }
        .text-muted{
            color: #9c9c9c;
        }

        .header__principal--ctn h1 a {
            color: var(--color-amarillo);
            text-decoration: none;
        }

        .header__principal--ctn {
            display: flex;
            color: var(--color-amarillo);
            text-align: center;
            align-items: center;
            max-width: var(--max-width);
            margin: auto;
            justify-content: center;
        }
        .btn-muted{
            background: var(--color-negro);
            color: var(--color-gris);
            width: fit-content;
            padding: 8px;
            border-radius: 5px;
        }

        * {
            font-family: sans-serif;
        }
    </style>
    <header>
        <div class="header__principal">
            <div class="header__principal--ctn">
                <h1><a href="https://www.senicort.in">Senicort</a></h1>
            </div>
        </div>
    </header>
    <h2>Mensaje enviado por:</h2>
    <span>{{ $msg['name'] }} </span><span class="text-muted">&lt;{{ $msg['email'] }}&gt;</span>
    <p class="btn-muted">{{ $msg['phone'] }}</p>
    <p>{{ $msg['mensaje'] }}</p>
</body>

</html>
