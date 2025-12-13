<x-filament-widgets::widget>
    <x-filament::section>
        <form wire:submit="save">
            {{ $this->form }}
            
            <div class="mt-6 flex justify-end">
                <x-filament::button type="submit">
                    Simpan Pengaturan
                </x-filament::button>
            </div>
        </form>
    </x-filament::section>
</x-filament-widgets::widget>

