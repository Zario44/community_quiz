<x-layouts.app>
    <div class="flex items-center justify-center min-h-[60vh]">
        <div class="max-w-md w-full bg-white shadow-lg rounded-2xl p-8 text-center border-t-4 border-red-500">
            <div class="mb-4 inline-flex items-center justify-center w-16 h-16 bg-red-100 text-red-500 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>

            <h1 class="text-2xl font-bold text-gray-800 mb-2">Oups !</h1>
            <p class="text-gray-600 mb-6">
                {{ $message ?? "Désolé, nous ne parvenons pas à trouver cette question." }}
            </p>

            <div class="flex flex-col space-y-3">
                <a href="{{ route('questions-form') }}" 
                   class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition duration-200">
                    Créer une nouvelle question
                </a>
                
                <a href="/" class="text-sm text-gray-500 hover:text-indigo-600 underline">
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>