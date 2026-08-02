<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact - AEM-BF</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
<body class="antialiased bg-slate-50 text-slate-900 font-sans watermark-bg">

    <!-- HEADER -->
    <header class="bg-white border-b border-emerald-800/25 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img class="h-14 w-auto" src="{{ asset('images/logo.jpg') }}" alt="Logo AEM-BF">
                    </a>
                </div>

                <nav class="hidden lg:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-sm font-medium text-slate-700 hover:text-emerald-800 transition">Accueil</a>
                    <a href="{{ route('amicale') }}" class="text-sm font-medium text-slate-700 hover:text-emerald-800 transition">L'Amicale</a>
                    <a href="{{ route('activites') }}" class="text-sm font-medium text-slate-700 hover:text-emerald-800 transition">Activités</a>
                    <a href="{{ route('universites') }}" class="text-sm font-medium text-slate-700 hover:text-emerald-800 transition">Universités Membres</a>
                    <a href="{{ route('contact') }}" class="text-sm font-medium text-slate-700 hover:text-emerald-800 transition">Contact</a>
                </nav>

                <div class="flex items-center space-x-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 border border-slate-300 rounded text-sm font-medium text-slate-700 hover:bg-slate-50 transition">Mon Espace</a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-slate-700 hover:text-emerald-800 transition">
                                Connexion
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-emerald-800 text-white rounded text-sm font-medium hover:bg-emerald-900 transition shadow-sm">
                                    Créer mon compte
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <div class="bg-slate-900 text-white py-16 border-b-4 border-amber-400">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <span class="text-xs font-semibold tracking-widest text-amber-400 uppercase mb-3 block">Nous Joindre</span>
            <h1 class="text-3xl md:text-4xl font-bold tracking-tight uppercase">Contactez l'AEM-BF</h1>
            <p class="text-slate-300 mt-3 text-sm md:text-base max-w-2xl mx-auto">
                Une question, une proposition de partenariat ou besoin d'informations sur nos activités ? Notre bureau exécutif est à votre écoute.
            </p>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- INFORMATIONS DE CONTACT (Colonne de gauche) -->
            <div class="lg:col-span-5 space-y-8">
                <div class="bg-white/95 backdrop-blur-sm p-8 rounded-xl shadow-md border-t-4 border-emerald-800">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Nos Coordonnées</h3>
                    
                    <div class="space-y-6">
                        <!-- Téléphones -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="w-6 h-6 text-emerald-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-bold text-slate-900">Appelez-nous</h4>
                                <p class="text-sm text-slate-600 mt-1">(+226) 60 42 05 89</p>
                                <p class="text-sm text-slate-600">(+226) 54 76 71 58</p>
                                <p class="text-sm text-slate-600">(+226) 66 14 75 79</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="w-6 h-6 text-emerald-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-bold text-slate-900">Email Officiel</h4>
                                <p class="text-sm text-slate-600 mt-1">aem.bf01@gmail.com</p>
                            </div>
                        </div>

                        <!-- Adresse / Légal -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="w-6 h-6 text-emerald-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-bold text-slate-900">Informations Légales</h4>
                                <p class="text-sm text-slate-600 mt-1">Association reconnue depuis 2022</p>
                                <p class="text-xs text-slate-500 mt-1">Récépissé N° : N000001420501</p>
                                <p class="text-xs text-slate-500">IFU : 00200067Y</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FORMULAIRE DE CONTACT (Colonne de droite) -->
            <div class="lg:col-span-7">
                <div class="bg-white/95 backdrop-blur-sm p-8 lg:p-10 rounded-xl shadow-md border border-slate-200">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Envoyez-nous un message</h3>
                    
                    <form action="#" method="POST" class="space-y-6">
                        <!-- Nom & Prénom -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Nom Complet / Organisation</label>
                            <input type="text" id="name" name="name" class="w-full border-slate-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500 text-sm py-2.5 px-3" placeholder="Votre nom ou le nom de votre structure" required>
                        </div>

                        <!-- Email & Téléphone -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Adresse Email</label>
                                <input type="email" id="email" name="email" class="w-full border-slate-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500 text-sm py-2.5 px-3" placeholder="vous@exemple.com" required>
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-slate-700 mb-1">Téléphone (Optionnel)</label>
                                <input type="tel" id="phone" name="phone" class="w-full border-slate-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500 text-sm py-2.5 px-3" placeholder="+226 XX XX XX XX">
                            </div>
                        </div>

                        <!-- Sujet -->
                        <div>
                            <label for="subject" class="block text-sm font-medium text-slate-700 mb-1">Sujet</label>
                            <select id="subject" name="subject" class="w-full border-slate-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500 text-sm py-2.5 px-3" required>
                                <option value="" disabled selected>Sélectionnez le motif de votre message</option>
                                <option value="partenariat">Proposition de partenariat / Sponsoring</option>
                                <option value="adhesion">Question sur l'adhésion d'un club</option>
                                <option value="activite">Information sur une activité / événement</option>
                                <option value="autre">Autre demande</option>
                            </select>
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-sm font-medium text-slate-700 mb-1">Votre Message</label>
                            <textarea id="message" name="message" rows="5" class="w-full border-slate-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500 text-sm py-2.5 px-3" placeholder="Écrivez votre message ici..." required></textarea>
                        </div>

                        <!-- Bouton Submit -->
                        <div>
                            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white bg-emerald-800 hover:bg-emerald-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-colors">
                                Envoyer le message
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-white py-12 border-t-4 border-amber-400">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-start space-y-8 md:space-y-0 text-sm">
            <div class="space-y-2">
                <img class="h-10 w-auto bg-white p-1 rounded mb-3" src="{{ asset('images/logo.jpg') }}" alt="Logo AEM-BF">
                <p class="text-slate-400 text-xs">Association reconnue officiellement depuis 2022.</p>
                <p class="text-slate-400 text-xs">Récépissé N° : N000001420501</p>
                <p class="text-slate-400 text-xs">IFU: 00200067Y</p>
            </div>
            
            <div>
                <h4 class="font-semibold mb-3 text-amber-400">Contact</h4>
                <p class="text-slate-300 text-xs mb-1">aem.bf01@gmail.com</p>
                <p class="text-slate-300 text-xs">(+226) 60 42 05 89 / 54 76 71 58 - 66 14 75 79</p>
            </div>

            <div>
                <h4 class="font-semibold mb-3 text-amber-400">Légal</h4>
                <p class="text-xs text-slate-500">
                    © 2026 AEM-BF. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>