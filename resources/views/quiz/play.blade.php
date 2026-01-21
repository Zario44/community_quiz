<div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center p-4">
    <div class="w-full max-w-4xl">
        
        @if(isset($questions[$currentIndex]))
            <x-quiz-question 
                :question="$questions[$currentIndex]" 
                :iteration="$currentIndex + 1" 
                :total="count($questions)" 
            />
        @else
            {{-- Écran de fin --}}
            <div class="bg-white p-8 rounded-2xl shadow-xl text-center">
                <h2 class="text-2xl font-bold mb-2">Quiz terminé !</h2>
                <p class="text-gray-600 mb-6">Score : {{ $finalScore }} / {{ count($questions) }}</p>
                <a href="{{ route('quiz') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-bold">Retour</a>
            </div>
        @endif

    </div>
</div>