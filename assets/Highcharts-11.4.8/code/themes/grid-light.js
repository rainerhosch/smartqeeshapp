!/**
 * Highcharts JS v11.4.8 (2024-08-29)
 *
 * (c) 2009-2024 Torstein Honsi
 *
 * License: www.highcharts.com/license
 */function(e){"object"==typeof module&&module.exports?(e.default=e,module.exports=e):"function"==typeof define&&define.amd?define("highcharts/themes/grid-light",["highcharts"],function(t){return e(t),e.Highcharts=t,e}):e("undefined"!=typeof Highcharts?Highcharts:void 0)}(function(e){"use strict";var t=e?e._modules:{};function o(t,o,s,i){t.hasOwnProperty(o)||(t[o]=i.apply(null,s),"function"==typeof CustomEvent&&e.win.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:o,module:t[o]}})))}o(t,"Extensions/Themes/GridLight.js",[t["Core/Defaults.js"],t["Core/Utilities.js"]],function(e,t){var o,s;let{setOptions:i}=e,{createElement:n}=t;return(s=o||(o={})).options={colors:["#7cb5ec","#f7a35c","#90ee7e","#7798BF","#aaeeee","#ff0066","#eeaaee","#55BF3B","#DF5353","#7798BF","#aaeeee"],chart:{backgroundColor:null,style:{fontFamily:"Dosis, sans-serif"}},title:{style:{fontSize:"16px",fontWeight:"bold",textTransform:"uppercase"}},tooltip:{borderWidth:0,backgroundColor:"rgba(219,219,216,0.8)",shadow:!1},legend:{backgroundColor:"#F0F0EA",itemStyle:{fontWeight:"bold",fontSize:"13px"}},xAxis:{gridLineWidth:1,labels:{style:{fontSize:"12px"}}},yAxis:{minorTickInterval:"auto",title:{style:{textTransform:"uppercase"}},labels:{style:{fontSize:"12px"}}},plotOptions:{candlestick:{lineColor:"#404048"}}},s.apply=function(){n("link",{href:"https://fonts.googleapis.com/css?family=Dosis:400,600",rel:"stylesheet",type:"text/css"},null,document.getElementsByTagName("head")[0]),i(s.options)},o}),o(t,"masters/themes/grid-light.src.js",[t["Core/Globals.js"],t["Extensions/Themes/GridLight.js"]],function(e,t){return e.theme=t.options,t.apply(),e})});