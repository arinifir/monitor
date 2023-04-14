@extends('admin.master')

@section('content')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Guru
        </h2>
        <!-- CTA -->
        <form class="space-y-6" action="{{ route('admin.ubahGuru') }}" method="POST" enctype="multipart/form-data">
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="mb-6">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NIG
                    </label>
                    <input type="text" id="id" name="id" value="{{$guru->id}}" hidden>
                    <input type="text" id="nig" name="nig" required value="{{$guru->nig}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama
                        Guru</label>
                    <input type="text" id="nama" name="nama" required value="{{$guru->nama}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                            Mata Pelajaran</label>
                        <select name="mapel" id="mapel"
                            class="select block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="{{$guru->mapel}}" selected>{{$guru->mapel}}</option>
                            <option disabled>-</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Fisika">Fisika</option>
                            <option value="Biologi">Biologi</option>
                            <option value="Kimia">Kimia</option>
                            <option value="Agama">Agama</option>
                        </select>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                            Kelas</label>
                        <select name="kelas_id" id="kelas_id"
                            class="select block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="{{$guru->kelas_id}}" selected>{{$guru->hasKelas->nama}}</option>
                            <option disabled>-</option>
                            @foreach ($kelas as $kelas)
                            <option value="{{$kelas->id}}">{{$kelas->nama}}</option>
                            @endforeach
                        </select>
                </div>
                <div>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Simpan
                    </button>
                </div>
            </div>
            @csrf
        </form>

        <!-- End of modal backdrop -->
        @endsection
