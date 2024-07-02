<x-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Cadastro</h2>
            <x-flash-message/>
            <form action="{{route('auth.register')}}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nome:</label>
                    <input type="text" name="name" id="name"
                           class="w-full p-2 border rounded-lg @error('name') border-red-500 @enderror"
                           value="{{old('name') ?? request('name')}}"
                    >
                    <x-error-label>name</x-error-label>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="email" name="email" id="email"
                           class="w-full p-2 border rounded-lg @error('email') border-red-500 @enderror"
                           value="{{old('email') ?? request('email')}}"
                    >
                    <x-error-label>email</x-error-label>

                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Senha:</label>
                    <input type="password" name="password" id="password"
                           class="w-full p-2 border rounded-lg @error('password') border-red-500 @enderror"
                           value="{{old('password') ?? request('password')}}"
                    >
                    <x-error-label>password</x-error-label>
                </div>
                <div class="mb-4">
                    <label for="confirm-password" class="block text-gray-700">Confirmar Senha:</label>
                    <input type="password" name="confirm-password" id="confirm-password"
                           class="w-full p-2 border rounded-lg @error('confirm-password') border-red-500 @enderror"
                    >
                    <x-error-label>confirm-password</x-error-label>
                </div>

                <div>
                    <x-button>Cadastrar</x-button>
                </div>
            </form>

        </div>
    </div>
</x-layout>
