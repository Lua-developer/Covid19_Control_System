// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("discard");
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["화이자", "모더나"],
        datasets: [{
            data: [tot_pfi, tot_mod],
            backgroundColor: ['#ff0000', '#0611f2'],
        }],
    },
});