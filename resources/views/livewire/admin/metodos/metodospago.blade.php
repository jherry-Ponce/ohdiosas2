<div class="mt-16 container">
    <h1>Ingrese metodos de pago permitidos</h1>
    <x-jet-input type="text" placeholder="ingrese metodo" />
    <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save">
        Guardar
    </x-jet-danger-button>
</div>
