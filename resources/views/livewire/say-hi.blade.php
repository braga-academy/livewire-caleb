<div>
    <input type="text" wire:model="name">
    Hi {{ $name }}: {{ now() }}

    <button wire:click="$refresh">Refresh</button>
</div>
