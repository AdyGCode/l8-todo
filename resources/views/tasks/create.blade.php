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
            {{ __('Add Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                <form method="POST" action="/tasks">
                    <div class="m-0 p-0 mb-4 pb-4">
                        <div class="form-group">
                            <label for="name"
                                   class="m-0 pt-6 pb-2 text-dark font-bold w-full">Task
                                Name
                            </label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="bg-gray-100 rounded border border-gray-400
                                    focus:outline-none focus:bg-white pb-2 px-3 mb-4
                                    w-full leading-normal font-medium placeholder-gray-700 "
                                placeholder="Enter your task's title"
                                value="{{old('name')}}"/>
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
                            <label for="description"
                                   class="m-0 pt-6 pb-2 text-dark font-bold w-full">
                                Task Description
                            </label>
                            <textarea
                                name="description" id="description"
                                class="bg-gray-100 rounded border border-gray-400
                                focus:outline-none focus:bg-white pb-2 px-3 mb-4
                                w-full leading-normal font-medium placeholder-gray-700 "
                                placeholder='Enter your task'>{{old('description')}}</textarea>
                            @if ($errors->has('description'))
                                <span
                                    class="bg-red-200 relative text-red-500 m-0 mt-12 py-1 px-4
                                    rounded-lg">
                                    {{ $errors->first('description') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add Task
                        </button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
