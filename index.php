<?php

require_once "conexion.php";


// =========================================
// CONSULTAR EVENTOS
// =========================================

$sql = "SELECT * FROM eventos ORDER BY fecha ASC, hora ASC";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Mi Agenda | AgendaWeb</title>


    <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@600;700&display=swap"
        rel="stylesheet"
    >


    <!-- CSS -->

    <link rel="stylesheet" href="css/index.css">

</head>


<body>


    <!-- =========================================
         MENSAJE DE ÉXITO / ERROR
         ========================================= -->

    <?php if (isset($_GET['guardado'])): ?>

        <div class="mensaje-flotante mensaje-exito">

            <span class="icono-mensaje">
                ✓
            </span>

            <div>

                <strong>
                    ¡Evento guardado!
                </strong>

                <p>
                    El evento se registró correctamente.
                </p>

            </div>

            <button onclick="cerrarMensaje()">
                ×
            </button>

        </div>

    <?php elseif (isset($_GET['error'])): ?>

        <div class="mensaje-flotante mensaje-error">

            <span class="icono-mensaje">
                !
            </span>

            <div>

                <strong>
                    Error al guardar
                </strong>

                <p>
                    No fue posible registrar el evento.
                </p>

            </div>

            <button onclick="cerrarMensaje()">
                ×
            </button>

        </div>

    <?php endif; ?>


    <!-- =========================================
         HEADER
         ========================================= -->

    <header class="header">

        <div class="logo">

            Agenda<span>Web</span>

        </div>


        <a
            href="p1.php"
            class="btn-agregar"
        >

            <span class="icono">
                +
            </span>

            Agregar Evento

        </a>

    </header>


    <!-- =========================================
         CONTENIDO
         ========================================= -->

    <main>

        <section class="contenedor">


            <!-- ENCABEZADO -->

            <div class="encabezado-agenda">

                <div>

                    <h1>
                        Mi Agenda
                    </h1>

                    <p>
                        Consulta y organiza tus próximos eventos.
                    </p>

                </div>

            </div>


            <!-- =========================================
                 EVENTOS
                 ========================================= -->

            <div class="eventos">

                <?php if ($resultado && $resultado->num_rows > 0): ?>


                    <?php while ($evento = $resultado->fetch_assoc()): ?>


                        <article class="evento">


                            <!-- FECHA -->

                            <div class="fecha-evento">

                                <span class="dia">

                                    <?= date(
                                        "d",
                                        strtotime($evento['fecha'])
                                    ); ?>

                                </span>

                                <span class="mes">

                                    <?= strtoupper(
                                        date(
                                            "M",
                                            strtotime($evento['fecha'])
                                        )
                                    ); ?>

                                </span>

                            </div>


                            <!-- INFORMACIÓN -->

                            <div class="informacion-evento">


                                <div class="evento-superior">


                                    <h2>

                                        <?= htmlspecialchars(
                                            $evento['titulo']
                                        ); ?>

                                    </h2>


                                    <span class="categoria">

                                        <?= htmlspecialchars(
                                            ucfirst($evento['categoria'])
                                        ); ?>

                                    </span>


                                </div>


                                <!-- HORA -->

                                <div class="hora">

                                    ▣

                                    <?= date(
                                        "h:i A",
                                        strtotime($evento['hora'])
                                    ); ?>

                                </div>


                                <!-- DESCRIPCIÓN -->

                                <?php if (!empty($evento['descripcion'])): ?>

                                    <p class="descripcion">

                                        <?= htmlspecialchars(
                                            $evento['descripcion']
                                        ); ?>

                                    </p>

                                <?php endif; ?>


                            </div>


                        </article>


                    <?php endwhile; ?>


                <?php else: ?>


                    <!-- SIN EVENTOS -->

                    <div class="sin-eventos">

                        <div class="icono-vacio">
                            +
                        </div>

                        <h2>
                            No tienes eventos registrados
                        </h2>

                        <p>
                            Comienza agregando tu primer evento a la agenda.
                        </p>

                        <a
                            href="p1.php"
                            class="btn-primer-evento"
                        >
                            Agregar mi primer evento
                        </a>

                    </div>


                <?php endif; ?>


            </div>


        </section>

    </main>


    <!-- =========================================
         FOOTER
         ========================================= -->

    <footer>

        © 2026 AgendaWeb · Organiza tu tiempo

    </footer>


    <!-- =========================================
         JAVASCRIPT
         ========================================= -->

    <script>

        function cerrarMensaje() {

            const mensaje =
                document.querySelector('.mensaje-flotante');

            if (mensaje) {

                mensaje.classList.add('mensaje-saliendo');

                setTimeout(() => {

                    mensaje.remove();

                }, 400);

            }

        }


        // Ocultar automáticamente después de 4 segundos

        setTimeout(() => {

            cerrarMensaje();

        }, 4000);

    </script>


</body>

</html>

<?php

$conn->close();

?>