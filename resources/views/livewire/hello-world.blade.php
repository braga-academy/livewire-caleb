<div>
    <div>
        <input wire:model="name" type="text">
        <input type="checkbox" wire:model="loud">

        <select wire:model="greeting" multiple>
            <option>Hello</option>
            <option>Goodbye</option>
            <option>Adios</option>
        </select>
    </div>
    {{ implode(', ', $greeting) }} {{ strtoupper($name) }} @if($loud)! @endif
</div>
