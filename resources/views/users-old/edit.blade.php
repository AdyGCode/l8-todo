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

                <form method="POST" action="/users/{{ $user->id }}">
                    @method('PATCH')
                    {{ csrf_field() }}

                    <div class="m-0 p-0 mb-4 pb-4">
                        <div class="form-group">
                            <label for="name"
                                   class="m-0 pt-6 pb-2 text-dark font-bold w-full">
                                User Name
                            </label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="bg-gray-100 rounded border border-gray-400
                                    focus:outline-none focus:bg-white pb-2 px-3 mb-4
                                    w-full leading-normal font-medium placeholder-gray-700 "
                                placeholder="Enter your User's title"
                                value="{{ old('name')??$user->name }}"/>
                            @if ($errors->has('name'))
                                <span
                                    class="bg-red-200 relative text-red-500 m-0 mt-12 py-1 px-4
                                    rounded-lg">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="m-0 p-0 mb-4 pb-4">
                        <div class="form-group">
                            <label for="eMail"
                                   class="m-0 pt-6 pb-2 text-dark font-bold w-full">
                                User eMail
                            </label>
                            <input
                                type="text"
                                name="email"
                                id="email"
                                class="bg-gray-100 rounded border border-gray-400
                                    focus:outline-none focus:bg-white pb-2 px-3 mb-4
                                    w-full leading-normal font-medium placeholder-gray-700 "
                                placeholder="Enter your User's eMail"
                                value="{{ old('email')??$user->email }}"/>
                            @if ($errors->has('email'))
                                <span
                                    class="bg-red-200 relative text-red-500 m-0 mt-12 py-1 px-4
                                    rounded-lg">
                                    {{ $errors->first('eMail') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                                name="update"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update User
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
