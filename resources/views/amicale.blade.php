<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bureau Exécutif et Commissions - AEM-BF</title>
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
            <span class="text-xs font-semibold tracking-widest text-amber-400 uppercase mb-3 block">Bureau AEM-BF 2026</span>
            <h1 class="text-3xl md:text-4xl font-bold tracking-tight uppercase">Bureau Exécutif & Commissions</h1>
            <p class="text-slate-300 mt-3 text-sm md:text-base max-w-2xl mx-auto">
                Direction exécutive, commissions spécialisées et ancrage institutionnel de l'AEM-BF.
            </p>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <!-- SECTION 1 : BUREAU EXÉCUTIF EN ACTIVITÉ (EN HAUT) -->
        <div class="mb-16">
            <div class="mb-8 border-l-4 border-emerald-800 pl-4">
                <span class="text-xs font-semibold text-emerald-800 uppercase tracking-wider block">Direction Nationale</span>
                <h3 class="text-xl font-bold text-slate-900 tracking-tight">Bureau Exécutif (2026)</h3>
            </div>

            <!-- Niveau 1 : Président (Gauche) & Vice-Président / Adjoint (Droite) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <!-- Président -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col sm:flex-row gap-6 items-center">
                    <div class="w-32 h-32 bg-slate-100 rounded-lg flex-shrink-0 border border-slate-200 flex items-center justify-center text-slate-400 text-xs text-center p-2">
                        [ Espace Photo ]
                    </div>
                    <div class="flex-1 text-center sm:text-left">
                        <span class="text-xs font-semibold text-emerald-800 uppercase tracking-wider block mb-1">1. Présidence</span>
                        <h4 class="text-lg font-bold text-slate-900 mb-1">Didier TAPSOBA</h4>
                        <p class="text-xs font-semibold text-slate-700 mb-2">Adjoint(e) : Eric MEDA</p>
                        <p class="text-xs text-slate-600">Leadership, capacité à prendre des décisions stratégiques, gestion d’équipe, bonne compréhension des enjeux du secteur minier.</p>
                    </div>
                </div>

                <!-- Vice-Président / Adjoint (ou support exécutif) -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col sm:flex-row gap-6 items-center">
                    <div class="w-32 h-32 bg-slate-100 rounded-lg flex-shrink-0 border border-slate-200 flex items-center justify-center text-slate-400 text-xs text-center p-2">
                        [ Espace Photo ]
                    </div>
                    <div class="flex-1 text-center sm:text-left">
                        <span class="text-xs font-semibold text-emerald-800 uppercase tracking-wider block mb-1">2. Vice-Présidence</span>
                        <h4 class="text-lg font-bold text-slate-900 mb-1">Eric MEDA</h4>
                        <p class="text-xs font-semibold text-slate-700 mb-2">Appui de la Présidence</p>
                        <p class="text-xs text-slate-600">Aptitude à assister le Président, leadership, gestion de projets, coordination des activités.</p>
                    </div>
                </div>
            </div>

            <!-- Niveau 2 : Secrétariat Général (Centré et large) -->
            <div class="max-w-3xl mx-auto mb-8">
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col sm:flex-row gap-6 items-center">
                    <div class="w-28 h-28 bg-slate-100 rounded-lg flex-shrink-0 border border-slate-200 flex items-center justify-center text-slate-400 text-xs text-center p-2">
                        [ Espace Photo ]
                    </div>
                    <div class="flex-1 text-center sm:text-left">
                        <span class="text-xs font-semibold text-emerald-800 uppercase tracking-wider block mb-1">3. Secrétariat Général(e)</span>
                        <h4 class="text-lg font-bold text-slate-900 mb-1">Rachidatou YARA</h4>
                        <p class="text-xs font-semibold text-slate-700 mb-2">Institution : CU DORI</p>
                        <p class="text-xs text-slate-600">Compétences organisationnelles, excellente capacité de rédaction, maîtrise des outils bureautiques, gestion documentaire.</p>
                    </div>
                </div>
            </div>

            <!-- Niveau 3 : Trésorerie (Gauche) & Commissaires aux comptes (Droite) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200">
                    <span class="text-xs font-semibold text-emerald-800 uppercase tracking-wider block mb-1">4. Trésorier(e)</span>
                    <h4 class="text-base font-bold text-slate-900 mb-1">Dima Floriane</h4>
                    <p class="text-xs font-semibold text-slate-700 mb-2">Institution : IST</p>
                    <p class="text-xs text-slate-600">Compétences en gestion financière, transparence, maîtrise des outils comptables, rigueur dans la gestion des ressources.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200">
                    <span class="text-xs font-semibold text-emerald-800 uppercase tracking-wider block mb-1">5. Commissaires aux comptes</span>
                    <h4 class="text-base font-bold text-slate-900 mb-1">ESMI & CU KAYA</h4>
                    <p class="text-xs font-semibold text-slate-700 mb-2">Contrôle Interne</p>
                    <p class="text-xs text-slate-600">Suivi-évaluation et régularité financière des comptes de l'amicale.</p>
                </div>
            </div>
        </div>

        <!-- SECTION 2 : COMMISSIONS SPÉCIALISÉES (Exactes) -->
        <div class="mb-16">
            <div class="mb-8 border-l-4 border-amber-500 pl-4">
                <span class="text-xs font-semibold text-amber-600 uppercase tracking-wider block">Commissions Thématiques</span>
                <h3 class="text-xl font-bold text-slate-900 tracking-tight">Commissions Spécialisées (2026)</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Commission 6 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-2">Commission 06</span>
                        <h4 class="font-bold text-slate-900 text-sm mb-2">Commission Logistique, Organisation d’Événements et de l’Amélioration Continue</h4>
                        <p class="text-xs text-slate-700 font-medium">EPO (Arouna SAWADOGO) • Club chimiste</p>
                    </div>
                </div>

                <!-- Commission 7 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-2">Commission 07</span>
                        <h4 class="font-bold text-slate-900 text-sm mb-2">Commission Communication, de l'Information et des Relations Publiques</h4>
                        <p class="text-xs text-slate-700 font-medium">BAMA Maxime • IST • ISTAPEM • AUBE NOUVELLE BOBO • ESUP-J</p>
                    </div>
                </div>

                <!-- Commission 8 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-2">Commission 08</span>
                        <h4 class="font-bold text-slate-900 text-sm mb-2">Commission des Relations Extérieures, de la Coopération et de l’Insertion Professionnelle</h4>
                        <p class="text-xs text-slate-700 font-medium">U AUBEN OUAGA • ISTAPEM</p>
                    </div>
                </div>

                <!-- Commission 9 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-2">Commission 09</span>
                        <h4 class="font-bold text-slate-900 text-sm mb-2">Commission de la Formation, de l’Excellence et de la Recherche et Innovation</h4>
                        <p class="text-xs text-slate-700 font-medium">ZOMBRE Sahabou • INGRIDD</p>
                    </div>
                </div>

                <!-- Commission 10 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-2">Commission 10</span>
                        <h4 class="font-bold text-slate-900 text-sm mb-2">Commission Genre et Inclusion</h4>
                        <p class="text-xs text-slate-700 font-medium">ITTGO (LATIFA TENDE) • 2IE</p>
                    </div>
                </div>

                <!-- Commission 11 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-2">Commission 11</span>
                        <h4 class="font-bold text-slate-900 text-sm mb-2">Commission Environnement et Développement Durable</h4>
                        <p class="text-xs text-slate-700 font-medium">IGEED • INGRIDD</p>
                    </div>
                </div>

                <!-- Commission 12 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-2">Commission 12</span>
                        <h4 class="font-bold text-slate-900 text-sm mb-2">Commission de la Promotion des Exploitations Minières Artisanales et des Carrières (CPEMAC)</h4>
                        <p class="text-xs text-slate-700 font-medium">ABIBA SAWADOGO • IGEDD</p>
                    </div>
                </div>

                <!-- Commission 13 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col justify-between md:col-span-2 lg:col-span-1">
                    <div>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-2">Commission 13</span>
                        <h4 class="font-bold text-slate-900 text-sm mb-2">Commission Mobilisation et Affiliation des Clubs Membres, et des Affaires Sociales</h4>
                        <p class="text-xs text-slate-700 font-medium">Danioka Guedjouma • UI2M</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 3 : HISTORIQUE ET ANCIENS PRÉSIDENTS (EN BAS) -->
        <div class="pt-12 border-t border-slate-200">
            <div class="mb-8 border-l-4 border-slate-800 pl-4">
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Héritage Institutionnel</span>
                <h3 class="text-xl font-bold text-slate-900 tracking-tight">Histoire de Création et Anciens Présidents</h3>
            </div>

            <!-- Histoire -->
            <div class="bg-white p-8 rounded-xl shadow-md border border-slate-200 mb-8">
                <h4 class="text-base font-bold text-slate-900 mb-3">Histoire de Création de l'AEM-BF</h4>
                <p class="text-sm text-slate-700 leading-relaxed mb-3">
                    Née de la volonté commune des étudiants des différentes filières minières du Burkina Faso de se regrouper au sein d'une structure solide, l'Amicale des Étudiants Miniers du Burkina Faso (AEM-BF) a vu le jour pour répondre aux défis d'insertion, de formation pratique et de solidarité sectorielle.
                </p>
                <p class="text-sm text-slate-700 leading-relaxed">
                    Officiellement reconnue en 2022 (Récépissé N° : N000001420501 / IFU : 00200067Y), l'amicale s'est imposée comme la plus grande communauté estudiantine du secteur extractif au Burkina Faso.
                </p>
            </div>

            <!-- Anciens Présidents -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col sm:flex-row gap-6 items-center">
                    <div class="w-24 h-24 bg-slate-100 rounded-lg flex-shrink-0 border border-slate-200 flex items-center justify-center text-slate-400 text-xs text-center p-2">
                        [ Espace Photo ]
                    </div>
                    <div class="flex-1 text-center sm:text-left">
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-1">Ancien Président</span>
                        <h4 class="text-base font-bold text-slate-900 mb-1">Nom du 1er Ex-Président</h4>
                        <p class="text-xs text-slate-600">Mandat : 2022 - 2024</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 flex flex-col sm:flex-row gap-6 items-center">
                    <div class="w-24 h-24 bg-slate-100 rounded-lg flex-shrink-0 border border-slate-200 flex items-center justify-center text-slate-400 text-xs text-center p-2">
                        [ Espace Photo ]
                    </div>
                    <div class="flex-1 text-center sm:text-left">
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-1">Ancien Président</span>
                        <h4 class="text-base font-bold text-slate-900 mb-1">Nom du 2e Ex-Président</h4>
                        <p class="text-xs text-slate-600">Mandat : 2024 - 2025</p>
                    </div>
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