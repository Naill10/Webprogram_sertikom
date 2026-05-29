@props(['recent' => []])

<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
    <div class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Pengaduan Terbaru</h3>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('tabel_admin') }}" class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">
                Lihat Semua
            </a>
        </div>
    </div>

    <div class="max-w-full overflow-x-auto custom-scrollbar">
        <table class="min-w-full">
            <thead>
                <tr class="border-t border-gray-100 dark:border-gray-800">
                    <th class="py-3 text-left"><p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">No</p></th>
                    <th class="py-3 text-left"><p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Foto</p></th>
                    <th class="py-3 text-left"><p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Judul Pengaduan</p></th>
                    <th class="py-3 text-left"><p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Pelapor</p></th>
                    <th class="py-3 text-left"><p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Lokasi</p></th>
                    <th class="py-3 text-left"><p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Tanggal</p></th>
                    <th class="py-3 text-left"><p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">Status</p></th>
                </tr>
            </thead>
            <tbody>
                @foreach($recent as $index => $com)
                <tr class="border-t border-gray-100 dark:border-gray-800">
                    <td class="py-3 text-gray-500 text-theme-sm dark:text-gray-400">{{ $index + 1 }}</td>
                    <td class="py-3">
                        @if($com->photo)
                            <img src="{{ asset('storage/' . $com->photo) }}" class="w-10 h-10 rounded-full object-cover">
                        @else
                            <div class="w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-700"></div>
                        @endif
                    </td>
                    <td class="py-3 whitespace-nowrap">
                        <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">{{ $com->title }}</p>
                        <span class="text-gray-500 text-theme-xs dark:text-gray-400">{{ Str::limit($com->description, 30) }}</span>
                    </td>
                    <td class="py-3 whitespace-nowrap">
                        <p class="text-gray-800 text-theme-sm dark:text-white/90">{{ $com->user->name ?? '-' }}</p>
                        <span class="text-gray-500 text-theme-xs dark:text-gray-400">{{ $com->user->email ?? '' }}</span>
                    </td>
                    <td class="py-3 text-gray-500 text-theme-sm dark:text-gray-400">{{ $com->location }}</td>
                    <td class="py-3 text-gray-500 text-theme-sm dark:text-gray-400">{{ $com->created_at->format('d M Y') }}</td>
                    <td class="py-3 whitespace-nowrap">
                        @php
                            $statusClass = match($com->status) {
                                'masuk'     => 'bg-warning-50 text-warning-600 dark:bg-warning-500/15 dark:text-orange-400',
                                'proses' => 'bg-blue-50 text-blue-600 dark:bg-blue-500/15 dark:text-blue-400',
                                'selesai'    => 'bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500',
                                'ditolak'    => 'bg-error-50 text-error-600 dark:bg-error-500/15 dark:text-error-500',
                                default       => 'bg-gray-50 text-gray-600',
                            };
                        @endphp
                        <span class="rounded-full px-2 py-0.5 text-theme-xs font-medium {{ $statusClass }}">
                            {{ ucfirst($com->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>