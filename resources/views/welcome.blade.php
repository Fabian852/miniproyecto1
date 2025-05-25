<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bienvenido</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                body {
                    font-family: 'Instrument Sans', sans-serif;
                    background-color: #FDFDFC;
                    color: #1b1b18;
                }
                h2 {
                    font-size: 1.75rem;
                    font-weight: 600;
                    color: #333;
                }
                p {
                    font-size: 1rem;
                    line-height: 1.6;
                    color: #555;
                }
                section {
                    background: #fff;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    transition: transform 0.3s ease-in-out;
                }
                section:hover {
                    transform: translateY(-5px);
                }
            </style>
        @endif
    </head>
    <body class="flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Iniciar Sesión
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Registrarme
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main class="w-full lg:max-w-4xl max-w-[335px] text-center space-y-6">
            <section>
                <h2>¿Quiénes somos?</h2>
                <p>Somos una papelería dedicada a ofrecer artículos escolares, de oficina y arte con calidad y buen precio.</p>
            </section>

            <section>
                <h2>Ubicación</h2>
                <p>Estamos ubicados en el centro de la ciudad, cerca de escuelas y oficinas, para brindarte fácil acceso a todo lo que necesitas.</p>
            </section>

            <section>
                <h2>Misión</h2>
                <p>Nuestra misión es facilitar el acceso a materiales escolares y de oficina, promoviendo el aprendizaje, la creatividad y la productividad.</p>
            </section>

            <section>
                <h2>Visión</h2>
                <p>Aspiramos a ser la papelería de confianza de nuestra comunidad, destacando por nuestro servicio, variedad y compromiso con el cliente.</p>
            </section>
        </main>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
