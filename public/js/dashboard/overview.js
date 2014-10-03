Morris.Area({
  element: 'graph-sales',
  data: [
  { y: '01', a: 100 },
  { y: '02', a: 75},
  { y: '03', a: 50},
  { y: '04', a: 75},
  { y: '05', a: 50},
  { y: '06', a: 75},
  { y: '07', a: 100 }
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Series A']
});

Morris.Donut({
  element: 'graph-sales-item',
  data: [
  {value: 70, label: 'foo'},
  {value: 15, label: 'bar'},
  {value: 10, label: 'baz'},
  {value: 5, label: 'A really really long label'}
  ],
  formatter: function (x) { return x + "%"}
}).on('click', function(i, row){
  console.log(i, row);
});
