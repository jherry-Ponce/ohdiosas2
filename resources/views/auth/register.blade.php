<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
          <a href="/"> <img src="https://scontent.ftru2-1.fna.fbcdn.net/v/t1.6435-9/151832684_885168635637235_2906067587046004896_n.jpg?_nc_cat=109&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeHKXI72YRilsGFhOABatbijhnDqHoWziS6GcOoehbOJLuCQRQecDh82nR4ZNr4Jm3G74YnTn7eU4n7QsP0obnQN&_nc_ohc=GeEqLWXoWfIAX8sL7sd&_nc_ht=scontent.ftru2-1.fna&oh=40d15f26fde3dbaf1caef8768951f7b6&oe=60CB67CB"
            class="block max-h-32 w-auto ">
        </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />



        
        <div class="py-4 text-center ">
            <strong  >Registrese</strong>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

          <div>
            <x-jet-label for="name" value="{{ __('Tipo de documento') }}" />
            <div class="mt-4 grid  grid-cols-2 items-center gap-4">
                <div>
                    <select name="" id="" class="form-control w-full mt-1">
                        <option value="1">DNI</option>
                        <option value="2">Carnet Extranjeria</option>
                    </select>
                </div>
                
                <div>
                    
                    <x-jet-input id="Dni" class="block mt-2 w-full" type="number" name="Dni" :value="old('Dni')" required autofocus autocomplete="Dni" />
                </div>
               
            </div>
          </div>
            

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Ya tienes cuenta? ir') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
