/**
 * 
 */
(function($){
//	$(document).ready(function(){
//			$.ajax({
//				url : $("#site_url").text()+"/Training",
//				type : "POST",
//				dataType : "json",
//				data : {
//					Message : 1
//				},
//				success : function(Msg) {
//					var result="";
//					$.each(Msg,function(i,item){
//						result+=item.userid;
//					})
//					alert(result);
//				},
//				error : function() {
//					alert("ERROR");
//				}
//			});
//
//	});
	
	$(document).ready(function(){
		$.ajax({
			url : $("#site_url").text()+"/Training?userid=1",
			type : "GET",
			dataType : "json",
			success : function(Msg) {
	            array_x=[];
	            array_y1=[];
	            array_y2=[];
				$.each(Msg,function(i,item){
					array_x.push(item.date);
					array_y1.push(parseFloat(item.moveKm));
					array_y2.push(parseFloat(item.sleepHour));
				})

		        var myChart = echarts.init(document.getElementById('main1'));

		        // ָ��ͼ��������������
		        var option = {
		            title: {
		                text: 'walk distance of this week'
		            },
		            tooltip: {},
		            legend: {
		                data:['KM','HOUR']
		            },
		            xAxis: {
		                data: array_x,
		            },
		            yAxis: {},
		            series: [{
		                name: 'KM',
		                type: 'bar',
		                data: array_y1,
		            		},{
		                name: 'HOUR',
		                type: 'bar',
		                data: array_y2,
		                    }]
		        };

		        // ʹ�ø�ָ�����������������ʾͼ��
		        myChart.setOption(option);
			},
			error : function() {
				alert("ERROR");
			}
		});
	});	
	//�̶�tag
	$(document).ready(function(){
		// ָ���ĸ߶ȣ�������ඥ������+������߶�+����ҳ��ĸ߶�
		var sideTop = $("#sidebar").offset().top + $("#sidebar").height()
				+ $(window).height();
		var scTop = function() {
			if (typeof window.pageYOffset != 'undefined') {
				return window.pageYOffset;
			} else if (typeof document.compatMode != 'undefined'
					&& document.compatMode != 'BackCompat') {
				return document.documentElement.scrollTop
			} else if (typeof document.body != 'undefined') {
				return document.body.scrollTop;
			}
		}

		$(window)
				.scroll(
						function() {
							if (scTop() > sideTop) {
								if ($("#fixed-siderbar").length == 0) {
									// ������Ҫ��ʾ��ģ�飬���Ʋ�����еı�ǩ�����ݣ�׷�ӵ�������ĵײ�
									var tag = $("#tag_cloud-2 .widget-wrap")
											.clone().html();
									var html = "<div id='fixed-siderbar'><div id='fixed-wrap'><div id='fixedTag' class='widget  widget_tag_cloud' >"
											+ tag + "</div></div></div>"
									$("#sidebar").append(html);
								} else {
									$("#fixed-siderbar").show();
								}
							} else {
								$("#fixed-siderbar").hide();
							}
							;
						});
	});
})(this.jQuery);
