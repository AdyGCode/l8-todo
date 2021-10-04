<?php
/**
 * Filename:    create.blade.php
 * Project:     l8-todo
 * Location:    dist\
 * Author:      Adrian Gould <adrian.gould@nmtafe.wa.edu.au>
 * Created:     27/09/21
 * Description:
 *     Add description here
 */

?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                <form action="{{ route('User.destroy', user->id) }}" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        <h5 class="text-center">
                            Are you sure you want to
                            delete {{ user->name }} ?
                        </h5>
                    </div>
                    <div class="modal-footer">
                        <a class="text-sm bg-blue-500 hover:bg-blue-700
                                       text-white py-1 px-2 mr-6
                                       rounded focus:outline-none focus:shadow-outline"
                           href="/dashboard">
                            Cancel
                        </a>
                        <button
                            type="submit"
                            class="text-sm bg-red-500 hover:bg-red-700
                                       text-white py-1 px-2 rounded focus:outline-none
                                       focus:shadow-outline">
                            Yes, Delete User
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
