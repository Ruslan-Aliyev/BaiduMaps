<?php 
?>
<html>
<head>
<title>Badiu Map Test</title>

<script src="./js/jquery.js"></script>
<script type="text/javascript" src="//api.map.baidu.com/api?v=2.0&ak=LN5aYn5dUbwPXNkOGIKpBG03pUw1bOyA"></script>
<style>
body {
	margin: 0;
}
#allmap{
	width: 100%;
	height: 100%;
	padding: 0;
	margin: 0;
	overflow: hidden;
}
</style>
</head>

<body>
<div id="allmap"></div>
<script>
// 百度地图API功能
var map = new BMap.Map("allmap");
var point = new BMap.Point(114.1861241,22.29358599);
map.centerAndZoom(point,15);
map.enableScrollWheelZoom(true);

var geolocation = new BMap.Geolocation();
geolocation.getCurrentPosition(function(r){
	if(this.getStatus() == BMAP_STATUS_SUCCESS){
		var mk = new BMap.Marker(r.point);
		map.addOverlay(mk);
		// map.panTo(r.point, 17);
		map.centerAndZoom(new BMap.Point(r.point.lng, r.point.lat), 17);
		// map.centerAndZoom(r.point, 19);
		alert('Position: '+r.point.lng+','+r.point.lat);
	}
	else {
		alert('failed'+this.getStatus());
	}        
},{enableHighAccuracy: true})
//关于状态码
//BMAP_STATUS_SUCCESS	检索成功。对应数值“0”。
//BMAP_STATUS_CITY_LIST	城市列表。对应数值“1”。
//BMAP_STATUS_UNKNOWN_LOCATION	位置结果未知。对应数值“2”。
//BMAP_STATUS_UNKNOWN_ROUTE	导航结果未知。对应数值“3”。
//BMAP_STATUS_INVALID_KEY	非法密钥。对应数值“4”。
//BMAP_STATUS_INVALID_REQUEST	非法请求。对应数值“5”。
//BMAP_STATUS_PERMISSION_DENIED	没有权限。对应数值“6”。(自 1.1 新增)
//BMAP_STATUS_SERVICE_UNAVAILABLE	服务不可用。对应数值“7”。(自 1.1 新增)
//BMAP_STATUS_TIMEOUT	超时。对应数值“8”。(自 1.1 新增)


// 用经纬度设置地图中心点
function theLocation(lng, lat){
	map.clearOverlays(); 
	var new_point = new BMap.Point(lng,lat);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);      
}
</script>
</body>
</html>