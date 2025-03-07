$(document).ready(function() {
    var resendTimer = $('#resendTimer'); // "Kod qayta yuborish" tugmasini topish
    var resendTime = resendTimer.data('resend-time'); // Tugmadagi "qayta yuborish vaqti" ma'lumotini olish
    var resendInterval = setInterval(function() { // Har soniyada amal bajarish
        resendTime--; // Vaqtni kamaytirish
        resendTimer.text('Kod qayta yuborish (' + resendTime + ')'); // Tugma matnini yangilash
        if (resendTime <= 0) { // Agar vaqt tugagan bo'lsa
            resendTimer.text('Kod qayta yuborish').removeAttr('disabled'); // Tugmani faollashtirish
            clearInterval(resendInterval); // Vaqt hisoblashni to'xtatish
        }
    }, 1000); // Har soniyada ishga tushirish
});

$('#resendTimer').click(function() { // "Kod qayta yuborish" tugmasi bosilganda
    buttonState('#resendTimer', 'loading'); // Tugma holatini "Yuklanmoqda" ga o'zgartirish
    $.get("{{ route('2fa.resend') }}", function(response) { // Serverga so‘rov yuborish
        if (response.status) { // Agar javob ijobiy bo‘lsa
            $('#resendTimer').attr('disabled', 'disabled').text('Kod qayta yuborish (' + response.time + ')'); // Tugmani o‘chirib qo‘yish va matnni yangilash
            var resendTime = response.timer; // Serverdan olingan vaqtni olish
            var resendInterval = setInterval(function() { // Har soniyada vaqtni kamaytirish
                resendTime--; // Vaqtni kamaytirish
                $('#resendTimer').text('Kod qayta yuborish (' + resendTime + ')'); // Tugma matnini yangilash
                if (resendTime <= 0) { // Agar vaqt tugagan bo‘lsa
                    $('#resendTimer').text('Kod qayta yuborish').removeAttr('disabled'); // Tugmani faollashtirish
                    clearInterval(resendInterval); // Vaqt hisoblashni to‘xtatish
                }
            }, 1000); // Har soniyada ishga tushirish
        } else { // Agar javob ijobiy bo‘lmasa
            toast.error(response.message); // Xatolik haqida bildirish ko‘rsatish
            buttonState('#resendTimer', 'reset', 'Kod qayta yuborish'); // Tugmani dastlabki holatga qaytarish
        }
    });
});
