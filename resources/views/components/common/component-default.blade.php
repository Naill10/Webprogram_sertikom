@props([
    'title',
    'desc' => '',
])

<div {{ $attributes->merge(['class' => 'rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]']) }}>
    <!-- Card Header -->
    <div class="px-6 py-5 flex items-center justify-between sm:px-6 bg-green-100 dark:bg-green-900/20">
        <div class="flex items-center gap-3">
            {{-- Logo bulat biru --}}
            <div class="w-10 h-10 rounded-full bg-green-600 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
            {{-- Title + Desc --}}
            <div class="min-w-0 me-160">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    {{ $title }}
                </h3>
                @if($desc)
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        {{ $desc }}
                    </p>
                @endif
            </div>
       
               
           
        </div>
    </div>

    <!-- Card Body -->
    <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
        <div class="space-y-6">
            {{ $slot }}
        </div>
    </div>
</div>