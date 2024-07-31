<x-wire-table>
    <x-wire-thead>
        {{-- 테이블 제목 --}}
        <th width='100'>순번</th>

        <th>Migration</th>
        <th width='100'>batch</th>
        <th width='100'>rollback</th>
    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            <x-wire-tbody-item :selected="$selected" :item="$item">
                {{-- 테이블 리스트 --}}
                <td width='100'>{{$item->id}}</td>

                <td>{{$item->migration}}</td>
                <td width='100'>{{$item->batch}}</td>
                <td width='100'>
                    <x-click wire:click="hook('rollback',{{$item->id}})">
                        Rollback
                    </x-click>

                </td>

            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>

