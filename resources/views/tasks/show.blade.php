<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            タスク詳細画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="lg:w-9/10 w-full mx-auto overflow-auto">
                                <div class="mb-5 flex justify-end space-x-5">
                                    <button onclick="location.href='{{ route('tasks.create') }}'" class=" text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">新規登録</button>
                                    <button onclick="location.href='{{ route('tasks.index') }}'" class=" text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">戻る</button>
                                </div>

                                <table class="table-auto w-full text-left whitespace-no-wrap">

                                    <thead>
                                        <tr>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">タスク名</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">締切</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">作成日</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">更新日</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                            <tr>
                                                <td class="px-4 py-3">{{ $task->title }}</td>
                                                <td class="px-4 py-3">{{ $task->description }}</td>
                                                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}</td>
                                                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($task->created_at)->format('Y-m-d') }}</td>
                                                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($task->updated_at)->format('Y-m-d') }}</td>

                                                <td class="px-4 py-3 flex justify-end space-x-5">
                                                    {{-- 完了ボタン --}}
                                                    <form method="post" action="{{ route('tasks.complete', ['id' => $task->id]) }}">
                                                        @csrf
                                                        @method('patch')
                                                        <button type="submit" class="flex ml-auto text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded">完了</button>
                                                    </form>

                                                    {{-- 編集ボタン --}}
                                                    <button onclick="location.href='{{ route('tasks.edit', $task->id) }}'" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">編集</button>

                                                    {{-- 削除ボタン --}}
                                                    <form method="post" action="{{ route('tasks.destroy', ['id' => $task->id]) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">削除</button>
                                                    </form>
                                                </td>
                                            </tr>
                                    </tbody>

                                </table>
                            </div>

                            {{-- <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                                <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">編集</button>
                            </div> --}}
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


