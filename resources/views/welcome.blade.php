<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AEM-BF - Amicale des Étudiants Miniers du Burkina Faso</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="antialiased bg-slate-50 text-slate-900 font-sans">

    <!-- HEADER -->
    <header class="bg-white border-b border-emerald-800/20 sticky top-0 z-50 shadow-sm">
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

    <!-- CAROUSEL -->
    <div 
        class="w-full h-[500px] relative overflow-hidden bg-slate-900"
        x-data="{ 
            activeSlide: 1, 
            totalSlides: 3,
            init() {
                setInterval(() => {
                    this.activeSlide = this.activeSlide === this.totalSlides ? 1 : this.activeSlide + 1;
                }, 10000);
            }
        }"
    >
        <!-- Slide 1 -->
        <div x-show="activeSlide === 1" x-transition.opacity.duration.700ms class="absolute inset-0">
            <img src="{{ asset('images/carousel-1.jpg') }}" class="object-cover w-full h-full opacity-40">
            <div class="absolute inset-0 bg-slate-950/60"></div>
            <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-6 max-w-4xl mx-auto">
                <span class="text-xs font-bold tracking-widest text-amber-400 uppercase mb-3">Amicale des Étudiants Miniers du Burkina Faso</span>
                <h1 class="text-3xl md:text-5xl font-bold text-white tracking-tight uppercase">Former, Unir et Inspirer la nouvelle génération des professionnels des mines.</h1>
                <p class="text-slate-200 mt-4 text-base max-w-2xl">La plus grande communauté estudiantine du secteur minier au Burkina Faso. Plus de 1 000 membres actifs.</p>
                <div class="mt-8">
                    <a href="{{ route('register') }}" class="px-6 py-3 bg-amber-500 text-slate-950 font-semibold rounded hover:bg-amber-400 transition text-sm shadow">Rejoindre l'AEM-BF</a>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div x-show="activeSlide === 2" x-transition.opacity.duration.700ms class="absolute inset-0">
            <img src="{{ asset('images/carousel-2.jpg') }}" class="object-cover w-full h-full opacity-40">
            <div class="absolute inset-0 bg-slate-950/60"></div>
            <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-6 max-w-4xl mx-auto">
                <span class="text-xs font-bold tracking-widest text-amber-400 uppercase mb-3">Formation & Compétences</span>
                <h1 class="text-3xl md:text-5xl font-bold text-white tracking-tight uppercase">Renforcement des compétences techniques et personnelles.</h1>
                <p class="text-slate-200 mt-4 text-base max-w-2xl">Accédez à des formations pratiques, des panels et des séminaires adaptés aux exigences du secteur minier moderne.</p>
                <div class="mt-8">
                    <a href="{{ route('register') }}" class="px-6 py-3 bg-amber-500 text-slate-950 font-semibold rounded hover:bg-amber-400 transition text-sm shadow">Découvrir nos formations</a>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div x-show="activeSlide === 3" x-transition.opacity.duration.700ms class="absolute inset-0">
            <img src="{{ asset('images/carousel-3.jpg') }}" class="object-cover w-full h-full opacity-40">
            <div class="absolute inset-0 bg-slate-950/60"></div>
            <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-6 max-w-4xl mx-auto">
                <span class="text-xs font-bold tracking-widest text-amber-400 uppercase mb-3">Réseau & Insertion Professionnelle</span>
                <h1 class="text-3xl md:text-5xl font-bold text-white tracking-tight uppercase">Construisez votre réseau avec les leaders de l'industrie.</h1>
                <p class="text-slate-200 mt-4 text-base max-w-2xl">Profitez de visites de sites miniers, de mentorat stratégique et de partenariats durables pour votre carrière.</p>
                <div class="mt-8">
                    <a href="{{ route('register') }}" class="px-6 py-3 bg-amber-500 text-slate-950 font-semibold rounded hover:bg-amber-400 transition text-sm shadow">En savoir plus</a>
                </div>
            </div>
        </div>

        <!-- Contrôles du caroussel -->
        <button @click="activeSlide = activeSlide === 1 ? totalSlides : activeSlide - 1" class="absolute left-6 top-1/2 -translate-y-1/2 text-white/70 hover:text-white p-2 transition">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7"></path></svg>
        </button>
        <button @click="activeSlide = activeSlide === totalSlides ? 1 : activeSlide + 1" class="absolute right-6 top-1/2 -translate-y-1/2 text-white/70 hover:text-white p-2 transition">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"></path></svg>
        </button>

        <!-- Indicateurs -->
        <div class="absolute bottom-6 left-0 right-0 flex justify-center space-x-2">
            <button @click="activeSlide = 1" :class="{ 'bg-amber-400 w-6': activeSlide === 1, 'bg-white/40 w-2': activeSlide !== 1 }" class="h-2 rounded-full transition-all duration-300"></button>
            <button @click="activeSlide = 2" :class="{ 'bg-amber-400 w-6': activeSlide === 2, 'bg-white/40 w-2': activeSlide !== 2 }" class="h-2 rounded-full transition-all duration-300"></button>
            <button @click="activeSlide = 3" :class="{ 'bg-amber-400 w-6': activeSlide === 3, 'bg-white/40 w-2': activeSlide !== 3 }" class="h-2 rounded-full transition-all duration-300"></button>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Colonne 1 : Activités -->
            <div class="bg-white rounded-xl shadow-sm border-t-4 border-red-600 p-8 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
                        <h3 class="text-lg font-bold text-slate-900 tracking-tight">Nos Principales Activités</h3>
                    </div>
                    <ul class="space-y-4 text-sm text-slate-700">
                        <li class="flex items-start">
                            <span class="inline-block w-1.5 h-1.5 bg-red-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>Conférences et panels</span>
                        </li>
                        <li class="flex items-start">
                            <span class="inline-block w-1.5 h-1.5 bg-red-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>Débats universitaires</span>
                        </li>
                        <li class="flex items-start">
                            <span class="inline-block w-1.5 h-1.5 bg-red-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>Formations techniques et professionnelles</span>
                        </li>
                        <li class="flex items-start">
                            <span class="inline-block w-1.5 h-1.5 bg-red-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>Visites de sites miniers</span>
                        </li>
                        <li class="flex items-start">
                            <span class="inline-block w-1.5 h-1.5 bg-red-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>Camp Vacances & Journées d'intégration</span>
                        </li>
                        <li class="flex items-start">
                            <span class="inline-block w-1.5 h-1.5 bg-red-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>Participation aux forums et salons</span>
                        </li>
                    </ul>
                </div>
                <div class="mt-8 pt-4 border-t border-slate-50">
                    <a href="{{ route('register') }}" class="text-xs font-bold text-red-600 hover:underline uppercase tracking-wider">Découvrir le programme →</a>
                </div>
            </div>

            <!-- Colonne 2 : Pourquoi nous rejoindre -->
            <div class="bg-emerald-800 text-white rounded-xl shadow-md border-t-4 border-amber-400 p-8 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-emerald-700">
                        <h3 class="text-lg font-bold tracking-tight text-white">Pourquoi nous rejoindre ?</h3>
                    </div>
                    <ul class="space-y-4 text-sm text-emerald-50">
                        <li class="flex items-start">
                            <span class="inline-block w-1.5 h-1.5 bg-amber-400 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>Développer vos compétences techniques et personnelles</span>
                        </li>
                        <li class="flex items-start">
                            <span class="inline-block w-1.5 h-1.5 bg-amber-400 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>Construire un solide réseau professionnel durable</span>
                        </li>
                        <li class="flex items-start">
                            <span class="inline-block w-1.5 h-1.5 bg-amber-400 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>Participer à des formations pratiques et mentorats</span>
                        </li>
                        <li class="flex items-start">
                            <span class="inline-block w-1.5 h-1.5 bg-amber-400 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>Rencontrer des experts et acteurs du secteur minier</span>
                        </li>
                        <li class="flex items-start">
                            <span class="inline-block w-1.5 h-1.5 bg-amber-400 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                            <span>Valoriser votre parcours académique</span>
                        </li>
                    </ul>
                </div>
                <div class="mt-8 pt-4 border-t border-emerald-700">
                    <a href="{{ route('register') }}" class="text-xs font-bold text-amber-300 hover:underline uppercase tracking-wider">Adhérer à l'Amicale →</a>
                </div>
            </div>

            <!-- Colonne 3 : Nos Valeurs -->
            <div class="bg-white rounded-xl shadow-sm border-t-4 border-amber-400 p-8 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
                        <h3 class="text-lg font-bold text-slate-900 tracking-tight">Nos Valeurs</h3>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1.5 bg-slate-100 text-slate-800 text-xs font-semibold rounded-md">Excellence</span>
                        <span class="px-3 py-1.5 bg-slate-100 text-slate-800 text-xs font-semibold rounded-md">Intégrité</span>
                        <span class="px-3 py-1.5 bg-slate-100 text-slate-800 text-xs font-semibold rounded-md">Solidarité</span>
                        <span class="px-3 py-1.5 bg-slate-100 text-slate-800 text-xs font-semibold rounded-md">Innovation</span>
                        <span class="px-3 py-1.5 bg-slate-100 text-slate-800 text-xs font-semibold rounded-md">Professionnalisme</span>
                        <span class="px-3 py-1.5 bg-slate-100 text-slate-800 text-xs font-semibold rounded-md">Engagement</span>
                    </div>
                </div>
                <div class="bg-amber-50 p-4 rounded-lg border border-amber-200 mt-4">
                    <p class="text-xs text-amber-900 italic text-center font-medium leading-relaxed">
                        "Ensemble pour une jeunesse minière formée, responsable et engagée."
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- NOUVELLE SECTION : ACTUALITÉS & ANNONCES -->
    <div class="bg-white py-16 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Actualités & Annonces</h2>
                <p class="mt-4 text-slate-600">Restez informés des dernières nouveautés de l'Amicale.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if(isset($posts) && $posts->count() > 0)
                    @foreach($posts as $post)
                        <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition">
                            
                            <!-- Image -->
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-slate-100 flex items-center justify-center text-slate-400 text-sm font-medium">Pas d'image illustrative</div>
                            @endif
                            
                            <!-- Contenu de l'actualité -->
                            <div class="p-6">
                                <p class="text-xs font-semibold text-emerald-700 mb-2">{{ $post->created_at->format('d/m/Y') }}</p>
                                <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $post->title }}</h3>
                                
                                @if($post->content)
                                    <p class="text-sm text-slate-600 mb-4">{{ Str::limit($post->content, 120) }}</p>
                                @endif
                                
                                <!-- Bouton PDF -->
                                @if($post->document)
                                    <a href="{{ asset('storage/' . $post->document) }}" target="_blank" class="inline-flex items-center text-sm font-medium text-red-600 hover:text-red-700 mt-2">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        Télécharger le fichier joint
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- S'il n'y a aucune actualité -->
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12 bg-slate-50 rounded-xl border border-slate-200 border-dashed">
                        <p class="text-slate-500 font-medium">Aucune actualité publiée pour le moment.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- SECTION OFFICIELLE -->
    <div class="border-t border-slate-200 py-12 bg-slate-50">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h3 class="text-sm font-bold uppercase tracking-wider text-emerald-800 mb-3">Notre Réseau National</h3>
            <p class="text-base text-slate-700 font-medium leading-relaxed">
                Plus de 19 clubs universitaires membres de l'Amicale des Étudiants Miniers de l'AEM-BF, dynamisés à travers un bureau national constitué de 21 commissions.
            </p>
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