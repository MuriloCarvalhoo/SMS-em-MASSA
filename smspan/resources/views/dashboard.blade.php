<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Mensagens enviadas:
                </div>
                <table class="table table-striped" id="tableInbox" style="width:100%">
                    <thead>
                      <tr>
                        <th class="w-1/4 border border-black-600 p-1">Numero</th>
                        <th class="w-1/2 border border-black-600 p-1">Texto</th>
                        <th class="w-1/4 border border-black-600 p-1">Enviado</th>
                      </tr>
                    </thead>
                  </table>

            </div>
        </div>
    </div>
</x-app-layout>
