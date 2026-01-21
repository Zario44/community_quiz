<div class="max-w-5xl mx-auto px-4 py-8">
    
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
            Liste des Questions
        </h1>
        <p class="text-gray-500 mt-2">{{ request()->routeIs('user.questions') ? 'Consulté toutes les questions que vous avez créées' :'' }}</p>
    </div>

    <div class="space-y-6">
        @foreach($questions as $question)
            <x-item-question 
                :question="$question" 
                :userName="$question->user->name"
                :iteration="($questions->currentPage() - 1) * $questions->perPage() + $loop->iteration"
            />
        @endforeach
    </div>

    <div class="mt-8 flex justify-center">
        {{ $questions->links() }}
    </div>
</div>