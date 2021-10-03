<?php
/**
 * Filename:    browse.blade.php
 * Project:     SaaS-CUBE
 * Location:    resources\views\admin\tasks
 * Author:      Adrian Gould <adrian.gould@nmtafe.wa.edu.au>
 * Created:     08/09/21
 * Description:
 *     Add description here
 */

?>
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">

                    <div class="overflow-x-auto ">
                        <table class="table w-full border border-1 ">
                            <caption>Tasks
                            </caption>
                            <thead class="bg-gray-200 border border-gray-300 text-gray-700">
                            <tr>
                                <th class="p-2 text-left" scope="col"></th>
                                <th class="p-2 text-left" scope="col">ID</th>
                                <th class="p-2 text-left" scope="col">Name</th>
                                <th class="p-2 text-left" scope="col">Description</th>
                                <th class="p-2 flex justify-between text-left" scope="col"
                                    colspan="2">
                                    <span class="py-2">
                                        Actions
                                    </span>
                                    <span class="py-2">
                                        <a href="{{ route('tasks.create') }}"
                                           class="rounded p-2 px-4
                                              border border-blue-600 text-blue-800 bg-white
                                              hover:bg-blue-500 hover:text-white hover:border-blue-800
                                              transition-all ease-in-out duration-200">
                                        Add Task
                                    </a>
                                    </span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $key=>$task)
                                <tr class="p-2 m-0 border border-gray-300
                                           hover:bg-blue-100 hover:border-blue-300
                                           transition-all duration-200 ease-in-out
                                           @if($task->user_id == auth()->user()->id)
                                    bg-white text-blue-800 font-semibold
                                    hover:bg-blue-200 hover:text-black
@endif">
                                    <td class="p-2 py-3 m-0">
                                        <small class="border border-gray-200 bg-gray-200
                                        text-gray-400 rounded rounded-lg p-1 px-2">
                                            {{ $key+1 }}
                                        </small>
                                    </td>
                                    <td class="p-2 py-3 m-0">
                                        {{ $task->id }}
                                    </td>
                                    <td class="p-2 py-3 m-0">
                                        {{ $task->name }}
                                    </td>
                                    <td class="p-2 py-3 m-0">
                                        {{ Str::words
                                    ($task->description,10) }}
                                    </td>

                                    <td class="p-2 py-3 m-0 flex justify-between text-left">
                                        <span class="mx-2 ml-0">
                                            <a href="{{ route('tasks.show', [$task->id]) }}"
                                               class="rounded p-2 px-4
                                                      border border-green-600 text-green-800 bg-white
                                                      hover:bg-green-600 hover:text-white
                                                      transition-all ease-in-out duration-200">
                                                Details
                                            </a>
                                        </span>
                                        <span>
                                            <a href="{{ route('tasks.edit', ['task'=>$task->id]) }}"
                                               class="rounded p-2 px-4
                                                      border border-amber-600 text-amber-800 bg-white
                                                      hover:bg-amber-500 hover:text-white
                                                      transition-all ease-in-out duration-200">
                                                Update
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot class="bg-gray-200 text-gray-700 border border-gray-300">
                            <tr>
                                <td colspan="5" class="p-2 pb-3 m-0">
                                {{ $tasks->links() }}
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
