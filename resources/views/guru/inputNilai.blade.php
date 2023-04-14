@extends('guru.master')

@section('content')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Input Nilai 
        </h2>
        <!-- CTA -->
        <form class="space-y-6" action="{{ route('guru.inputNilai') }}" method="POST" enctype="multipart/form-data">
            <div class="flex mb-6 flex-col w-full lg:flex-row">
                <div class="mb-3 w-full grid flex-grow">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        for="user_avatar">NIS</label>
                    <input style="width:50%" value="{{$siswa->nis}}" disabled
                        class="p-2 block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="user_avatar_help" type="text">
                </div>
                <div class="mb-3 w-full grid flex-grow">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        for="user_avatar">Nama</label>
                    <input style="width:50%" value="{{$siswa->nama}}" disabled
                        class="p-2 block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="user_avatar_help" type="text">
                </div>
                <div class="mb-3 w-full grid flex-grow">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        for="user_avatar">Kelas</label>
                    <input style="width:50%" value="{{$siswa->hasKelas->nama}}" disabled
                        class="p-2 block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="user_avatar_help" type="text">
                </div>
            </div>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="mb-6">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NIS
                    </label>
                    <input type="text" id="siswa_id" name="siswa_id" value="{{$siswa->id}}" hidden>
                    <input type="text" id="guru_id" name="guru_id" value="{{session('user')->id}}" hidden>
                    <input type="number" id="nilai" name="nilai" required min="0" value=0
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                            Jenis Nilai</label>
                        <select name="jenis" id="jenis"
                            class="select block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="Tugas Harian">Tugas Harian</option>
                            <option value="Ulangan Harian">Ulangan Harian</option>
                            <option value="UTS">UTS</option>
                            <option value="UAS">UAS</option>
                        </select>
                </div>
                <div class="mb-6">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Deskripsi</label>
                    <textarea id="keterangan" name="keterangan" rows="4" required
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Keterangan ..."></textarea>
                </div>
                <div>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Input Nilai
                    </button>
                </div>
            </div>
            @csrf
        </form>

        <!-- End of modal backdrop -->
        @endsection
