			function getRandomColor() {
				var letters = "0123456789ABCDEF";
				var color = "#";
				for(var i=0 ; i<6 ; i++) {
					color += letters[Math.floor(Math.random()*16)];
				}
				return(color);
			}
			function getRandomSize() {
				var len = Math.floor(Math.random()*90) + 100;
				return(len);
			}
			function getRandomYPos() {
				var top = Math.floor(Math.random()*300) + 100;
				return(top);
			}
			function getRandomXPos() {
				var left = Math.floor(Math.random()*900) + 169; 
				return(left);
			}
			function getRandomShape(len) {
				shape = Math.floor(Math.random()*2);
				if( shape == 1 ) {		 						//Circle
					borderRadius = (len/2);
				}
				else {										//Square
					borderRadius = 0;
				}
				return(borderRadius);
			}
			var start = 0;
			var elapsed = 0;
			function draw() {
				document.getElementById("draw").style.position = "absolute";
				document.getElementById("draw").style.left = getRandomXPos()+"px";
				document.getElementById("draw").style.top = getRandomYPos()+"px";
				var len = getRandomSize();
				document.getElementById("draw").style.height = len+"px";
				document.getElementById("draw").style.width = len+"px";
				document.getElementById("draw").style.borderRadius = getRandomShape(len)+"px";
				document.getElementById("draw").style.backgroundColor = getRandomColor();
			      /*alert("XPos "+getRandomXPos()+"px "+"YPos "+getRandomYPos()+"px "+"Len "+len+"px "+"Radius "+getRandomShape(len)+"px "+"Color "+getRandomColor());*/
				start = new Date().getTime();
			}
			document.getElementById("draw").onclick = function() {
				elapsed = new Date().getTime() - start;			//****time from drawing to click
				document.getElementById("time").innerHTML = "Your time:"+elapsed/1000+"sec.";
				draw();							//used to create next shape.		
			}
			draw();								// used to call 1st time only.
			document.getElementById("draw").onmousedown = function() {	
			}
