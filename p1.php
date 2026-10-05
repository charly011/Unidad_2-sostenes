<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrar Evento | AgendaWeb</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@600;700&display=swap"
        rel="stylesheet"
    >

    <!-- CSS -->
    <link rel="stylesheet" href="css/p1.css">

</head>

<body>

    <!-- ENCABEZADO -->

    <header class="header">

        <div class="logo">
            Agenda<span>Web</span>
        </div>

        <a href="index.php" class="mi-agenda">
            ▣ Mi Agenda
        </a>

    </header>


    <!-- CONTENIDO -->

    <main>

        <section class="contenedor">

            <div class="encabezado">

                <h1>Registrar Nuevo Evento</h1>

                <p>
                    Agrega un nuevo evento a tu agenda.
                </p>

            </div>


            <!-- FORMULARIO -->

            <form
                action="guardar.php"
                method="POST"
                class="formulario"
            >

                <!-- TÍTULO -->

                <div class="campo">

                    <label for="titulo">
                        Título del evento
                    </label>

                    <input
                        type="text"
                        id="titulo"
                        name="titulo"
                        placeholder="Ej. Reunión de equipo"
                        maxlength="255"
                        required
                    >

                </div>


                <!-- FECHA Y HORA -->

                <div class="fila">

                    <div class="campo">

                        <label for="fecha">
                            Fecha
                        </label>

                        <input
                            type="date"
                            id="fecha"
                            name="fecha"
                            required
                        >

                    </div>


                    <div class="campo">

                        <label for="hora">
                            Hora
                        </label>

                        <input
                            type="time"
                            id="hora"
                            name="hora"
                            required
                        >

                    </div>

                </div>


                <!-- CATEGORÍA -->

                <div class="campo">

                    <label for="categoria">
                        Categoría
                    </label>

                    <select
                        id="categoria"
                        name="categoria"
                        required
                    >

                        <option value="">
                            Selecciona una categoría
                        </option>

                        <option value="personal">
                            Personal
                        </option>

                        <option value="escuela">
                            Escuela
                        </option>

                        <option value="trabajo">
                            Trabajo
                        </option>

                        <option value="reunion">
                            Reunión
                        </option>

                        <option value="otro">
                            Otro
                        </option>

                    </select>

                </div>


                <!-- DESCRIPCIÓN -->

                <div class="campo">

                    <label for="descripcion">
                        Descripción
                    </label>

                    <textarea
                        id="descripcion"
                        name="descripcion"
                        rows="5"
                        placeholder="Agrega una descripción del evento..."
                    ></textarea>

                </div>


                <!-- BOTONES -->

                <div class="acciones">

                    <button
                        type="reset"
                        class="btn-limpiar"
                    >
                        Limpiar
                    </button>


                    <button
                        type="submit"
                        class="btn-guardar"
                    >
                        ✓ &nbsp; Guardar Evento
                    </button>

                </div>

            </form>

        </section>

    </main>


    <!-- PIE DE PÁGINA -->

    <footer>

        © 2026 AgendaWeb · Organiza tu tiempo

    </footer>

</body>

</html>