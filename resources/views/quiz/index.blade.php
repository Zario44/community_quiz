<x-layouts.app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col items-center justify-center space-y-6">
                    <h1 class="text-3xl font-bold">Bienvenue au Quiz !</h1>
                    <p class="text-lg text-center max-w-xl">
                        Testez vos connaissances en répondant à une série de questions sélectionnées au hasard. 
                        Chaque bonne réponse vous rapproche de la victoire !
                    </p>
                    <a href="{{ route('quiz.play') }}" class="relative group inline-flex items-center justify-center px-10 py-5 font-black text-white transition-all duration-300 bg-gradient-to-r from-indigo-600 to-violet-600 rounded-2xl hover:scale-[1.02] hover:shadow-[0_20px_50px_rgba(79,_70,_229,_0.4)] active:scale-95 overflow-hidden">     
                        <div class="absolute inset-0 w-full h-full transition-all duration-300 scale-0 group-hover:scale-150 group-hover:bg-white/10 rounded-full"></div>
                        <span class="relative flex items-center text-xl text-black tracking-tight">
                            Commencer l'aventure
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>