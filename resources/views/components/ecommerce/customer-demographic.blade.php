@props(['com'])

<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] sm:p-6">
    <div class="flex items-center gap-3 mb-4">
        @if($com->photo)
            <img src="{{ asset('storage/' . $com->photo) }}" class="w-12 h-12 rounded-full object-cover flex-shrink-0">
        @else
            <div class="w-12 h-12 rounded-full bg-gray-200 dark:bg-gray-700 flex-shrink-0"></div>
        @endif
        <div>
            <h3 class="text-theme-sm font-semibold text-gray-800 dark:text-white/90">{{ $com->title }}</h3>
            <p class="text-theme-xs text-gray-500 dark:text-gray-400">{{ $com->user->name ?? '-' }} • {{ $com->location }}</p>
        </div>
    </div>

    <p class="text-theme-xs text-gray-500 dark:text-gray-400 mb-4">{{ Str::limit($com->description, 80) }}</p>

    <div class="flex items-center justify-between">
        <span class="text-theme-xs text-gray-400">{{ $com->created_at->format('d M Y') }}</span>
        @php
            $statusClass = match($com->status) {
                'pending'     => 'bg-warning-50 text-warning-600 dark:bg-warning-500/15 dark:text-orange-400',
                'in_progress' => 'bg-blue-50 text-blue-600 dark:bg-blue-500/15 dark:text-blue-400',
                'resolved'    => 'bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500',
                default       => 'bg-gray-50 text-gray-600',
            };
        @endphp
        <span class="rounded-full px-2 py-0.5 text-theme-xs font-medium {{ $statusClass }}">
            {{ ucfirst($com->status) }}
        </span>
    </div>
</div>