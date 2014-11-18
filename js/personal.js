$(function(){
	//setup
	var vg = $("#grid-content").vgrid({
		easing: "easeOutQuint",
		useLoadImageEvent: true,
		useFontSizeListener: true,
		time: 400,
		delay: 20,
		wait: 500,
		fadeIn: {
			time: 500,
			delay: 50
		},
		onStart: function(){
			$("#message1")
				.stop()
				.css("visibility", "visible")
				.fadeOut("slow",function(){
					$(this).show().css("visibility", "hidden");
				});
		},
		onFinish: function(){
			$("#message2")
				.stop()
				.css("visibility", "visible")
				.fadeOut("slow",function(){
					$(this).show().css("visibility", "hidden");
				});
		}
	});
	$(window).load(function(e){
		vg.vgrefresh();
	});

	//show
	$("#grid-addlist").on('click', 'li', function(e){
		var self = $(this);
		var key = self.attr("id").split("-")[1];
		self.hide();
		$("#grid-"+key).stop().show().fadeTo(300, 1);
		vg.vgrefresh();
	});

	//hide
	$("#grid-content").on('click', 'a', function(e){
		var self = $(this).parent().parent();
		var key = self.attr("id").split("-")[1];
		self.stop().fadeOut(200, function(){
			vg.vgrefresh();
		});
		$("#list-"+key).show();
		return false;
	});

	//add new item
	$("#additem").click(function(e){
		var height = Math.max(30, Math.min(300, Math.round(Math.random()*300)));
		var key = $.now();
		var list = $('<li>Add "'+ key +'"</li>').attr("id", "list-"+key).hide();
		var item = $('<div>\
				<h3>'+key+'</h3>\
				<p><img src="http://dummyimage.com/150x'+ height +'" alt="dummy" /></p>\
				<p><a href="#">DELETE</a></p>\
			</div>')
			.attr("id", "grid-"+key)
			.stop()
			.fadeTo(0, 0);
		$("#grid-addlist").prepend(list);
		$("#grid-content").prepend(item);
		vg.vgrefresh(null, null, null, function(){
			item.stop().fadeTo(300, 1);
		});
	});
   //Drag and Drop Sort
	var currentBox;
	var hitBox;
	function hitTest(tg, page_x, page_y){
		var current = tg.get(0);
		var root = $("body").get(0);
		var x = 0, y = 0, w = tg.width(), h = tg.height(), c;
		while(current !== root){
			c = $(current);
			x += c.position().left;
			y += c.position().top;
			current = c.parent().get(0);
		}
		if(x <= page_x && page_x <= x + w
				&& y <= page_y && page_y <= y + h){
			return true;
		}
		return false;
	}
    
    /*
    	$("#grid-content")
		.on("mouseover", "> div", function(e){
			e.preventDefault();
			$(e.currentTarget).css({"cursor":"move"});
		})
		.on("mouseout", "> div", function(e){
			e.preventDefault();
			$(e.currentTarget).css({"cursor":"auto"});
		})
		.on("mousedown", "> div", function(e){
			e.preventDefault();
			var self = $(e.currentTarget);
			self.data("clone", self.clone(false).css({"opacity": 0.5, "z-index": 99999}).addClass("clone").insertAfter(self));
			self.data("clone_pos", [self.position().left, self.position().top]);
			self.data("clone_mouse", [e.pageX, e.pageY]);
			currentBox = self;
		});
    
    */
    $(document)
		.on("mousemove", function(e){
			if(currentBox){
				e.preventDefault();
				hitBox = null;
				var box = $("#grid-content");
				if(hitTest(box, e.pageX, e.pageY)){
					hitBox = box;
				}
				box.find("> div").removeClass("hit").each(function(num){
					var self = $(this);
					if(self.hasClass("clone")) return true;
					if(hitTest(self, e.pageX, e.pageY)){
						self.addClass("hit");
						hitBox = self;
					}
				});
				var base = currentBox.data("clone_pos");
				var current = [e.pageX, e.pageY];
				var def = currentBox.data("clone_mouse");
				currentBox.data("clone").css({
					left: current[0] - def[0] + base[0],
					top: current[1] - def[1] + base[1]
				});
			}
		})
		.on("mouseup", function(e){
			if(currentBox){
				e.preventDefault();
				currentBox.data("clone").remove();
				currentBox.data("clone", null);
				var box = $("#grid-content");
				box.find("> div").removeClass("hit");
				if(hitBox && currentBox.get(0) !== hitBox.get(0)){
					if(box.get(0) === hitBox.get(0)){
						box.append(currentBox);
					}else{
						currentBox.insertBefore(hitBox);
					}
					vg.vgrefresh();
				}
				currentBox = null;
				hitBox = null;
			}
		});
});