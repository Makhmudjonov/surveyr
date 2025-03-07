const statsChart = JSON.parse(`{!! $statsChart !!}`);

// Formalar nomlarini va ularning yuborilgan sonini ajratib olish
const formTitles = statsChart.map(item => item.form.title);
const submissionCounts = statsChart.map(item => item.count);

// ECharts diagrammasini boshlash
const chartDom = document.getElementById('submissionBarChart');
const myChart = echarts.init(chartDom);

// Diagramma sozlamalari
const option = {
    title: {
        text: 'Forma yuborish statistikasi',
    },
    tooltip: {
        trigger: 'axis',
    },
    xAxis: {
        type: 'category',
        data: formTitles,
        axisLabel: {
            rotate: 45, // Yorliqlarni burish (o‘qilishi oson bo‘lishi uchun)
            interval: 0, // Barcha yorliqlarni ko‘rsatish
        }
    },
    yAxis: {
        type: 'value',
        name: 'Yuborishlar soni',
    },
    series: [
        {
            name: 'Yuborishlar',
            type: 'bar',
            data: submissionCounts,
            itemStyle: {
                color: '#4a90e2', // Diagramma ustunlari rangi
            },
        },
    ],
};

// Diagrammani chizish
myChart.setOption(option);
