// это универсальная функция.. мы тут только задаем тип желаемых данных
function getData(data_type) {
    return new Promise(function (resolve, reject) {
        $.ajax({
            url: '',
            type: 'GET',
            data: 'id='+data_type, 
            dataType: 'json',
            error: reject,
            success: function (json) {
                return resolve(json);
            }
        });
    });
}
    
//--------------
//- AREA CHART -
//--------------
    
$(function () {
    getData('traffic').then(function (json) { 
    
    var vizits = [];
    $.each(json.data, function (i, el) {
        vizits.push({
            date: (el.date).replace(/(\d{4})(\d{2})(\d{2})/,'$3.$2'),
            visits: el.visits,
            visitors: el.visitors
        });
    });
    var date = vizits.map(function(el) { return el.date} );
    var vs = vizits.map(function(el) { return el.visits} );
    var v = vizits.map(function(el) { return el.visitors} );
    
    var myElement = document.getElementById("areaChartLine").getContext("2d"),
    
    lineChartData = {
        labels: date,
        datasets: [{
            label: "Посетители",
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            data: v
        }, {
            label: "Просмотры",
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            data: vs
        }]
    }, options = {};
    
    var myLine = new Chart(myElement).Line(lineChartData, options);
    
    $("#visits .progress-number b").text(json.totals.visits);
    $('#visits').css('width', (json.totals.visits*100)/200 +'%').attr('aria-valuenow', (json.totals.visits*100)/200);
     
    $("#page_views .progress-number b").text(json.totals.page_views);
    
    $("#visitors .progress-number b").text(json.totals.visitors);
    $("#new_visitors .progress-number b").text(json.totals.new_visitors);
    
    $(".chartLine #loader").hide();

    }, function (error) {
        console.log('Failed!: ' + error.statusText);
    });

});
    

//-------------
//- PIE CHART -
//-------------

$(function () {
    //если определеные цвета то загони их в массив как ниже и вытаскивай в цикле
    var colors = ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'];
    getData('sources').then(function (json) { 
        var PieData = [];
        $.each(json.data, function (i, el) {
            PieData.push({
                label: el.name,
                value: el.visits,
                color: colors[i],
               
            });
        });
        var pieOptions = {};
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas).Doughnut(PieData, pieOptions);
        
        document.getElementById('doughnut-legend').innerHTML = pieChart.generateLegend();
        
        $(".chartPie #loader").hide();

    }, function (error) {
        console.log('Failed!: ' + error.statusText);
    });

});
 