<!-- Jadval API kalitlar ro‘yxatini ko‘rsatish uchun -->
<table class="table table-hover">
    <tbody>
        @foreach ($apiKeys as $key)
            <tr>
                <!-- API kalit nomi va qisqa token -->
                <td class="px-2 rounded-start">
                    <div class="w-75 overflow-hidden">
                        <p class="m-0 fw-bold">{{ $key->name }}</p>
                        <p class="m-0">sk_{{ substring($key->token, 70) }}</p>
                    </div>
                </td>

                <!-- API kalitni nusxalash va boshqa opsiyalar -->
                <td class="text-end px-2 rounded-end">
                    <!-- Nusxalash tugmasi -->
                    <button class="btn btn-sm btn-outline-primary" data-clipboard="{{ $key->token }}"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Clipboard-ga nusxalash"
                        onclick="copyTheKey(this)">
                        <i class="fa-solid fa-clipboard"></i>
                    </button>

                    <!-- Boshqa harakatlar menyusi -->
                    <div class="dropdown table-dropdown d-inline">
                        <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="@route('keys.show', $key->id)">
                                    <i class="fa-solid fa-caret-right fs-8 pt-2 me-2"></i>
                                    Ko‘rish
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" onclick="confirmDelete(event)" href="@route('keys.revoke', $key->id)"
                                    data-delete-message="Siz haqiqatan ham ushbu API kalitni bekor qilishni xohlaysizmi? Ushbu kalit ishlatilayotgan barcha integratsiyalar ishlamay qoladi.">
                                    <i class="fa-solid fa-trash me-2"></i>
                                    Bekor qilish
                                </a>        
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    function copyTheKey(element) {
        const textToCopy = element.getAttribute('data-clipboard');
        
        // Vaqtinchalik matn maydoni yaratib, uni clipboard-ga nusxalash
        const textarea = document.createElement('textarea');
        textarea.value = textToCopy;
        document.body.appendChild(textarea);
        textarea.select();

        try {
            document.execCommand('copy');
            toast.info({message:'Kalit clipboard-ga nusxalandi'});
        } catch (err) {
            console.error('Nusxalashda xatolik yuz berdi:', err);
        }

        document.body.removeChild(textarea);
    }
</script>
