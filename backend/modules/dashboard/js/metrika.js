//GET data
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


//- DAILY SUMMARY

$(function () {
    getData('daily_summary').then(function (json) { 
        $("#visits").text(json.totals[0]); 
        $("#page_views").text(json.totals[1]);
        $("#visitors").text(json.totals[2]);
        $("#new_visitors").text(json.totals[3]+"%");
    }, function (error) {
        console.log('Failed!: ' + error.statusText);
    });
});



//- AREA CHART 

$(function () {
    getData('traffic').then(function (json) { 

        var AreaData = [];
        $.each(json.data, function (i, el) {
            AreaData.push({
                date: (el.dimensions[0].name).replace(/(\d{4})-(\d{2})-(\d{2})/,'$3.$2'),
                visits: el.metrics[0],
                visitors: el.metrics[1]
            });
        });
    
        var date = AreaData.map(function(el) { return el.date} );
        var visit = AreaData.map(function(el) { return el.visits} );
        var user = AreaData.map(function(el) { return el.visitors} );
    
        var myElement = document.getElementById("areaChartLine").getContext("2d"),
        
        lineChartData = {
            labels: date,
            datasets: [{
                label: "Просмотры",
                fillColor: "rgba(75,148,192,1)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                data: visit
            }, {
                label: "Посетители",
                fillColor: "rgba(210,214,222,0.8)",
                strokeColor: "rgba(255,255,255,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                data: user
            }]
        }, options = {};
        
        var myLine = new Chart(myElement).Line(lineChartData, options);
        
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
        
        console.log(json);
        
        var PieData = [];
        $.each(json.data, function (i, el) {
            PieData.push({
                label: el.dimensions[0].name,
                value: el.metrics[0],
                color: colors[i]
            });
        });
        var pieOptions = {
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend fa-ul\"><% for (var i=0; i<segments.length; i++){%><li><i class=\"fa fa-li fa-circle-o\" style=\"color:<%=segments[i].fillColor%>\"></i><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas).Doughnut(PieData, pieOptions);
        
        document.getElementById('doughnut-legend').innerHTML = pieChart.generateLegend();
        
        $(".chartPie #loader").hide();

    }, function (error) {
        console.log('Failed!: ' + error.statusText);
    });

});
