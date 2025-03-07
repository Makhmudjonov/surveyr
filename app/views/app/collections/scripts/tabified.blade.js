// Vizualizatsiya paneli uchun qo‘shimcha sozlamalar
const vizPanelOptions = {
    allowHideQuestions: false // Savollarni yashirishni o‘chirib qo‘yish
};

// Laravel Blade orqali ma'lumotlarni JSON formatiga o'tkazish
const surveyJson = JSON.parse(`{!! json_encode($form->content) !!}`);
const surveyResults = JSON.parse(`{!! json_encode($collections) !!}`);
const tabInfo = JSON.parse(`{!! json_encode($tabsInfo) !!}`);

const survey = new Survey.Model(surveyJson);

// Vizualizatsiya panellarini saqlash uchun obyekt
const vizPanels = {};

// Bo‘lim (tab) uchun vizualizatsiyani yaratish funksiyasi
function renderTabVisualization(tab, index) {
    // Agar vizualizatsiya paneli allaqachon yaratilgan bo‘lsa, uni qayta yaratmaymiz
    if (!vizPanels[index]) {
        // Faqat ushbu tabga tegishli savollarni olish
        const questions = survey.getAllQuestions().filter(q => tab.questions.includes(q.name));
        
        // Yangi vizualizatsiya panelini yaratish
        vizPanels[index] = new SurveyAnalytics.VisualizationPanel(
            questions,
            surveyResults,
            vizPanelOptions
        );

        // Agar ushbu tabning `div` elementi mavjud bo‘lmasa, uni yaratamiz
        let tabContent = document.getElementById(`tabContent-${index}`);
        if (!tabContent) {
            tabContent = document.createElement("div");
            tabContent.id = `tabContent-${index}`;
            tabContent.style.display = "none";  // Dastlab yashirin bo‘ladi
            document.getElementById("surveyVizPanel").appendChild(tabContent);
        }

        // Vizualizatsiyani ekranga chiqarish
        vizPanels[index].render(tabContent);
    }
}

// `Tab`ni almashtirish (bo‘limni o‘zgartirish) funksiyasi
function switchTab(index) {
    // Barcha `tabContent`larni yashirish
    tabInfo.forEach((_, i) => {
        const tabContent = document.getElementById(`tabContent-${i}`);
        if (tabContent) {
            tabContent.style.display = "none";
        }
    });
    
    // Tanlangan `tab` uchun vizualizatsiyani yaratish
    const selectedTabContent = document.getElementById(`tabContent-${index}`);
    renderTabVisualization(tabInfo[index], index);  // Agar hali yaratilmagan bo‘lsa, yaratadi
}

// `DOMContentLoaded` hodisasi sodir bo‘lganda bo‘lim tugmalarini yaratish
document.addEventListener("DOMContentLoaded", function() {
    const tabContainer = document.createElement("div");
    tabContainer.className = "tab-container"; // Stil qo‘shish uchun class

    // Har bir bo‘lim uchun tugma yaratish va birinchi bo‘limni ishga tushirish
    tabInfo.forEach((tab, index) => {
        const tabButton = document.createElement("button");
        tabButton.textContent = tab.name; // Tugma matni - bo‘lim nomi
        tabButton.onclick = () => switchTab(index); // Tugmaga bosilganda `tab` almashtirish
        tabContainer.appendChild(tabButton);
    });

    // Bo‘lim tugmalarini sahifaga qo‘shish va birinchi `tab`ni yuklash
    document.getElementById("surveyVizPanel").prepend(tabContainer);
    switchTab(0);  // Sahifa yuklanganda birinchi bo‘limni ochish
});
