/*  
    --------------------------------------------------------------------------
	Code for link-hover text boxes
	Original: Mike McGrath (Web Site: http://website.lineone.net/~mike_mcgrath) 
	modified by Nicolas Hoening (Web Site: http://nicolashoening.de)
    Works only if the BrowserDetect script has run before (http://dithered.chadlindstrom.ca/javascript/browser_detect)
    --------------------------------------------------------------------------
*/

var iex = browser.isIE || browser.isOpera; // opera has a similar engine to IE
var nav = (document.layers);
var old = browser.isNS && (!document.layers && !document.getElementById);
var n_6 = browser.isNS6up;
var op = browser.isOpera; // this is only opera
if (browser.isSafari || browser.isFirefox || browser.isMozilla || browser.isKonqueror || browser.isGecko) n_6 = true; //they work the same for this

// create the popup box - inline so everyone, including Opera, will tell the width
document.write('<div id="pup" style="visibility:hidden;display:inline;"></div>');

var skin = null		// this is the style of our popup we'll modify

var minMarginToBorder = 15;	// set how much minimal space there should be to
							// the next border (horizontally)
var popwidth = 0;   // this is how wide your popup is, we'll read it
							// from the stylesheet later, so keep this as-is

// initialize the capture pointer
if(nav) document.captureEvents(Event.MOUSEMOVE);
if(n_6) document.addEventListener("mousemove", get_mouse, true);
if(nav || iex) document.onmousemove = get_mouse;


// assign style object when not already known
function assignSkin() {
	if(nav) skin = document.pup;
	if(iex) skin = document.getElementById('pup').style;
	if(n_6) skin = document.getElementById("pup").style;
}
  
//getting the popwidth - we'll get this only once, too! 
//Then it will always have the stylesheet value
function assignPopWidth(){
  	if (iex && !op) popwidth = parseInt(document.getElementById("pup").currentStyle.width);
	if (op)  popwidth = parseInt(document.defaultView.getComputedStyle(document.getElementById('pup'),null).width);
	if (n_6)  popwidth = parseInt(document.defaultView.getComputedStyle(document.getElementById("pup"),null).getPropertyValue('width'));
	//skin.display = "none";	//turn "inline" off now, it widens the page horizontally when the parked popup is positioned
}

// set dynamic coords when the mouse moves
function get_mouse(e)
{
    
  var x,y;
  var scroll_x_y = getScrollXY();
  
  
  //get X
  if (iex) x = scroll_x_y[0] + event.clientX;
  if (nav || n_6) x = e.pageX;

  //get Y
  if (iex) y = scroll_x_y[1] + event.clientY;
  if (nav || n_6) y = e.pageY;
  
  if (popwidth == 0) assignPopWidth();
  if (null === skin) assignSkin();
  
  
  x += 10; // important: if the popup is where the mouse is, the hoverOver/hoverOut events flicker
  
  
  var x_y = nudge(x,y); // avoids edge overflow
  if (isNaN(x_y[0])) x_y[0] = 0;
  if (isNaN(x_y[1])) x_y[1] = 0;
  
  //now set coordinates for our popup - n_6 wants "px", the others not
  //remember: the popup is still hidden
  if(nav || iex) {
	  skin.left = x_y[0];
	  skin.top = x_y[1];
  }else if(n_6){
	  skin.left = x_y[0] + "px";
	  skin.top = x_y[1] + "px";
  }
}

// avoid edge overflow
function nudge(x,y)
{
  var dims = getInnerWindowDimensions();
  scroll_x_y = getScrollXY();
  
  // right
  var xtreme = dims[0] - popwidth - minMarginToBorder;
  if (n_6 || nav) xtreme -= 25;
  if(x > xtreme) {
	x -= (parseInt(popwidth) + minMarginToBorder + 20 );
  }

  // left - should almost never be a problem - we're drawing the window 
  // to the right of the mouse per default (maybe corrected by the code above
  // but then this has the last horizontal word)
  if(x < 1) x -=  x - 1;

  // down - when the mouse is too close to the bottom, move it up.
  // I estimate the lines that fit in the width, assuming (a little pessimisticly) 
  // a char width of 15 pixels and a line height of 20 (That should work for most cases)
  // Unfortunately, I cannot read margin and padding to get even better values, 
  // since JS can only read what is set before itself, apparently. This works quite well 
  // with a padding of 5px.
  est_lines = parseInt(document.getElementById("pup").innerHTML.length / (parseInt(skin.width)/15) );
  est_lines_to_decide = max(est_lines,2);
  if((y + parseInt(est_lines_to_decide * 20)) > (dims[1] + scroll_x_y[1])) {
    y -= parseInt(est_lines * 20) + 20;
  }
  
  return [ x, y ];
}

// write content and display
function popup(msg)
{
  if (popwidth === 0) assignPopWidth();
  if (null === skin) assignSkin();
  
  if (null !== skin) { // maybe the browser isn't ready
	  if(old) {	//display plain message box for old browsers
		alert(msg);
		return;
	  }
	  
	  if (!isNaN(popwidth)) { // fallback behaviour (for sthg that has been observed in IE7)
		if(iex || nav)  skin.width = popwidth;
		if(n_6)  skin.width = popwidth + "px";
	  } else {
		if(iex || nav)  skin.width = 300;
		if(n_6)  skin.width = 300 + "px";
	  }
					
	  //write the message in
	  if(nav) { 
		skin.document.open();
		skin.document.write(msg);
		skin.document.close();
	  }
	  document.getElementById("pup").innerHTML = msg;
	  
	  //make the popup visible
	  skin.visibility ="visible";
	  skin.display = "inline";
  }
}

// make content box invisible
function kill()
{
  if(!old) {
    skin.visibility = "hidden";	//invisible
	skin.display = "none";	//invisible
  }
}

function getScrollXY() {
  var scrOfX = 0, scrOfY = 0;
  if( typeof( window.pageYOffset ) == 'number' ) {
    //Netscape compliant
    scrOfY = window.pageYOffset;
    scrOfX = window.pageXOffset;
  } else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) {
    //DOM compliant
    scrOfY = document.body.scrollTop;
    scrOfX = document.body.scrollLeft;
  } else if( document.documentElement && ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) {
    //IE6 standards compliant mode
    scrOfY = document.documentElement.scrollTop;
    scrOfX = document.documentElement.scrollLeft;
  }
  return [ scrOfX, scrOfY ];
}

function getInnerWindowDimensions(){
	var A;
	if (window.innerHeight !== undefined) A = [window.innerWidth,window.innerHeight]; // most browsers
	else{ // IE varieties
	  var D = (document.documentElement.clientWidth == 0)? document.body: document.documentElement;
	  A = [D.clientWidth,D.clientHeight];
	}
	return A;
}

function max(a,b){
    if (a>b) return a;
    else return b;
}