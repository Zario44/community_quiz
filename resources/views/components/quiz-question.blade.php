@props(['question', 'iteration', 'total'])

<div class="w-full">
    
    <div class="mb-8">
        <div class="flex justify-between items-center mb-2 px-1">
            <span class="text-xs font-bold text-indigo-600 uppercase tracking-wider">Question {{ $iteration }}/{{ $total }}</span>
        </div>
        <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
            <div class="bg-indigo-600 h-full transition-all duration-500 ease-out" 
                 style="width: {{ ($iteration / $total) * 100 }}%">
            </div>
        </div>
    </div>

    <div class="text-center mb-10">
        <h2 class="text-2xl md:text-4xl font-black text-gray-800 leading-tight">
            {{ $question->question_text }}
        </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
        @foreach($question->answers as $index => $answer)
            @php
                $letters = ['A', 'B', 'C', 'D'];
                $styles = [
                    0 => 'hover:border-blue-500 hover:bg-blue-50',
                    1 => 'hover:border-green-500 hover:bg-green-50',
                    2 => 'hover:border-orange-500 hover:bg-orange-50',
                    3 => 'hover:border-purple-500 hover:bg-purple-50',
                ];
            @endphp
            
            <button 
                wire:click="selectAnswer({{ $answer->id }})"
                class="group relative flex items-center p-6 bg-white border-2 border-gray-100 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-200 active:scale-[0.98] {{ $styles[$index] ?? '' }}"
            >
                <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-gray-100 text-gray-600 font-black text-xl rounded-xl mr-5 group-hover:bg-white group-hover:shadow-sm transition-colors">
                    {{ $letters[$index] }}
                </div>

                <span class="text-lg md:text-xl font-bold text-gray-700 text-left leading-snug group-hover:text-gray-900">
                    {{ $answer->answer_text }}
                </span>
            </button>
        @endforeach
    </div>

    <div class="mt-8 flex justify-end">
        <button 
            wire:click="ticketQuestion" 
            class="flex items-center gap-2 text-xs font-medium text-gray-400 hover:text-red-500 transition-colors duration-200 group">
            Signaler une erreur
        </button>
    </div>

</div>