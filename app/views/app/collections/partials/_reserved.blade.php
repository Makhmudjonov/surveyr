<table class="table table-hover">
    <thead>
        <tr>
            <th></th> <!-- Ko'rish tugmasi uchun ustun -->
            <th>Sharh</th> <!-- Foydalanuvchi sharhi -->
            @foreach($questions as $key => $question)
                <th style="max-width: 300px; overflow-x:auto;">
                    <div>
                        <span data-bs-toggle="tooltip" title="{{$question}}">
                            {{ $key }}
                        </span>
                    </div>
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        <!-- Barcha javoblar to'plami (collections)ni ko'rib chiqish -->
        @foreach($collections as $collection)
            <tr>
                <!-- Ko‘rish tugmasi -->
                <td>
                    <div class="ps-1" style="max-width:200px">
                        <a href="{{ route('collections.show', $collection->id) }}" class="fw-bold" data-bs-toggle="tooltip" title="Yuborilgan ma'lumotni ko‘rish">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </div>
                </td>

                <!-- Foydalanuvchi sharhi -->
                <td>{{ ucfirst($collection->review) }}</td>

                <!-- Har bir savol uchun javobni ko‘rsatish -->
                @foreach($questions as $key => $question)
                    <td>
                        <div class="ps-1" style="max-width:200px">
                            @if(isset($collection->submission[$key]))
                                @php
                                    $currentValue = $collection->submission[$key];

                                    // Agar javob massiv bo'lsa, uni to'g'ri formatga keltirish
                                    while (is_array($currentValue)) {
                                        $currentValue = reset($currentValue); // Birinchi elementni olish
                                    }
                                @endphp

                                {{-- Natijani chiqarish --}}
                                <div>{!! is_array($currentValue) ? '-' : strip_tags($currentValue) !!}</div>
                            @else
                                - <!-- Agar javob bo‘lmasa, tire chiqariladi -->
                            @endif
                        </div>
                    </td>
                @endforeach
            </tr>
        @endforeach                                        
    </tbody>
</table>
