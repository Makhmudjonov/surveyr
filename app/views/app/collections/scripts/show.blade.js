// Laravel Blade orqali so‘rovnoma ma'lumotlarini JSON formatiga o'tkazish
const surveyJson = `{!! json_encode($formContent) !!}`;
const surveyResponse = JSON.parse(`{!! json_encode($collection->submission) !!}`);

// Mahalliy xotiradan mavzuni olish
var currentTheme = localStorage.getItem('phoenixTheme') ?? 'light';

// SurveyJS modelini yaratish va foydalanuvchi javoblarini yuklash
const survey = new Survey.Model(surveyJson);
survey.data = surveyResponse;

document.addEventListener("DOMContentLoaded", function() {
    // So‘rovnomani ekranga chiqarish
    survey.render(document.getElementById("surveyContainer"));

    // Mavzuga qarab so‘rovnomaga mos stilni qo‘llash
    if(currentTheme === 'light'){
        survey.applyTheme(SurveyTheme.SolidLightPanelless);
    }else{
        survey.applyTheme(SurveyTheme.SolidDarkPanelless);
    }
});

// Foydalanuvchi sharhini o‘zgartirganda AJAX orqali serverga yuborish
document.getElementById('reviewInput').addEventListener('change', function(e) {
    const review = this.value;

    $.ajax({
        url: `@route('collections.review', $collection->id)`, // Sharhni serverga yuborish
        method: 'POST',
        data: {
            _token: `{{ csrf_token() }}`, // CSRF token
            review: review // Foydalanuvchi sharhi
        },
        success: function(response) {
            if(response.status){
                return toast.success({message: response.message}); // Muvaffaqiyatli bo‘lsa xabar chiqarish
            }
            return toast.error({message: response.message ?? 'Xatolik yuz berdi'}); // Xatolik bo‘lsa
        },
        error: function(error) {
            return toast.error({message: error.responseJSON.message ?? 'Xatolik yuz berdi'}); // AJAX xatosi
        }
    });
});

// localStorage-da `phoenixTheme` o‘zgarsa, `phoenixThemeChanged` hodisasini chaqirish
(function() {
    const originalSetItem = localStorage.setItem;
    localStorage.setItem = function (key, value) {
      const event = new Event('phoenixThemeChanged');
      document.dispatchEvent(event);
      originalSetItem.apply(this, arguments);
    };
})();

// `phoenixThemeChanged` hodisasi sodir bo‘lganda yangi mavzuni qo‘llash
document.addEventListener('phoenixThemeChanged', () => {
    const newTheme = localStorage.getItem('phoenixTheme');
    currentTheme = newTheme;

    if(currentTheme === 'dark'){
        survey.applyTheme(SurveyTheme.SolidLightPanelless);
    }
    else{
        survey.applyTheme(SurveyTheme.SolidDarkPanelless);
    }
});
