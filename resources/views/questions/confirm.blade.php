<x-layouts.app>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow rounded-lg">
        <h1 class="text-2xl font-bold text-green-600 mb-4">Question enregistrée !</h1>
        
        <x-item-question 
            :question="$question" 
            :userName="auth()->user()->name"
            :iteration="$question->id"
        />

        <a href="{{ route('questions-form') }}" class="mt-8 inline-block bg-indigo-600 px-6 py-2 rounded-lg">
            Créer une autre question
        </a>
    </div>
</x-layouts.app>