/*==================================================
	     ACCORDTION
==================================================*/
ddaccordion.init({
	headerclass: "ask", 
	contentclass: "question", 
	revealtype: "click", 
	mouseoverdelay: 200, 
	collapseprev: true, 
	defaultexpanded: [], 
	onemustopen: false, 
	animatedefault: false,
	persiststate: false, 
	toggleclass: ["closedquestion", "openquestion"], 
	togglehtml: ["prefix", "", ""], 
	animatespeed: "fast", 
	oninit:function(expandedindices){ 
	},
	onopenclose:function(header, index, state, isuseractivated){ 		
	}
})
