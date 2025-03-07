// So‘rovnoma natijalariga qo‘shimcha maydonlar qo‘shish
const extraInputs = [
    {"type":"text","name":"id","title":"ID","inputType":"number"},
    {"type":"text","name":"review","title":"Sharh"},
];

// Laravel Blade orqali formani JSON formatiga o‘tkazish
const surveyJson = JSON.parse(`{!! json_encode($form->content) !!}`);
surveyJson.pages[0].elements = extraInputs.concat(surveyJson.pages[0].elements); // 'id' ni birinchi o‘ringa qo‘yish

// So‘rovnoma natijalarini yuklash
const surveyResults = JSON.parse(`{!! json_encode($submissions) !!}`);

// SurveyJS modelini yaratish
const survey = new Survey.Model(surveyJson);

// Jadval ustunlari tartibi
const tabulatorColumns = [
    { title: "ID", field: "id" }, // ID birinchi ustunda bo‘lishi kerak
    { title: "Sharh", field: "review"},
    ...survey.pages[0].elements.map((el) => ({
        title: el.title,
        field: el.name,
        width: 150,
    })),
];

// Tabulator jadvalini yaratish
const surveyDataTable = new SurveyAnalyticsTabulator.Tabulator(
    survey,
    surveyResults,
    {
        columns: tabulatorColumns, // Ustunlarni belgilangan tartibda chiqarish
    }
);

document.addEventListener("DOMContentLoaded", function() {
    // Jadvalni sahifaga yuklash
    surveyDataTable.render(document.getElementById("surveyDataTable"));

    // Jadvaldagi qator ustiga bosganda tegishli sahifaga yo‘naltirish
    document.getElementById("surveyDataTable").addEventListener("click", function(event) {
        const target = event.target;

        if (target.hasAttribute("tabulator-field")) {
            const field = target.getAttribute("tabulator-field");

            // ID ustuniga bosilganda
            if(field === "id"){
                let value = target.getAttribute("title");
                location.href = `@route('collections.show', ':id')`.replace(':id', value);
                return;
            }

            // Sharh ustuniga bosilganda
            if(field === "review"){
                let id = target.closest(".tabulator-row").querySelector('[tabulator-field="id"]').getAttribute("title");
                location.href = `@route('collections.show', ':id')`.replace(':id', id);
                return;
            }
        }
    });

    // Hamma so‘rovnomalarni o‘chirish tugmachasi
    document.getElementById('purgeFormSubmissions').addEventListener('click', function() {
        Swal.fire({
            title: 'Ishonchingiz komilmi?',
            text: "Bu amal ushbu shakl uchun barcha yuborilgan ma'lumotlarni o'chiradi. Qayta tiklab bo‘lmaydi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ha, hamma ma’lumotni o‘chir!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `@route('collections.clear', $form->id)`;
            }
        });
    });
});
