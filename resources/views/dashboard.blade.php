<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (auth()->user()->email_verified_at == null)
                <div class="my-4 bg-white p-6">
                    Activer votre compte. Vous avez recu un email d'activation.
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div>
                            <x-button>
                                {{ __('Resend Verification Email') }}
                            </x-button>
                        </div>
                    </form>                
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Vous etes connecte
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
