drag_obj={
	dragWebchat: function (obj){ //小图标拖动
		obj.css({left:$(window).width()-70,top:$(window).height()-200});
		var oDrag = $(obj).get(0); 
		oDrag.ontouchstart = function (event){
			var touch = event.targetTouches[0]; 
			disX = touch.pageX - this.offsetLeft;
			disY = touch.pageY - this.offsetTop;
			document.ontouchmove = function (event){
				var touch = event.targetTouches[0];
				var iL = touch.pageX - disX ;
				var iT = touch.pageY - disY;
				if(iL < 0){
					iL = 0;
				} else if(iL > $(window).width()-obj.width()) {
					iL = $(window).width()-obj.width();
				}
				if(iT < 0){
					iT = 0;
				}
				oDrag.style.left = iL + "px";
				oDrag.style.top = iT  + "px";
				return false;
			};
			oDrag.ontouchend = function (){			
				document.ontouchmove = null;
				document.ontouchend = null;
				oDrag.releaseCapture && oDrag.releaseCapture()
			};
		}
	}
}