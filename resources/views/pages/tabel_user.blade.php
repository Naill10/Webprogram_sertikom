@extends('layouts.app')

@section('content')
    <x-common.component-table-user title="Tabel Pengaduan"
    desc="Daftar semua pengaduan masyarakat">
      
            <div x-data="{
    orders: [
        {
            id: 1,
            user: {
                image: './images/user/user-17.jpg',
                name: 'Lindsey Curtis',
                role: 'Web Designer',
            },
            projectName: 'Agency Website',
            team: {
                images: [
                    './images/user/user-22.jpg',
                    './images/user/user-23.jpg',
                    './images/user/user-24.jpg',
                ],
            },
            budget: '3.9K',
            status: 'Active',
        },
        {
            id: 2,
            user: {
                image: './images/user/user-18.jpg',
                name: 'Kaiya George',
                role: 'Project Manager',
            },
            projectName: 'Technology',
            team: {
                images: [
                    './images/user/user-25.jpg',
                    './images/user/user-26.jpg',
                ],
            },
            budget: '24.9K',
            status: 'Pending',
        },
        {
            id: 3,
            user: {
                image: './images/user/user-19.jpg',
                name: 'Zain Geidt',
                role: 'Content Writer',
            },
            projectName: 'Blog Writing',
            team: {
                images: [
                    './images/user/user-27.jpg',
                ],
            },
            budget: '12.7K',
            status: 'Active',
        },
        {
            id: 4,
            user: {
                image: './images/user/user-20.jpg',
                name: 'Abram Schleifer',
                role: 'Digital Marketer',
            },
            projectName: 'Social Media',
            team: {
                images: [
                    './images/user/user-28.jpg',
                    './images/user/user-29.jpg',
                    './images/user/user-30.jpg',
                ],
            },
            budget: '2.8K',
            status: 'Cancel',
        },
        {
            id: 5,
            user: {
                image: './images/user/user-21.jpg',
                name: 'Carla George',
                role: 'Front-end Developer',
            },
            projectName: 'Website',
            team: {
                images: [
                    './images/user/user-31.jpg',
                    './images/user/user-32.jpg',
                    './images/user/user-33.jpg',
                ],
            },
            budget: '4.5K',
            status: 'Active',
        },
    ],
    getStatusClass(status) {
        const classes = {
            'Active': 'bg-green-50 text-green-700 dark:bg-green-500/15 dark:text-green-500',
            'Pending': 'bg-yellow-50 text-yellow-700 dark:bg-yellow-500/15 dark:text-yellow-400',
            'Cancel': 'bg-red-50 text-red-700 dark:bg-red-500/15 dark:text-red-500',
        };
        return classes[status] || '';
    }
}">
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="max-w-full overflow-x-auto custom-scrollbar">
            <table class="w-full min-w-[1102px]">
                <thead>
                    <tr class="border-b border-gray-100 dark:border-gray-800">
                        <th class="px-5 py-3 text-left sm:px-6">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                No
                            </p>
                        </th>
                        <th class="px-5 py-3 text-left sm:px-6">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Foto Pengaduan
                            </p>
                        </th>
                        <th class="px-5 py-3 text-left sm:px-6">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Judul Pengaduan
                            </p>
                        </th>
                        <th class="px-5 py-3 text-left sm:px-6">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Pelapor
                            </p>
                        </th>
                        <th class="px-5 py-3 text-left sm:px-6">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Lokasi
                            </p>
                        </th>
                        <th class="px-5 py-3 text-left sm:px-6">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                tanggal Pengaduan
                            </p>
                        </th>
                         <th class="px-5 py-3 text-left sm:px-6">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Status  
                            </p>
                        </th>
                            <th class="px-5 py-3 text-left sm:px-6">
                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                    Aksi  
                                </p>
                            </th>
                    </tr>
                </thead>
             <tbody>
    @foreach ($tabel_user as $com)
        <tr class="border-b border-gray-100 dark:border-gray-800">
            
            
            <td class="px-5 py-4 sm:px-6">
                <div class="flex items-center gap-3">
                    <div class="w-5 h-5 overflow-hidden rounded-full bg-gray-200 flex items-center justify-center">
                     {{ $loop->iteration }}
                    </div>
                  
                </div>
        </td>

        <td class="px-5 py-4 sm:px-6">
    @if($com->photo)
        <img 
            src="{{ asset('storage/' . $com->photo) }}" 
            alt="foto"
            onclick="zoomFoto(this.src)"
            class="w-10 h-10 rounded-full object-cover cursor-pointer hover:opacity-80 transition">
    @else
        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
            <span class="text-gray-500 text-xs font-bold">
                {{ strtoupper(substr($com->title, 0, 1)) }}
            </span>
        </div>
    @endif
</td>
   
            <td class="px-5 py-4 sm:px-6">
                <p class="text-gray-700 font-bold text-theme-sm dark:text-white/90">{{ $com->title }}</p>
                <p class="text-gray-500 text-theme-xs dark:text-gray-400">{{ Str::limit($com->description, 10) }}</p>
            </td>


              <td class="px-5 py-4 sm:px-6">
                <p class="text-gray-700 font-bold text-theme-sm dark:text-white/90">{{ $com->user->name ?? '-' }}</p>
                <p class="text-gray-400 text-theme-xs dark:text-gray-500">{{ $com->user->email ?? '-' }}</p>
            </td>
            

            <td class="px-5 py-4 sm:px-6">
                <p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ $com->location }}</p>
            </td>
           
            <td class="px-5 py-4 sm:px-6">
                <p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ $com->created_at->format('d M Y') }}</p>
            </td>

  
            <td class="px-5 py-4 sm:px-6">
                @php
                    $statusClass = match($com->status) {
                        'pending'   => 'bg-yellow-50 text-yellow-700 dark:bg-yellow-500/15 dark:text-yellow-400',
                        'in_progress'  => 'bg-blue-50 text-blue-700 dark:bg-blue-500/15 dark:text-blue-400',
                        'resolved'   => 'bg-green-50 text-green-700 dark:bg-green-500/15 dark:text-green-500',
                    };
                @endphp
                <span class="text-theme-xs inline-block rounded-full px-2 py-0.5 font-medium {{ $statusClass }}">
                    {{ ucfirst($com->status) }}
                </span>
            </td>


            <td class="px-5 py-4 sm:px-6">
                <div class="flex items-center gap-2">
                    <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1.5 rounded-md">Respon</a>
                    <a href="#" class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1.5 rounded-md">Delete</a>
                </div>
            </td>

        </tr>
    @endforeach
</tbody>
            </table>
        </div>
    </div>
</div>
        </x-common.component-card>
        {{-- Modal Zoom Foto --}}
<div id="modalFoto" onclick="tutupModal()" 
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
    <img id="modalGambar" src="" alt="zoom" class="max-w-lg max-h-[100vh] rounded-xl shadow-2xl">
</div>

<script>
    function zoomFoto(src) {
        document.getElementById('modalGambar').src = src;
        document.getElementById('modalFoto').classList.remove('hidden');
        document.getElementById('modalFoto').classList.add('flex');}
    function tutupModal() {
        document.getElementById('modalFoto').classList.add('hidden');
        document.getElementById('modalFoto').classList.remove('flex');
    }
</script>
@endsection