<div>
    <x-navtab class="mb-3 nav-bordered">

        <!-- formTab -->
        <x-navtab-item class="show active" >

            <x-navtab-link class="rounded-0 active">
                <span class="d-none d-md-block">라라벨</span>
            </x-navtab-link>

            <x-form-hor>
                <x-form-label>이름</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"forms.name")
                        ->setWidth("standard")
                    !!}
                    <p>라라벨 프로젝트 이름</p>
                </x-form-item>
            </x-form-hor>


        </x-navtab-item>



    </x-navtab>
</div>
