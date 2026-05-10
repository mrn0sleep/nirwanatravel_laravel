<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-base font-semibold text-gray-950 dark:text-white">
                    User Profile
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Akses halaman profil user
                </p>
            </div>
            <a href="{{ route('profile.edit') }}"
               class="fi-btn fi-btn-size-md fi-color-custom fi-btn-style-filled px-4 py-2 rounded-lg text-white font-semibold"
               style="background-color: #f59e0b;">
                Ke Profile User
            </a>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>