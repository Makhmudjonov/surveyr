<div class="d-grid h-100 align-items-center justify-content-center" style="min-height: 300px;">
    <div class="d-grid align-items-center justify-content-center">
        <div class="text-center empty-icon">
            {!! (isset($emptyIcon)) ? null : '<i class="fa-regular fa-folder-open mb-3" style="font-size:4rem"></i>' !!} <!-- Agar $emptyIcon o'rnatilgan bo'lsa, hech narsa ko'rsatmaydi, aks holda papka ikonkasini chiqaradi -->
            <h2>{{ $emptyTitle ?? null }}</h2> <!-- Agar $emptyTitle mavjud bo'lsa, uni chiqaradi, aks holda hech narsa ko'rsatmaydi -->
            <p>{!! $emptyText ?? __('Hech qanday yozuv topilmadi') !!}</p> <!-- Agar $emptyText mavjud bo'lsa, uni chiqaradi, aks holda "Hech qanday yozuv topilmadi" matnini chiqaradi -->
        </div>
    </div>
</div>
