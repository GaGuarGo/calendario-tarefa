<x-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

            <form action="{{route("auth.login")}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="email" name="email" id="email"
                           class="w-full p-2 border rounded-lg @error('email') border-red-500 @enderror" value="{{old('email') ?? request('email')}}">
                    <x-error-label>email</x-error-label>

                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Senha:</label>
                    <input type="password" name="password" id="password"
                           class="w-full p-2 border rounded-lg @error('password') border-red-500 @enderror">
                    <x-error-label>password</x-error-label>

                </div>
                <div class="mb-4 flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember" class="text-gray-700">Lembrar-me</label>
                </div>
                <div>
                    <x-button>
                        Login
                    </x-button>
                </div>
            </form>

        </div>
    </div>
</x-layout>
