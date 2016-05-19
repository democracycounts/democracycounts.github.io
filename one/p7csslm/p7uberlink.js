/* 
  ------------------------------------------------
  PVII Uberlink
  Current Page Link Highlighter
  Copyright (c) 2007 Project Seven Development
  www.projectseven.com
  Version: 1.0.0
  ------------------------------------------------
*/
function P7_Uberlink(cl,d){
	var i,ob,tA,h=document.location.href;
	if(document.getElementById){
	ob=(d)?document.getElementById(d):document;
	if(ob){
	tA=ob.getElementsByTagName('A');
	for(i=0;i<tA.length;i++){
	if(tA[i].href==h){
	tA[i].className=cl;
}}}}}
