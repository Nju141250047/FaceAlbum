/**
 * 
 */
(function($){
	$(document).ready(function(){
		$("button.btn-primary").click(function() {
			var $id = $(this).parent().parent("tr").children("td").eq(0).text();
			var $tbodyid= $(this).parents("tbody").attr("id");
			var $url;
			if($tbodyid=="tbody01"){
				$url=$("#site_url").text()+"/Management/delete_user";
			}
			if($tbodyid=="tbody02"){
				$url=$("#site_url").text()+"/Management/delete_activity";
			}
			if($tbodyid=="tbody03"){
				$url=$("#site_url").text()+"/Management/delete_circle";
			}
			if($tbodyid=="tbody04"){
				$url=$("#site_url").text()+"/Management/delete_topic";
			}
			if($tbodyid=="tbody05"){
				$url=$("#site_url").text()+"/Management/delete_news";
			}
			$.ajax({
				url : $url,
				type : "POST",
				dataType : "text",
				data : {
					Message : $id
				},
				success : function(Msg) {
					var result="";
					$.each(Msg,function(i,item){
					result+=item.result;
					})
					alert(result);
				},
				error : function() {
//					alert("error");
				}
			});
			window.location.reload();//ˢ�µ�ǰҳ��.
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
