<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Connexion / Inscription - AEM-BF</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            .watermark-bg {
                background-image: linear-gradient(to bottom, rgba(248, 250, 252, 0.94), rgba(248, 250, 252, 0.94)), url('{{ asset('images/logo.jpg') }}');
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                background-size: 35% auto;
            }
        </style>
    </head>
    <body class="font-sans text-slate-900 antialiased watermark-bg">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <!-- Logo cliquable retour à l'accueil -->
            <div>
                <a href="/">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo AEM-BF" class="h-24 w-auto rounded bg-white p-2 shadow-sm border border-slate-200">
                </a>
            </div>

            <!-- Carte de connexion/inscription -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white/95 backdrop-blur-sm shadow-md overflow-hidden sm:rounded-xl border-t-4 border-emerald-800">
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-center text-xs text-slate-500">
                &copy; 2026 AEM-BF. Tous droits réservés.
            </div>
        </div>
    </body>
</html>