/**
 * 
 */
(function($){
	$(document).ready(function(){
		$("button.btn").click(function() {
			var $friendid = $(this).parent().parent("tr").children("td").eq(0).text();
			var $status=$(this).parent().parent("tr").children("td").eq(3).text();
			if($status=="delete"){
				$.ajax({
					url : $("#site_url").text()+"/Friend/delete_friend",
					type : "POST",
					dataType : "json",
					data : {
						Message : $friendid
					},
					success : function(Msg) {
						var result="";
						$.each(Msg,function(i,item){
							result+=item.result;
						})
						alert(result);
						$status="deleted";
					},
					error : function() {
						alert("You have not this friend");
					}
				});
			}
			$(this).parent().parent("tr").children("td").eq(3).text($status);
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