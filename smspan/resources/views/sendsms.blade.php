<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SendSMS') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Excel:
                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4">
                        <br>
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Importar dados
                          </button>

                          <br>
                        <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center m-2" href="{{ route('export') }}">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                            <span>Exportar dados</span>
                        </a>


                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Mensages que serão enviadas:
                </div>
                <form action="consultSendSms" method="get" id="FormConsultaSMS">
                    {{ csrf_field() }}

                    <table class="table-fixed border-separate border-black-800 m-1">
                        <thead>
                        <tr>
                            <th class="w-1/4 border border-black-600 p-1">Numero</th>
                            <th class="w-1/2 border border-black-600 p-1">Texto</th>
                            <th class="w-1/4 border border-black-600 p-1">Inserido</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($outbox as $out)
                                <tr>
                                    <td class="border border-black-600 p-1">{{ $out->DestinationNumber }}</td>
                                    <td class="border border-black-600 p-1">{{ $out->TextDecoded }}</td>
                                    <td class="border border-black-600 p-1">{{ $out->InsertIntoDB }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>