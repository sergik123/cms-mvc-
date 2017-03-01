window.onload=function(){

	document.getElementById('chg_public').onclick=function(){
		
		if(document.getElementById('btn_public').style.display=="none"){
			document.getElementById('btn_public').style.display="block";
			document.getElementById('chg_public').value="^";	
		}else{
			document.getElementById('btn_public').style.display="none";
			document.getElementById('chg_public').value="v";
		}
	}
	
	document.getElementById('bold').onclick=function(){
		if(document.getElementById('bold').value=="b"){
			document.getElementById('page_content').value+="<strong>";
			document.getElementById('bold').value="/b";
		}else{
			document.getElementById('page_content').value+="</strong>";
			document.getElementById('bold').value="b";
		}
	}

	document.getElementById('em').onclick=function(){
		if(document.getElementById('em').value=="i"){
			document.getElementById('page_content').value+="<em>";
			document.getElementById('em').style.fontStyle="normal";
			document.getElementById('em').value="/i";
		}else{
			document.getElementById('page_content').value+="</em>";
			document.getElementById('em').style.fontStyle="oblique";
			document.getElementById('em').value="i";
		}
	}

	document.getElementById('quote').onclick=function(){
		if(document.getElementById('quote').value=="quote"){
			document.getElementById('page_content').value+="<blockquote>";
			document.getElementById('quote').value="/quote";
		}else{
			document.getElementById('page_content').value+="</blockquote>";
			document.getElementById('quote').value="quote";
		}
	}

	document.getElementById('del').onclick=function(){
		if(document.getElementById('del').value=="del"){
			document.getElementById('page_content').value+="<del>";
			document.getElementById('del').value="/del";
		}else{
			document.getElementById('page_content').value+="</del>";
			document.getElementById('del').value="del";
		}
	}

	document.getElementById('ins').onclick=function(){
		if(document.getElementById('ins').value=="ins"){
			document.getElementById('page_content').value+="<ins>";
			document.getElementById('ins').value="/ins";
		}else{
			document.getElementById('page_content').value+="</ins>";
			document.getElementById('ins').value="ins";
		}
	}

	document.getElementById('ul').onclick=function(){
		if(document.getElementById('ul').value=="ul"){
			document.getElementById('page_content').value+="<ul>";
			document.getElementById('ul').value="/ul";
		}else{
			document.getElementById('page_content').value+="</ul>";
			document.getElementById('ul').value="ul";
		}
	}

	document.getElementById('ol').onclick=function(){
		if(document.getElementById('ol').value=="ol"){
			document.getElementById('page_content').value+="<ol>";
			document.getElementById('ol').value="/ol";
		}else{
			document.getElementById('page_content').value+="</ol>";
			document.getElementById('ol').value="ol";
		}
	}

	document.getElementById('li').onclick=function(){
		if(document.getElementById('li').value=="li"){
			document.getElementById('page_content').value+="<li>";
			document.getElementById('li').value="/li";
		}else{
			document.getElementById('page_content').value+="</li>";
			document.getElementById('li').value="li";
		}
	}

		document.getElementById('add_link').onclick=function(){	
			var url=document.getElementById('url').value;
			var link_text=document.getElementById('link_txt').value;
			var check="";
			if(document.getElementById('chk_new').checked){
					check='target="_blank"';
			}
			document.getElementById('page_content').value+="<a href="+'"'+url+'"'+" "+check+" >"+link_text+"</a>";
		}

		document.getElementById('add_img').onclick=function(){	
			var url_img=document.getElementById('url_img').value;
			var link_img=document.getElementById('link_img').value;
			document.getElementById('page_content').value+="<img src="+'"'+url_img+'"'+" alt="+'"'+link_img+'"'+" />";
		}
		

}