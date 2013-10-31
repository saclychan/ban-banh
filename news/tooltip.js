// copyright by black_ttvn April 07 2010

// permission is granted to use this javascript provided that the below code is not altered

//***************** @Used to show cart info ********************
function pw() {
	return window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth
}; 
function mouseX(evt) {
	return evt.clientX ? evt.clientX + (document.documentElement.scrollLeft || document.body.scrollLeft) : evt.pageX;
} 
function mouseY(evt) {
	return evt.clientY ? evt.clientY + (document.documentElement.scrollTop || document.body.scrollTop) : evt.pageY
} 
function popUp(evt,oi) {
	if (document.getElementById) {
		var wp = pw(); 
		dm = document.getElementById(oi); 
		ds = dm.style; 
		st = ds.visibility; 
		if (dm.offsetWidth) ew = dm.offsetWidth; 
		else if (dm.clip.width) ew = dm.clip.width; 
		if (st == "visible" || st == "show") { 
			ds.visibility = "hidden"; 
		} else {
			tv = mouseY(evt) + 20; 
			lv = mouseX(evt) - (ew/4); 
			if (lv < 2) lv = 2; 
			else if (lv + ew > wp) lv = -ew/2; 
			lv += 'px';
			tv += 'px';  
			ds.left = lv; ds.top = tv; 
			ds.visibility = "visible";
		}
	}
}


//**************** @This follow code Used to show infomation abount book description ********************
// ham lay doi tuong
function getObject(event)
{
   var srcElem;
   if(ie)
   {
	  srcElem = event.srcElement;
   }
   else
   {
	  srcElem = event.target;	  
   }
   return srcElem;
}

function CallTips(event, description)
{
   var obj = getObject(event);
   // bat su kien de chuot tren IMG co class la img_tooltip
   if(obj.tagName == 'IMG' && obj.className == 'img_tooltip')
   {
       // xac dinh vi tri de chuot tren IMG 
      if( ie )
      {
        var scollbar = (document.compatMode && document.compatMode!="BackCompat") ? document.documentElement : document.body;
        offset_x = offset + scollbar.scrollTop + event.clientY + 'px';
        offset_y = offset + scollbar.scrollLeft + event.clientX + 'px';
		
      }
      else
      {
      offset_x = offset + event.pageY + 'px';
      offset_y = offset + event.pageX + 'px';
      }
      // thay doi noi dung  tooltip
       tooltip.innerHTML = description;

      // hien thi noi dung doi tuong tai vi tri mouse
      tooltip.style.top = offset_x;
      tooltip.style.left = offset_y;
      tooltip.style.display = 'inline';
	 
   }
}
function HidelTips(event)
{
   var obj = getObject(event);
   // bat su kien de chuot tren IMG có className là img_tooltip
   if(obj.tagName == 'IMG' && obj.className == 'img_tooltip')
   {
      tooltip.style.display = 'none';
   }
}

// -------End change code -------