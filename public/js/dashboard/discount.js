var spinTarget1 = document.getElementById('graph-usage');
var spinTarget2 = document.getElementById('graph-overview');
// Create a function that will handle AJAX requests
function requestData(days, org, chart, type) {
// Activate the spinner
if(type ==1){
  var spinner = new Spinner().spin(spinTarget1);
}else{
  var spinner = new Spinner().spin(spinTarget2);
}



$.ajax({
  type: "GET",
  dataType: 'json',
url: "/api/graph/discount", // This is the URL to the API
data: { days: days, org:org, type:type}
}).done(function (data) {
// When the response to the AJAX request comes back render the chart with new data
  chart.setData(data);
})
.fail(function () {
// If there is no communication between the server, show an error
alert("error occured");
})
.always(function () {
// No matter if request is successful or not, stop the spinner
spinner.stop();
});
}

var chart = Morris.Area({
  element: 'graph-usage',
  data: [],
  formatter: function (y) { return "$ " +  y},
  xkey: 'date',
  ykeys: ['value'],
  xLabelFormat: function (date) { return moment(date).format("MMM D"); },
  xLabels:'day',
  labels: ['Savings'],
  hideHover: true,
  preUnits:'$',
  gridTextSize: 11,
  hoverCallback: function (index, options, content, row) {
    return '<div class="hover-title">' + moment(row.date).format("dddd, MMMM Do") + '</div>' +
    '<b style="color:' + options.lineColors[0] + '">' + '$'+row.value.toLocaleString() + " </b><span>" + options.labels[0] + "</span>";
  }
});

var dchart = Morris.Donut({
  element: 'graph-overview',
  data: [{"label":"0","value":0}],
  formatter: function (x) { return x + " "}
});

$('ul.line a').click(function(e){
    e.preventDefault();
    var el = $(this);
    days = el.attr('data-range');
    org = el.attr('data-organization');
    //type = el.attr('data-type');
    requestData(days, org, chart, 1);
});

$('ul.donut a').click(function(e){
    e.preventDefault();
    var el = $(this);
    days = el.attr('data-range');
    org = el.attr('data-organization');
    //type = el.attr('data-type');
    requestData(days, org, dchart, 2);
});




