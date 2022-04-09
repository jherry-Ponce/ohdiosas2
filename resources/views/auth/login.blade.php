
<x-guest-layout >
    <x-jet-authentication-card>
        <x-slot name="logo">
           <a href="/">
            <img src="https://scontent.ftru2-1.fna.fbcdn.net/v/t1.6435-9/151832684_885168635637235_2906067587046004896_n.jpg?_nc_cat=109&ccb=1-5&_nc_sid=09cbfe&_nc_eui2=AeHKXI72YRilsGFhOABatbijhnDqHoWziS6GcOoehbOJLuCQRQecDh82nR4ZNr4Jm3G74YnTn7eU4n7QsP0obnQN&_nc_ohc=COXy8WXhKPoAX94rkAS&_nc_ht=scontent.ftru2-1.fna&oh=00_AT8Wlhnw0cbOflJjqtkv7HmbwBUoXVatIcXNnXLvDtjSNA&oe=6221850B"
            class=" max-h-48 m-auto md:hidden ">
           </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div class="py-4 text-center ">
            <strong  >Login</strong>
        </div>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4 mb-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('No recuerdas tu clave?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>

            </div  class="mt-8">
                <span>No tienes cuenta?</span>
                <a href="{{ route('register') }}">
                  <strong>{{ __('Registrate') }}</strong>  
                </a>
            <div>

            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

