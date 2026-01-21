@props(['question','userName', 'iteration'])

<div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden transition hover:shadow-md">
    <div class="p-6">
        <div class="flex justify-between items-start mb-4">
            <div class="flex items-center space-x-3">
                <span class="bg-indigo-100 text-indigo-700 text-xs font-bold px-2.5 py-1 rounded-full">
                    #{{ $iteration }}
                </span>
                <span class="text-sm text-black-500 font-medium">
                    Question proposée par {{ $userName }}
                </span>
            </div>
            
            <div class="flex space-x-2">
                @if(request()->routeIs('user.questions'))
                    <a href="{{ route('questions-form', ['id' => $question->id]) }}" 
                    title="Modifier" 
                    class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition border border-transparent hover:border-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                @endif
                
                <button 
                    wire:click="deleteQuestion({{ $question->id }})" 
                    wire:confirm="Êtes-vous vraiment sûr de vouloir supprimer cette question ?"
                    title="Supprimer" 
                    class="cursor-pointer p-2 text-red-600 hover:bg-red-50 rounded-lg transition border border-transparent hover:border-red-100"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        </div>

        <p class="text-xl font-semibold text-gray-800 mb-6">
            {{ $question->question_text }}
        </p>
        <span class="text-xs text-gray-400 font-medium italic">
            {{ $question->tag ?? 'Général' }}
        </span>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            @foreach($question->answers as $answer)
                <div class="flex items-center p-3 rounded-xl border {{ $answer->is_correct ? 'bg-emerald-50 border-emerald-200 text-emerald-800 font-bold' : 'bg-gray-50 border-gray-100 text-gray-600' }}">
                    @if($answer->is_correct)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-emerald-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    @else
                        <div class="w-5 h-5 mr-3 rounded-full border-2 border-gray-200"></div>
                    @endif
                    <span class="text-sm">{{ $answer->answer_text }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>