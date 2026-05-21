@extends('layouts.app')


@section('content')
    <x-common.component-card title="Tabel Admin"
    desc="Daftar semua Admin">
      
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
                                name
                            </p>
                        </th>
                        <th class="px-5 py-3 text-left sm:px-6">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                               email
                            </p>
                        </th>
                        <th class="px-5 py-3 text-left sm:px-6">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                               Role
                            </p>
                        </th>
                        <th class="px-5 py-3 text-left sm:px-6">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                            Actions
                            </p>
                        </th>
                    </tr>
                </thead>
             <tbody>
    @foreach ($admins as $com)
        <tr class="border-b border-gray-100 dark:border-gray-800">
            
            
            <td class="px-5 py-4 sm:px-6">
                <div class="flex items-center gap-3">
                    <div class="w-5 h-5 overflow-hidden rounded-full bg-gray-200 flex items-center justify-center">
                     {{ $loop->iteration }}
                    </div>
                  
                </div>
        </td>

                <td class="px-5 py-4 sm:px-6">
                    <p class="text-gray-700 font-bold text-theme-sm dark:text-white/90">{{ $com->name }}</p>
                </td>
   
            <td class="px-5 py-4 sm:px-6">
                <p class="text-gray-700 font-bold text-theme-sm dark:text-white/90">{{ $com->email }}</p>
             
            </td>


          

            <td class="px-5 py-4 sm:px-6">
                <p class="text-gray-500 text-theme-sm dark:text-gray-400">{{ $com->role }}</p>
            </td>
           
        

  


            <td class="px-5 py-4 sm:px-6">
                <div class="flex items-center gap-2">
                    <a href="{{ route('edit_admin', $com->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1.5 rounded-md">Edit</a>
                     <form action="{{ route('tabel_admin.destroy', $com->id) }}" method="POST"
    id="delete-form-{{ $com->id }}">
    @csrf
    @method('DELETE')
    <button type="button"
   onclick="confirmDelete({{ $com->id }}, {{ $com->id === auth()->id() ? 'true' : 'false' }})"
        class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1.5 rounded-md">
        Delete
    </button>
</form>
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



<script>
    function confirmDelete(id, isSelf) {
        if (isSelf) {
            Swal.fire({
                title: 'Tidak Bisa!',
                text: 'Anda tidak dapat menghapus akun Anda sendiri.',
                icon: 'error',
                confirmButtonColor: '#6b7280',
                confirmButtonText: 'OK',
            });
            return; // stop, tidak submit form
        }

        Swal.fire({
            title: 'Hapus Admin?',
            text: 'Data admin ini akan dihapus permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection 
