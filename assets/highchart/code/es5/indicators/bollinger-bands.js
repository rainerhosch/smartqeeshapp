/*
 Highstock JS v11.1.0 (2023-06-05)

 Indicator series type for Highcharts Stock

 (c) 2010-2021 Pawe Fus

 License: www.highcharts.com/license
*/
'use strict';(function(a){"object"===typeof module&&module.exports?(a["default"]=a,module.exports=a):"function"===typeof define&&define.amd?define("highcharts/indicators/bollinger-bands",["highcharts","highcharts/modules/stock"],function(h){a(h);a.Highcharts=h;return a}):a("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(a){function h(a,f,d,h){a.hasOwnProperty(f)||(a[f]=h.apply(null,d),"function"===typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:f,
module:a[f]}})))}a=a?a._modules:{};h(a,"Stock/Indicators/MultipleLinesComposition.js",[a["Core/Series/SeriesRegistry.js"],a["Core/Utilities.js"]],function(a,f){var d=a.seriesTypes.sma.prototype,h=f.defined,n=f.error,r=f.merge,k;(function(a){function w(b){return"plot"+b.charAt(0).toUpperCase()+b.slice(1)}function x(b,g){var a=[];(b.pointArrayMap||[]).forEach(function(b){b!==g&&a.push(w(b))});return a}function c(){var b=this,g=b.linesApiNames,a=b.areaLinesNames,c=b.points,l=b.options,f=b.graph,u={options:{gapSize:l.gapSize}},
e=[],t=x(b,b.pointValKey),m=c.length,k;t.forEach(function(b,a){for(e[a]=[];m--;)k=c[m],e[a].push({x:k.x,plotX:k.plotX,plotY:k[b],isNull:!h(k[b])});m=c.length});if(b.userOptions.fillColor&&a.length){var q=t.indexOf(w(a[0]));q=e[q];a=1===a.length?c:e[t.indexOf(w(a[1]))];t=b.color;b.points=a;b.nextPoints=q;b.color=b.userOptions.fillColor;b.options=r(c,u);b.graph=b.area;b.fillGraph=!0;d.drawGraph.call(b);b.area=b.graph;delete b.nextPoints;delete b.fillGraph;b.color=t}g.forEach(function(a,g){e[g]?(b.points=
e[g],l[a]?b.options=r(l[a].styles,u):n('Error: "There is no '+a+' in DOCS options declared. Check if linesApiNames are consistent with your DOCS line names."'),b.graph=b["graph"+a],d.drawGraph.call(b),b["graph"+a]=b.graph):n('Error: "'+a+" doesn't have equivalent in pointArrayMap. To many elements in linesApiNames relative to pointArrayMap.\"")});b.points=c;b.options=l;b.graph=f;d.drawGraph.call(b)}function u(b){var a,c=[];b=b||this.points;if(this.fillGraph&&this.nextPoints){if((a=d.getGraphPath.call(this,
this.nextPoints))&&a.length){a[0][0]="L";c=d.getGraphPath.call(this,b);a=a.slice(0,c.length);for(var e=a.length-1;0<=e;e--)c.push(a[e])}}else c=d.getGraphPath.apply(this,arguments);return c}function e(b){var a=[];(this.pointArrayMap||[]).forEach(function(c){a.push(b[c])});return a}function t(){var b=this,a=this.pointArrayMap,c=[],e;c=x(this);d.translate.apply(this,arguments);this.points.forEach(function(g){a.forEach(function(a,d){e=g[a];b.dataModify&&(e=b.dataModify.modifyValue(e));null!==e&&(g[c[d]]=
b.yAxis.toPixels(e,!0))})})}var k=[],q=["bottomLine"],A=["top","bottom"],B=["top"];a.compose=function(a){if(f.pushUnique(k,a)){var b=a.prototype;b.linesApiNames=b.linesApiNames||q.slice();b.pointArrayMap=b.pointArrayMap||A.slice();b.pointValKey=b.pointValKey||"top";b.areaLinesNames=b.areaLinesNames||B.slice();b.drawGraph=c;b.getGraphPath=u;b.toYData=e;b.translate=t}return a}})(k||(k={}));return k});h(a,"Stock/Indicators/BB/BBIndicator.js",[a["Stock/Indicators/MultipleLinesComposition.js"],a["Core/Series/SeriesRegistry.js"],
a["Core/Utilities.js"]],function(a,f,d){var h=this&&this.__extends||function(){var a=function(d,c){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,c){a.__proto__=c}||function(a,c){for(var e in c)Object.prototype.hasOwnProperty.call(c,e)&&(a[e]=c[e])};return a(d,c)};return function(d,c){function f(){this.constructor=d}if("function"!==typeof c&&null!==c)throw new TypeError("Class extends value "+String(c)+" is not a constructor or null");a(d,c);d.prototype=null===c?Object.create(c):
(f.prototype=c.prototype,new f)}}(),n=f.seriesTypes.sma,r=d.extend,k=d.isArray,v=d.merge;d=function(a){function d(){var c=null!==a&&a.apply(this,arguments)||this;c.data=void 0;c.options=void 0;c.points=void 0;return c}h(d,a);d.prototype.init=function(){f.seriesTypes.sma.prototype.init.apply(this,arguments);this.options=v({topLine:{styles:{lineColor:this.color}},bottomLine:{styles:{lineColor:this.color}}},this.options)};d.prototype.getValues=function(a,d){var c=d.period,h=d.standardDeviation,n=[],
q=[],r=a.xData,u=(a=a.yData)?a.length:0,b=[],g;if(!(r.length<c)){var w=k(a[0]);for(g=c;g<=u;g++){var y=r.slice(g-c,g);var l=a.slice(g-c,g);var p=f.seriesTypes.sma.prototype.getValues.call(this,{xData:y,yData:l},d);y=p.xData[0];p=p.yData[0];for(var v=l.length,z=0,x=0;z<v;z++){var m=(w?l[z][d.index]:l[z])-p;x+=m*m}m=Math.sqrt(x/(v-1));l=p+h*m;m=p-h*m;b.push([y,l,p,m]);n.push(y);q.push([l,p,m])}return{values:b,xData:n,yData:q}}};d.defaultOptions=v(n.defaultOptions,{params:{period:20,standardDeviation:2,
index:3},bottomLine:{styles:{lineWidth:1,lineColor:void 0}},topLine:{styles:{lineWidth:1,lineColor:void 0}},tooltip:{pointFormat:'<span style="color:{point.color}">\u25cf</span><b> {series.name}</b><br/>Top: {point.top}<br/>Middle: {point.middle}<br/>Bottom: {point.bottom}<br/>'},marker:{enabled:!1},dataGrouping:{approximation:"averages"}});return d}(n);r(d.prototype,{areaLinesNames:["top","bottom"],linesApiNames:["topLine","bottomLine"],nameComponents:["period","standardDeviation"],pointArrayMap:["top",
"middle","bottom"],pointValKey:"middle"});a.compose(d);f.registerSeriesType("bb",d);"";return d});h(a,"masters/indicators/bollinger-bands.src.js",[],function(){})});
//# sourceMappingURL=bollinger-bands.js.map