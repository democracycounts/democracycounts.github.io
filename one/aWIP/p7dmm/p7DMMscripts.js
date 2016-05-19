
/* 
 ================================================
 PVII Drop Down Magic scripts
 Copyright (c) 2013-2015 Project Seven Development
 www.projectseven.com
 Version: 1.3.0 -build 40
 ================================================
 
*/

// define the image swap file naming convention

// rollover image for any image in the normal state
var p7DMMover='_over';

// image for any trigger that has an open panel -no rollover
var p7DMMopen='_down';

var p7DMMctl=[],p7DMMi=false,p7DMMa=false,p7DMMadv=[],p7DMMdy=(1000/100);
var p7DMM={
	ctl: [],
	defAnim: 1,
	defDuration: 1000, // was 1000
	status: false,
	once: false,
	body: null,
	prf: 'none',
	trsnd: '',
	animDelay: (1000/60)
};
function P7_DMMset(){
	var h,sh='',hd;
	if (!document.getElementById){
		return;
	}
	var pf=P7_DMMgetCSSPre();
	sh+='.p7dmm-sub-wrapper {overflow:hidden; height:0px;}\n';
	sh+='.p7DMM ul ul {position: relative;}\n';
	sh+='.p7DMM ul a {max-height: none;}\n';
	sh+='.p7DMM.dmm-vertical ul a {max-height: 700777px;}\n';
	sh+='.p7dmm-spcr {width:100%;display:none;background:none !important;}\n';
	sh+='.p7dmm-fixed {position:fixed !important;top:0; left:0; width:100%; z-index:9999999;}\n';
	sh+='@media only screen and (min-width: 0px) and (max-width: 700px) {';
	sh+='.p7DMM ul a {max-height: 700777px;}\n';
	sh+='.p7DMM li div li, .p7DMM li.open div li, .p7DMM li.open div li a {'+pf+'transform: none !important; '+pf+'transition: none !important;}\n';
	sh+='}\n';
	if (document.styleSheets){
		h='\n<st' + 'yle type="text/css">\n' + sh + '\n</s' + 'tyle>';
		document.write(h);
	}
	else{
		P7_DMMaddSheet(sh);
	}
}
P7_DMMset();
function P7_opDMM(){
	if(!document.getElementById){
		return;
	}
	p7DMMctl[p7DMMctl.length]=arguments;
}
function P7_DMMaddLoad(){
	if(!document.getElementById){
		return;
	}
	if(window.addEventListener){
		document.addEventListener("DOMContentLoaded",P7_initDMM,false);
		window.addEventListener("load",P7_initDMM,false);
		window.addEventListener("unload",P7_DMMrf,false);
		window.addEventListener("resize",P7_DMMrsz,false);
	}
	else if(window.attachEvent){
		document.write("<script id=p7ie_dmm defer src=\"//:\"><\/script>");
		document.getElementById("p7ie_dmm").onreadystatechange=function(){
			if(this.readyState=="complete"){
				if(p7DMMctl.length>0){
					P7_initDMM();
				}
			}
		};
		window.attachEvent("onload",P7_initDMM);
		window.attachEvent("onresize",P7_DMMrsz);
	}
}
P7_DMMaddLoad();
function P7_DMMrf(){
	return;
}
function P7_initDMM(){
	var i,j,k,x,tB,sD,tU,tD,tA,iM,s1,s2,sr,sh,cl,wns,dv,cl;
	if(p7DMMi){
		return;
	}
	p7DMMi=true;
	document.p7DMMpreload=[];
	p7DMM.body=document.body.parentNode;
	if(/KHTML|WebKit/i.test(navigator.userAgent) || P7_DMMgetIEver()==5 ){
		p7DMM.body=document.body;
	}
	wns=false;
	for(j=0;j<p7DMMctl.length;j++){
		tB=document.getElementById(p7DMMctl[j][0]);
		if(tB){
			tB.p7opt=p7DMMctl[j];
			tB.dmmTrigs=[];
			tB.dmmSubs=[];
			tB.dmmSubUL=[];
			tB.dmmDefaultPanel=0;
			tB.dmmStartTime=0;
			tB.dmmDuration=tB.p7opt[2];
			tB.dmmAnimType='quad';
			tB.dmmToolbarClosed=true;
			if(tB.p7opt[3]==1){
				dv=document.createElement('div');
				dv.setAttribute('id',tB.id.replace('_','spcr_'));
				dv.className=tB.className;
				P7_DMMsetClass(dv,'p7dmm-spcr');
				tB.parentNode.insertBefore(dv, tB.nextSibling);
				tB.dmmSpacer=dv;
				dv.dmmMenu=tB;
				if(!wns){
					wns=true;
					if(window.addEventListener){
						window.addEventListener('scroll', P7_DMMfixed, false);
					}
					else if (window.attachEvent){
						window.attachEvent('onscroll', P7_DMMfixed);
					}
				}
			}
			tD=document.getElementById(tB.id.replace('_','tb_'));
			tU=document.getElementById(tB.id.replace('_','u_'));
			if(tD && tU){
				tD.dmmDiv=tB.id;
				tB.dmmToolbar=tD;
				cl=tU.className;
				if(cl && cl!=='' && cl.indexOf('opened')>-1){
					tU.dmmState='open';
					tD.dmmState='open';
				}
				else{
					P7_DMMremClass(tD,'closed');
					P7_DMMremClass(tU,'closed');
					tB.dmmToolbarClosed=true;
					tU.dmmState='closed';
					tD.dmmState='closed';
				}
				tD.onclick=function(){
					var tD=document.getElementById(this.dmmDiv.replace('_','tb_'));
					var tU=document.getElementById(this.dmmDiv.replace('_','u_'));
					if(tU.dmmState=='open'){
						tD.dmmState='closed';
						tU.dmmState='closed';
						P7_DMMremClass(tD,'opened');
						P7_DMMsetClass(tD,'closed');
						P7_DMMremClass(tU,'opened');
						P7_DMMsetClass(tU,'closed');
					}
					else{
						tD.dmmState='open';
						tU.dmmState='open';
						P7_DMMremClass(tD,'closed');
						P7_DMMsetClass(tD,'opened');
						P7_DMMremClass(tU,'closed');
						P7_DMMsetClass(tU,'opened');
					}
				};
				tA=tD.getElementsByTagName('A');
				if(tA && tA[0]){
					tA[0].onclick=function(){
						return false;
					};
				}
			}
			tA=tB.getElementsByTagName('A');
			k=-1;
			var tH,wH=window.location.href;
			wH=wH.replace(window.location.hash,'');
			for(i=0;i<tA.length;i++){
				if(/dmm-ste/.test(tA[i].getAttribute('class'))){
					tH=tA[i].href;
					tH=tH.replace(tA[i].hash,'');
					if(tH==wH){
						tA[i].dmmSTE=true;
					}
				}
				if(tA[i].id && tA[i].id.indexOf(tB.id.replace('_','t'))===0 ){
					k++;
					tB.dmmTrigs[k]=tA[i];
					tA[i].dmmTrigNum=k+1;
					tB.dmmSubs[k]=null;
					tB.dmmSubUL[k]=null;
					tA[i].dmmDiv=tB.id;
					tA[i].dmmSub=false;
					tA[i].dmmState='closed';
					P7_DMMsetClass(tA[i],'closed');
					P7_DMMsetClass(tA[i].parentNode,'closed');
					if(!tB.dmmFirstA){
						tB.dmmFirstA=tA[i];
					}
					tA[i].onclick=function(){
						return P7_DMMclick(this);
					};
					if(tB.p7opt[6]==1){
						tA[i].onmouseover=function(){
							if(P7_DMMgetStyle(this,'maxHeight','max-height')=='700777px'){
								return;
							}
							var tB=document.getElementById(this.dmmDiv);
							if(tB.dmmMouseTimer){
								clearTimeout(tB.dmmMouseTimer);
							}
							if(this.dmmPointer){
								return;
							}
							tB.dmmMouseTimer=setTimeout("P7_DMMtrig('"+this.id+"')",250);
						};
						P7_DMMbindPointer(tA[i]);
					}
					tA[i].hasImg=false;
					iM=tA[i].getElementsByTagName("IMG");
					if(iM&&iM[0]){
						sr=iM[0].getAttribute("src");
						iM[0].dmmSwap=tB.p7opt[8];
						x=sr.lastIndexOf(".");
						s1=sr.substring(0,x)+p7DMMover+'.'+sr.substring(x+1);
						s2=sr.substring(0,x)+p7DMMopen+'.'+sr.substring(x+1);
						if(iM[0].dmmSwap==1){
							iM[0].p7imgswap=[sr,s1,s1];
							P7_DMMpreloader(s1);
						}
						else if (iM[0].dmmSwap==2){
							iM[0].p7imgswap=[sr,s1,s2];
							P7_DMMpreloader(s1,s2);
						}
						else{
							iM[0].p7imgswap=[sr,sr,sr];
						}
						iM[0].p7state='closed';
						iM[0].mark=false;
						iM[0].rollover=tB.p7opt[9];
						if(iM[0].dmmSwap>0){
							tA[i].hasImg=true;
							iM[0].onmouseover=function(){
								P7_DMMimovr(this);
							};
							iM[0].onmouseout=function(){
								P7_DMMimout(this);
							};
							tA[i].onfocus=function(){
								P7_DMMimovr(this.getElementsByTagName('IMG')[0]);
							};
							tA[i].onblur=function(){
								P7_DMMimout(this.getElementsByTagName('IMG')[0]);
							};
						}
					}
					sD=document.getElementById(tA[i].id.replace('t','s'));
					if(sD){
						tB.dmmSubs[k]=sD;
						sD.dmmDiv=tB.id;
						tA[i].dmmSub=sD.id;
						P7_DMMsetClass(tA[i],'trig');
						sD.dmmUL=sD.getElementsByTagName('UL')[0];
						tB.dmmSubUL[k]=sD.dmmUL;
						sD.style.height='0px';
						sD.dmmUL.style.top='0px';
						sD.dmmUL.style.left='0px';
						if(tB.p7opt[6]==1){
							sD.onmouseover=function(){
								var tB=document.getElementById(this.dmmDiv);
								if(tB.dmmMouseTimer){
									clearTimeout(tB.dmmMouseTimer);
								}
							};
						}
					}
				}
				else if(tA[i].dmmSTE){
					tA[i].dmmDiv=tB.id;
					tA[i].onclick=function(){
						return P7_DMMscrollToElement(this);
					};
				}
			}
			if(tB.p7opt[6]==1){
				P7_DMMbindPointer(tB);
				tB.onmouseout=function(evt){
					var tg,pp,tA,tB,m=true;
					if(P7_DMMgetStyle(this.dmmTrigs[0],'maxHeight','max-height')=='700777px'){
						return;
					}
					evt=(evt)?evt:event;
					tg=(evt.toElement)?evt.toElement:evt.relatedTarget;
					if(tg){
						pp=tg;
						while(pp){
							if(pp==this){
								m=false;
								break;
							}
							if(pp.nodeName && pp.nodeName=='BODY'){
								break;
							}
							pp=pp.parentNode;
						}
					}
					if(this.dmmPointer){
						m=false;
					}
					if(m){
						if(this.dmmMouseTimer){
							clearTimeout(this.dmmMouseTimer);
						}
						if(this.p7opt[7]==1 && this.dmmDefaultPanel>0){
							tA=this.dmmTrigs[this.dmmDefaultPanel-1];
							this.dmmMouseTimer=setTimeout("P7_DMMtrig('"+tA.id+"')",250);
						}
						else{
							this.dmmMouseTimer=setTimeout("P7_DMMtoggle('"+this.id+"')",250);
						}
					}
				};
			}
		}
		if(tB.p7opt[4]==1){
			P7_DMMcurrentMark(tB);
		}
		P7_DMMurl(tB.id);
		if(tB.dmmDefaultPanel>0 && tB.dmmDefaultPanel<tB.dmmTrigs.length+1){
			a=tB.dmmTrigs[tB.dmmDefaultPanel-1];
			if(tB.p7opt[6]===0 || tB.p7opt[7]==1){
				if(!a.dmmSTE){
					P7_DMMopen(a);
				}
			}
			if(a.dmmSTE){
setTimeout(function(){
	a.click();
}
,300);
}
}
if(tB.dmmToolbarClosed){
P7_DMMsetClass(tD,'closed');
P7_DMMsetClass(tU,'closed');
}
if(tB.p7opt[3]==1){
P7_DMMfixed();
}
}
p7DMMa=true;
}
function P7_DMMpreloader(){
	var i,x;
	for(i=0;i<arguments.length;i++){
		x=document.p7DMMpreload.length;
		document.p7DMMpreload[x]=new Image();
		document.p7DMMpreload[x].src=arguments[i];
	}
}
function P7_DMMimovr(im){
	var m=true;
	if(im.p7state=='open' && im.rollover===0){
		m=false;
	}
	if(m){
		im.src=im.p7imgswap[1];
	}
}
function P7_DMMimout(im){
	if(im.p7state=='open' || im.mark){
		im.src=im.p7imgswap[2];
	}
	else{
		im.src=im.p7imgswap[0];
	}
}
function P7_DMMclick(a){
	var wH,tB,m=false;
	if(a.dmmSub){
		tB=document.getElementById(a.dmmDiv);
		if(tB.p7DMMrunning){
			return m;
		}
	}
	wH=window.location.href;
	if(a.href!=wH&&a.href!=wH+'#'){
		if(a.href.toLowerCase().indexOf('javascript:')==-1){
			m=true;
		}
	}
	if(m && a.dmmSub && a.dmmState=='closed'){
		m=false;
	}
	if(a.dmmSTE){
		P7_DMMscrollToElement(a);
		m=false;
	}
	if(a.dmmState=='closed'){
		P7_DMMopen(a);
	}
	else{
		P7_DMMclose(a);
	}
	return m;
}
function P7_DMMtrig(d){
	var i,a;
	a=document.getElementById(d);
	if(a){
		if(a.dmmPointer){
			return;
		}
		else{
			P7_DMMopen(a,2);
		}
	}
}
function P7_DMMopen(a,bp){
	var i,j,op,sD,tB,iM,tU,tA;
	if(a.dmmState=='open'){
		return;
	}
	tB=document.getElementById(a.dmmDiv);
	if(a.dmmPointer && bp==2){
		return;
	}
	op=tB.p7opt[1];
	a.dmmState='open';
	P7_DMMremClass(a,'closed');
	P7_DMMremClass(a.parentNode,'closed');
	P7_DMMsetClass(a,'open');
	P7_DMMsetClass(a.parentNode,'open');
	if(P7_DMMgetStyle(a,'maxHeight','max-height')=='700777px'){
		if(op!==0){
			op=2;
		}
	}
	if(a.hasImg){
		iM=a.getElementsByTagName("IMG")[0];
		iM.p7state='open';
		iM.src=iM.p7imgswap[2];
	}
	P7_DMMtoggle(a);
	if(a.dmmSub){
		sD=document.getElementById(a.dmmSub);
		if(op==1){
			sD.dmmStartFade=0;
			sD.dmmFinishFade=99;
			sD.dmmCurrentFade=sD.dmmStartFade;
			if(sD.filters){
				sD.style.filter='alpha(opacity='+sD.dmmCurrentFade+')';
			}
			else{
				sD.style.opacity=sD.dmmCurrentFade/100;
			}
			sD.style.height='auto';
			sD.style.display='block';
			sD.dmmStartTime=P7_DMMgetTime(0);
			sD.dmmDuration=tB.dmmDuration;
			sD.p7DMMrunning=true;
			sD.p7DMMfade=setInterval("P7_DMMfade('"+sD.id+"','"+tB.dmmAnimType+"')",p7DMMdy);
		}
		else if(op==2){
			tU=sD.dmmUL;
			tB.p7animType='quad';
			tB.p7animProp='height';
			tB.p7animUnit='px';
			if(tB.p7opt[1]==3 || tB.p7opt[1]==4 || tB.p7opt[1]==5){
				tU.style.top='0px';
				tU.style.left='0px';
			}
			sD.style.display='block';
			for(j=0;j<tB.dmmTrigs.length;j++){
				if(tB.dmmSubs[j]){
					tB.dmmSubs[j].p7animStartVal=tB.dmmSubs[j].offsetHeight;
				}
			}
			sD.p7animCurrentVal=sD.p7animStartVal;
			sD.p7animFinishVal=tU.offsetHeight;
			sD.style[tB.p7animProp]=sD.p7animCurrentVal+tB.p7animUnit;
			tB.p7animStartTime=P7_DMMgetTime(0);
			tB.p7animDuration=tB.dmmDuration;
			if(!tB.p7DMMrunning){
				tB.p7DMMrunning=true;
				tB.p7DMManim=setInterval("P7_DMManimator('"+tB.id+"',"+op+")",p7DMMdy);
			}
		}
		else if(op==3){
			tU=sD.dmmUL;
			tB.p7animType='quad';
			tB.p7animProp='top';
			tB.p7animUnit='px';
			sD.style.display='block';
			for(j=0;j<tB.dmmTrigs.length;j++){
				if(tB.dmmSubUL[j]){
					tB.dmmSubUL[j].p7animStartVal=parseInt(tB.dmmSubUL[j].style.top,10);
				}
			}
			if(tU.p7animCurrentVal!=tU.p7animFinishVal){
				tU.p7animStartVal=tU.p7animCurrentVal;
			}
			else{
				tU.p7animStartVal=tU.offsetHeight*-1;
			}
			tU.p7animCurrentVal=tU.p7animStartVal;
			tU.p7animFinishVal=0;
			tU.style[tB.p7animProp]=tU.p7animCurrentVal+tB.p7animUnit;
			sD.style.height='auto';
			tB.p7animStartTime=P7_DMMgetTime(0);
			tB.p7animDuration=tB.dmmDuration;
			if(!tB.p7DMMrunning){
				tB.p7DMMrunning=true;
				tB.p7DMManim=setInterval("P7_DMManimator('"+tB.id+"',"+op+")",p7DMMdy);
			}
		}
		else if(op==4 || op==5){
			tU=sD.dmmUL;
			tB.p7animType='quad';
			tB.p7animProp='left';
			tB.p7animUnit='px';
			sD.style.display='block';
			for(j=0;j<tB.dmmTrigs.length;j++){
				if(tB.dmmSubUL[j]){
					tB.dmmSubUL[j].p7animStartVal=parseInt(tB.dmmSubUL[j].style.left,10);
				}
			}
			if(tU.p7animCurrentVal!=tU.p7animFinishVal){
				tU.p7animStartVal=tU.p7animCurrentVal;
			}
			else{
				tU.p7animStartVal=sD.offsetWidth*-1;
			}
			tU.p7animCurrentVal=tU.p7animStartVal;
			tU.p7animFinishVal=0;
			tU.style[tB.p7animProp]=tU.p7animCurrentVal+tB.p7animUnit;
			sD.style.height='auto';
			tB.p7animStartTime=P7_DMMgetTime(0);
			tB.p7animDuration=tB.dmmDuration;
			if(!tB.p7DMMrunning){
				tB.p7DMMrunning=true;
				tB.p7DMManim=setInterval("P7_DMManimator('"+tB.id+"',"+op+")",p7DMMdy);
			}
		}
		else if(op==6){
			if(tB.p7DMMrunning){
				tB.p7DMMrunning=false;
				clearInterval(tB.p7DMManim);
			}
			sD.p7animType='linear';
			sD.p7animProp='marginLeft';
			sD.p7animUnit='px';
			tA=sD.getElementsByTagName('A');
			sD.p7animStartVal=-100;
			sD.p7animFinishVal=0;
			for(j=0;j<tA.length;j++){
				if(tA[j]){
					tA[j].style[sD.p7animProp]=sD.p7animStartVal+sD.p7animUnit;
				}
			}
			sD.p7animStartTime=P7_DMMgetTime(0);
			sD.p7animDuration=tB.dmmDuration;
			sD.style.height='auto';
			sD.style.display='block';
			tB.p7DMMrunning=true;
			tB.p7DMManim=setInterval("P7_DMMlinkAnimator('"+sD.id+"',"+op+")",p7DMMdy);
		}
		else{
			sD.style.display='block';
			sD.style.height='auto';
		}
	}
}
function P7_DMMclose(a,bp){
	var i,j,op,sD,tB,iM,tU;
	if(a.dmmState=='closed'){
		return;
	}
	tB=document.getElementById(a.dmmDiv);
	op=tB.p7opt[1];
	a.dmmState='closed';
	P7_DMMremClass(a,'open');
	P7_DMMremClass(a.parentNode,'open');
	P7_DMMsetClass(a,'closed');
	P7_DMMsetClass(a.parentNode,'closed');
	if(P7_DMMgetStyle(a,'maxHeight','max-height')=='700777px'){
		if(op!==0){
			op=2;
		}
	}
	if(a.hasImg){
		iM=a.getElementsByTagName("IMG")[0];
		iM.p7state='closed';
		iM.src=iM.p7imgswap[0];
	}
	if(a.dmmSub){
		sD=document.getElementById(a.dmmSub);
		if(op==2){
			tU=sD.dmmUL;
			tB.p7animType='quad';
			tB.p7animProp='height';
			tB.p7animUnit='px';
			for(j=0;j<tB.dmmTrigs.length;j++){
				if(tB.dmmSubs[j]){
					tB.dmmSubs[j].p7animStartVal=tB.dmmSubs[j].offsetHeight;
				}
			}
			sD.p7animCurrentVal=sD.p7animStartVal;
			sD.p7animFinishVal=0;
			sD.style[tB.p7animProp]=sD.p7animCurrentVal+tB.p7animUnit;
			tB.p7animStartTime=P7_DMMgetTime(0);
			tB.p7animDuration=tB.dmmDuration;
			if(!tB.p7DMMrunning){
				tB.p7DMMrunning=true;
				tB.p7DMManim=setInterval("P7_DMManimator('"+tB.id+"',"+op+")",p7DMMdy);
			}
		}
		else if(op==3){
			tU=sD.dmmUL;
			tB.p7animType='quad';
			tB.p7animProp='top';
			tB.p7animUnit='px';
			if(tU.p7animCurrentVal!=tU.p7animFinishVal){
				tU.p7animStartVal=tU.p7animCurrentVal;
			}
			else{
				tU.p7animStartVal=parseInt(tU.style.top,10);
			}
			for(j=0;j<tB.dmmTrigs.length;j++){
				if(tB.dmmSubUL[j]){
					tB.dmmSubUL[j].p7animStartVal=parseInt(tB.dmmSubUL[j].style.top,10);
				}
			}
			tU.p7animCurrentVal=tU.p7animStartVal;
			tU.p7animFinishVal=tU.offsetHeight*-1;
			tU.style[tU.p7animProp]=tU.p7animCurrentVal+tU.p7animUnit;
			tB.p7animStartTime=P7_DMMgetTime(0);
			tB.p7animDuration=tB.dmmDuration;
			if(!tB.p7DMMrunning){
				tB.p7DMMrunning=true;
				tB.p7DMManim=setInterval("P7_DMManimator('"+tB.id+"',"+op+")",p7DMMdy);
			}
		}
		else if(op==4 || op==5){
			tU=sD.dmmUL;
			tB.p7animType='quad';
			tB.p7animProp='left';
			tB.p7animUnit='px';
			sD.style.display='block';
			for(j=0;j<tB.dmmTrigs.length;j++){
				if(tB.dmmSubUL[j]){
					tB.dmmSubUL[j].p7animStartVal=parseInt(tB.dmmSubUL[j].style.left,10);
				}
			}
			tU.p7animCurrentVal=tU.p7animStartVal;
			if(op==4){
				tU.p7animFinishVal=sD.offsetWidth;
			}
			else{
				tU.p7animFinishVal=sD.offsetWidth*-1;
			}
			tU.style[tB.p7animProp]=tU.p7animCurrentVal+tB.p7animUnit;
			sD.style.height='auto';
			tB.p7animStartTime=P7_DMMgetTime(0);
			tB.p7animDuration=tB.dmmDuration;
			if(!tB.p7DMMrunning){
				tB.p7DMMrunning=true;
				tB.p7DMManim=setInterval("P7_DMManimator('"+tB.id+"',"+op+")",p7DMMdy);
			}
		}
		else{
			sD.style.display='none';
			sD.style.height='0px';
		}
	}
}
function P7_DMMtoggle(a,bp){
	var i,tB;
	if(typeof(a)=='object'){
		tB=document.getElementById(a.dmmDiv);
	}
	else if(typeof(a)=='string'){
		tB=document.getElementById(a);
	}
	else{
		return;
	}
	for(i=0;i<tB.dmmTrigs.length;i++){
		if(tB.dmmTrigs[i]!=a){
			if(tB.dmmTrigs[i].dmmState!='closed'){
				P7_DMMclose(tB.dmmTrigs[i]);
			}
		}
	}
}
function P7_DMMfixed(){
	var i,tB;
	if(p7DMMctl && p7DMMctl.length){
		for(i=0;i<p7DMMctl.length;i++){
			tB=document.getElementById(p7DMMctl[i][0]);
			if(tB && tB.dmmSpacer){
				if(!tB.dmmFixedOn && tB.getBoundingClientRect().top<0){
					tB.dmmSpacer.style.height=tB.offsetHeight+'px';
					tB.dmmSpacer.style.display='block';
					P7_DMMsetClass(tB,'p7dmm-fixed');
					tB.dmmFixedOn=true;
				}
				else if(tB.dmmFixedOn && tB.dmmSpacer.getBoundingClientRect().top>=0){
					tB.dmmSpacer.style.display='none';
					P7_DMMremClass(tB,'p7dmm-fixed');
					tB.dmmFixedOn=false;
				}
			}
		}
	}
}
function P7_DMManimator(d,op){
	var i,tB,tA,tS,et,nv,m=false;
	tB=document.getElementById(d);
	et=P7_DMMgetTime(tB.p7animStartTime);
	if(et>=tB.p7animDuration){
		et=tB.p7animDuration;
	}
	tA=tB.dmmTrigs;
	if(op==3 || op==4 || op==5){
		tS=tB.dmmSubUL;
	}
	else{
		tS=tB.dmmSubs;
	}
	for(i=0;i<tA.length;i++){
		if(tS[i]){
			if(tS[i].p7animCurrentVal!=tS[i].p7animFinishVal){
				nv=P7_DMManim(tB.p7animType,et,tS[i].p7animStartVal,tS[i].p7animFinishVal-tS[i].p7animStartVal,tB.p7animDuration);
				tS[i].p7animCurrentVal=nv;
				tS[i].style[tB.p7animProp]=nv+tB.p7animUnit;
				if(tS[i].p7animCurrentVal==tS[i].p7animFinishVal){
					if(tA[i].dmmState=='closed'){
						tB.dmmSubs[i].style.display='none';
						tB.dmmSubs[i].style.height='0px';
					}
					else{
						tB.dmmSubs[i].style.height='auto';
					}
				}
				else{
					m=true;
				}
			}
			else{
			}
		}
	}
	if(!m){
		tB.p7DMMrunning=false;
		clearInterval(tB.p7DMManim);
	}
}
function P7_DMMlinkAnimator(d,op){
	var i,sD,tA,tB,et,nv;
	sD=document.getElementById(d);
	et=P7_DMMgetTime(sD.p7animStartTime);
	if(et>=sD.p7animDuration){
		et=sD.p7animDuration;
	}
	tA=sD.getElementsByTagName('A') ;
	nv=P7_DMManim(sD.p7animType,et,sD.p7animStartVal,sD.p7animFinishVal-sD.p7animStartVal,sD.p7animDuration);
	for(i=0;i<tA.length;i++){
		tA[i].style[sD.p7animProp]=nv+sD.p7animUnit;
	}
	if(et>=sD.p7animDuration){
		tB=document.getElementById(sD.dmmDiv);
		tB.p7DMMrunning=false;
		clearInterval(tB.p7DMManim);
	}
}
function P7_DMMfade(d,tp){
	var i,el,tC,tA,op,et,cet,m=false;
	el=document.getElementById(d);
	et=P7_DMMgetTime(el.dmmStartTime);
	if(et>=el.dmmDuration){
		et=el.dmmDuration;
		m=true;
	}
	if(el.dmmCurrentFade!=el.dmmFinishFade){
		op=P7_DMManim(tp,et,el.dmmStartFade,el.dmmFinishFade-el.dmmStartFade,el.dmmDuration);
		el.dmmCurrentFade=op;
		if(el.filters){
			el.style.filter='alpha(opacity='+el.dmmCurrentFade+')';
		}
		else{
			el.style.opacity=el.dmmCurrentFade/100;
		}
	}
	if(m){
		el.p7DMMrunning=false;
		clearInterval(el.p7DMMfade);
		if(el.dmmFinishFade===0){
			el.style.height='0px';
			el.style.display='none';
		}
		if(el.filters){
			el.style.filter='';
		}
		else{
			el.style.opacity=1;
		}
	}
}
function P7_DMMscrollToElement(a){
	var st,dy,op,el,t,tf,h,tb,tD;
	h=a.hash;
	if(!h || h===''){
		return false;
	}
	else{
		h=h.replace('#','');
	}
	el=document.getElementById(h);
	if(!el){
		return false;
	}
	tD=document.getElementById(a.dmmDiv);
	if(tD.dmmToolbar && tD.dmmToolbar.dmmState!='closed'){
		tD.dmmToolbar.click();
	}
	if(p7DMM.body.p7AnimRunning){
		p7DMM.body.p7AnimRunning=false;
		clearInterval(p7DMM.body.p7DMManim);
	}
	if(typeof(p7STT)=='object'){
		if(p7STT.body && p7STT.body.p7AnimRunning){
			p7STT.body.p7AnimRunning=false;
			clearInterval(p7STT.body.p7STTanim);
		}
	}
	st=p7DMM.body.scrollTop;
	t=st+el.getBoundingClientRect().top+1;
	tf=parseInt(a.getAttribute('data-top-offset'),10);
	if(tf && tf!==''){
		t-=tf;
	}
	tf=a.getAttribute('data-top-offset-id');
	if(tf && tf!==''){
		tb=document.getElementById(tf);
		if(tb){
			t-=tb.offsetHeight;
		}
	}
	if(p7DMM.defAnim==1){
		P7_DMMscrollAnim(p7DMM.body,st,t,p7DMM.defDuration,'quad');
	}
	else{
		p7DMM.body.scrollTop=t;
		if(typeof(P7_STTrsz)=='function'){
			P7_STTrsz()
		}
	}
	return false;
}
function P7_DMMscrollAnim(ob,fv,tv,dur,typ,cb){
	if(ob.p7AnimRunning){
		ob.p7AnimRunning=false;
		clearInterval(ob.p7DMManim);
	}
	typ=(!typ)?'quad':typ;
	ob.p7animType=typ;
	ob.p7animStartVal=fv;
	ob.p7animCurrentVal=ob.p7animStartVal;
	ob.p7animFinishVal=tv;
	ob.p7animStartTime=P7_DMMgetTime(0);
	ob.p7animDuration=dur;
	if(!ob.p7AnimRunning){
		ob.p7AnimRunning=true;
ob.p7DMManim=setInterval(function(){
	P7_DMMscrollAnimator(ob,cb);
}
, p7DMM.animDelay);
}
}
function P7_DMMscrollAnimator(el,cb,op){
	var i,tB,tA,tS,et,nv,m=false;
	et=P7_DMMgetTime(el.p7animStartTime);
	if(et>=el.p7animDuration){
		et=el.p7animDuration;
		m=true;
	}
	if(el.p7animCurrentVal!=el.p7animFinishVal){
		nv=P7_DMManim(el.p7animType, et, el.p7animStartVal, el.p7animFinishVal-el.p7animStartVal, el.p7animDuration);
		el.p7animCurrentVal=nv;
		el.scrollTop=nv;
	}
	if(m){
		el.p7AnimRunning=false;
		clearInterval(el.p7DMManim);
		if(typeof(P7_STTrsz)=='function'){
			P7_STTrsz()
		}
		if(cb && typeof(cb) === "function"){
			cb.call(el);
		}
	}
}
function P7_DMManim(tp,t,b,c,d){
	if(tp=='quad'){
		if((t/=d/2)<1){
			return c/2*t*t+b;
		}
		else{
			return -c/2*((--t)*(t-2)-1)+b;
		}
	}
	else{
		return (c*(t/d))+b;
	}
}
function P7_DMMgetTime(st){
	var d = new Date();
	return d.getTime() - st;
}
function P7_DMMmark(){
	p7DMMadv[p7DMMadv.length]=arguments;
}
function P7_DMMcurrentMark(el){
	var j,i,x,wH,cm=false,mt=['',1,'',''],op,r1,k,kk,tA,aU,pp,tr,aT,aP,d,pn,im;
	wH=window.location.href;
	if(el.p7opt[5]!=1){
		wH=wH.replace(window.location.search,'');
	}
	if(wH.charAt(wH.length-1)=='#'){
		wH=wH.substring(0,wH.length-1);
	}
	for(k=0;k<p7DMMadv.length;k++){
		if(p7DMMadv[k][0]&&p7DMMadv[k][0]==el.id){
			mt=p7DMMadv[k];
			cm=true;
			break;
		}
	}
	op=mt[1];
	if(op<1){
		return;
	}
	r1=/index\.[\S]*/i;
	k=-1;
	kk=-1;
	tA=el.getElementsByTagName('A');
	for(j=0;j<tA.length;j++){
		aU=tA[j].href.replace(r1,'');
		if(op>0){
			if(tA[j].href==wH || aU==wH){
				k=j;
				kk=-1;
			}
		}
		if(op==2){
			if(tA[j].firstChild){
				if(tA[j].firstChild.nodeValue==mt[2]){
					kk=j;
				}
			}
		}
		if(op==3&&tA[j].href.indexOf(mt[2])>-1){
			kk=j;
		}
		if(op==4){
			for(x=2;x<mt.length;x+=2){
				if(wH.indexOf(mt[x])>-1){
					if(tA[j].firstChild&&tA[j].firstChild.nodeValue){
						if(tA[j].firstChild.nodeValue==mt[x+1]){
							kk=j;
						}
					}
				}
			}
		}
	}
	k=(kk>k)?kk:k;
	if(k>-1){
		if(tA[k].dmmDiv){
			tr=tA[k];
		}
		else{
			if(!tA[k].dmmSTE){
				P7_DMMsetClass(tA[k],'current_mark');
				P7_DMMsetClass(tA[k].parentNode,'current_mark');
			}
			pp=tA[k].parentNode;
			while (pp){
				if(pp.dmmDiv && pp.id && pp.id.indexOf('p7DMMs')===0){
					if(pp.dmmDiv==el.id){
						tr=document.getElementById(pp.id.replace('s','t'));
						if(tr){
							break;
						}
					}
				}
				pp=pp.parentNode;
			}
		}
		if(tr){
			if(!tA[k].dmmSTE){
				P7_DMMsetClass(tr,'current_mark');
				P7_DMMsetClass(tr.parentNode,'current_mark');
			}
			if(tr.hasImg){
				im=tr.getElementsByTagName('IMG')[0];
				im.mark=true;
				im.src=im.p7imgswap[2];
			}
			if(tr.dmmTrigNum){
				el.dmmDefaultPanel=tr.dmmTrigNum;
			}
		}
	}
}
function P7_DMMbindPointer(el){
	if(navigator.maxTouchPoints){
		el.addEventListener('pointerdown',P7_DMMsetPointer,false);
		el.addEventListener('mouseover',P7_DMMsetPointer,false);
		el.addEventListener('pointerout',P7_DMMsetPointer,false);
		el.addEventListener('mouseout',P7_DMMsetPointer,false);
	}
	else if(navigator.msMaxTouchPoints){
		el.addEventListener('MSPointerDown',P7_DMMsetPointer,false);
		el.addEventListener('mouseover',P7_DMMsetPointer,false);
		el.addEventListener('MSPointerOut',P7_DMMsetPointer,false);
		el.addEventListener('mouseout',P7_DMMsetPointer,false);
	}
	else if(el.ontouchstart !== undefined){
		el.addEventListener('touchstart',P7_DMMsetPointer,false);
	}
}
function P7_DMMsetPointer(evt){
	if(evt.pointerType){
		if( evt.MSPOINTER_TYPE_TOUCH || evt.pointerType=='touch'){
			this.dmmPointer=true;
		}
		else if( evt.MSPOINTER_TYPE_PEN || evt.pointerType=='pen'){
			this.dmmPointer=true;
		}
		else{
			this.dmmPointer=false;
		}
	}
	else if (this.ontouchstart !== undefined){
		this.dmmPointer=true;
	}
}
function P7_DMMurl(dv){
	var i,h,s,x,tB,d='dmm',pn,n=dv.replace("p7DMM_",""),tr;
	if(document.getElementById){
		tB=document.getElementById(dv);
		h=document.location.search;
		if(h){
			h=h.replace('?','');
			s=h.split(/[=&]/g);
			if(s&&s.length){
				for(i=0;i<s.length;i+=2){
					if(s[i]==d){
						x=s[i+1];
						if(n!=x.charAt(0)){
							x=false;
						}
						if(x){
							pn='p7DMMt'+x;
							tr=document.getElementById(pn);
							if(tr){
								if(tr.dmmTrigNum){
									tB.dmmDefaultPanel=tr.dmmTrigNum;
								}
							}
						}
					}
				}
			}
		}
		h=document.location.hash;
		if(h){
			x=h.substring(1,h.length);
			if(n!=x.charAt(3)){
				x=false;
			}
			if(x&&x.indexOf(d)===0){
				pn='p7DMMt'+x.substring(3);
				tr=document.getElementById(pn);
				if(tr){
					if(tr.dmmTrigNum){
						tB.dmmDefaultPanel=tr.dmmTrigNum;
					}
				}
			}
		}
	}
}
function P7_DMMgetCSSPre(){
	var i,dV,pre=['transition','WebkitTransition','MozTransition','OTransition','msTransition'];
	var c='none',cssPre=['','-webkit-','-moz-','-o-','-ms-'];
	dV=document.createElement('div');
	for(i=0;i<pre.length;i++){
		if(dV.style[pre[i]]!==undefined){
			c=cssPre[i];
			break;
		}
	}
	return c;
}
function P7_DMMrsz(){
	P7_DMMfixed();
}
function P7_DMMgetIEver(){
	var j,v=-1,nv,m=false;
	nv=navigator.userAgent.toLowerCase();
	j=nv.indexOf("msie");
	if(j>-1){
		v=parseFloat(nv.substring(j+4,j+8));
		if(document.documentMode){
			v=document.documentMode;
		}
	}
	return v;
}
function P7_DMMsetClass(ob,cl){
	if(ob){
		var cc,nc,r=/\s+/g;
		cc=ob.className;
		nc=cl;
		if(cc&&cc.length>0){
			if(cc.indexOf(cl)==-1){
				nc=cc+' '+cl;
			}
			else{
				nc=cc;
			}
		}
		nc=nc.replace(r,' ');
		ob.className=nc;
	}
}
function P7_DMMremClass(ob,cl){
	if(ob){
		var cc,nc;
		cc=ob.className;
		if(cc&&cc.indexOf(cl>-1)){
			nc=cc.replace(cl,'');
			nc=nc.replace(/\s+/g,' ');
			nc=nc.replace(/\s$/,'');
			nc=nc.replace(/^\s/,'');
			ob.className=nc;
		}
	}
}
function P7_DMMgetStyle(el,s1,s2){
	var s='';
	if(el.currentStyle){
		s=el.currentStyle[s1];
	}
	else{
		s=document.defaultView.getComputedStyle(el,"").getPropertyValue(s2);
	}
	return s;
}
function P7_DMMaddSheet(sh){
	var h,hd;
	h=document.createElement('style');
	h.type='text/css';
	h.appendChild(document.createTextNode(sh));
	hd=document.getElementsByTagName('head');
	hd[0].appendChild(h);
}
