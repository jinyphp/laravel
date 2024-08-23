<div class="card">
    <div class="card-header">
        <x-flex-between>
            <div>
                <h5 class="card-title">
                    view:clear
                </h5>
                <h6 class="card-subtitle text-muted">
                    Clear all compiled view files
                </h6>
            </div>
            <div>
                @icon("info-circle.svg")
            </div>
        </x-flex-between>
    </div>
    <div class="card-body">
        <button class="btn btn-primary" wire:click="clear">Clear</button>
        <div class="py-4">
            {!! $message !!}
        </div>
    </div>
</div>
