<x-theme theme="admin.sidebar">
    <x-theme-layout>

        <!-- Module Title Bar -->
        @if(Module::has('Titlebar'))
            @livewire('TitleBar', ['actions'=>$actions])
        @endif
        <!-- end -->

        <div class="relative">
            <div class="absolute right-0 bottom-4">
                <div class="btn-group">
                    <x-button danger >Reset</x-button>
                    <x-button danger >Rollback</x-button>
                </div>
            </div>
        </div>



        @livewire('WireTable', ['actions'=>$actions])

        @livewire('WirePopupForm', ['actions'=>$actions])

        {{-- @livewire('Popup-LiveManual') --}}

        {{-- SuperAdmin Actions Setting --}}
        @if(Module::has('Actions'))
            @livewire('setActionRule', ['actions'=>$actions])
        @endif



    </x-theme-layout>
</x-theme>
