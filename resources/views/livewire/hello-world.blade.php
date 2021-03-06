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

    <div>
        {{ implode(', ', $greeting) }} {{ strtoupper($name) }} @if($loud)! @endif
    </div>

    <div>
        <form action="#" wire:submit.prevent="$set('name', 'Bingo')">
            <button type="submit">Reset Name</button>
        </form>
        <form action="#" wire:submit.prevent="resetName('Mario')">
            <button type="submit">Reset Name</button>
        </form>
    </div>

    <hr>

    @foreach ($names as $name)
        @livewire('say-hi', ['name' => $name], key($name))
    @endforeach

    <button wire:click="$refresh">Refresh</button> {{ now() }}
    <button wire:click="refreshChildren">Refresh Children</button> {{ now() }}
</div>
