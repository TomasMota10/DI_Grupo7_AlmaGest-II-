<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>
      Bienvenido a AlmaGest {{ $firstname }}, vamos a por el ultimo paso <strong> para que puedas usar nuestra App!</strong>!
    </h2>
    <p>Tendras que confirmar tu correo para que su cuenta se registre en nuestro sistema</p>
    <p>Para ello simplemente debes hacer click en el siguiente enlace:</p>

    <a href="{{ url('/register/verify/' . $code) }}">
        Haga click aqui para confirmar este email.
    </a>
</body>
</html>
