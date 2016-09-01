/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function(){var a=CKEDITOR.htmlParser.fragment.prototype,b=CKEDITOR.htmlParser.element.prototype;a.onlyChild=b.onlyChild=function(){var k=this.children,l=k.length,m=l==1&&k[0];return m||null;};b.removeAnyChildWithName=function(k){var l=this.children,m=[],n;for(var o=0;o<l.length;o++){n=l[o];if(!n.name)continue;if(n.name==k){m.push(n);l.splice(o--,1);}m=m.concat(n.removeAnyChildWithName(k));}return m;};b.getAncestor=function(k){var l=this.parent;while(l&&!(l.name&&l.name.match(k)))l=l.parent;return l;};a.firstChild=b.firstChild=function(k){var l;for(var m=0;m<this.children.length;m++){l=this.children[m];if(k(l))return l;else if(l.name){l=l.firstChild(k);if(l)return l;}}return null;};b.addStyle=function(k,l,m){var q=this;var n,o='';if(typeof l=='string')o+=k+':'+l+';';else{if(typeof k=='object')for(var p in k){if(k.hasOwnProperty(p))o+=p+':'+k[p]+';';}else o+=k;m=l;}if(!q.attributes)q.attributes={};n=q.attributes.style||'';n=(m?[o,n]:[n,o]).join(';');q.attributes.style=n.replace(/^;|;(?=;)/,'');};CKEDITOR.dtd.parentOf=function(k){var l={};for(var m in this){if(m.indexOf('$')==-1&&this[m][k])l[m]=1;}return l;};var c=/^([.\d]*)+(em|ex|px|gd|rem|vw|vh|vm|ch|mm|cm|in|pt|pc|deg|rad|ms|s|hz|khz){1}?/i,d=/^(?:\b0[^\s]*\s*){1,4}$/,e='^m{0,4}(cm|cd|d?c{0,3})(xc|xl|l?x{0,3})(ix|iv|v?i{0,3})$',f=new RegExp(e),g=new RegExp(e.toUpperCase()),h=0,i;CKEDITOR.plugins.pastefromword={utils:{createListBulletMarker:function(k,l){var m=new CKEDITOR.htmlParser.element('cke:listbullet'),n;if(!k){k='decimal';n='ol';}else if(k[2]){if(!isNaN(k[1]))k='decimal';else if(f.test(k[1]))k='lower-roman';else if(g.test(k[1]))k='upper-roman';else if(/^[a-z]+$/.test(k[1]))k='lower-alpha';else if(/^[A-Z]+$/.test(k[1]))k='upper-alpha';else k='decimal';n='ol';}else{if(/[l\u00B7\u2002]/.test(k[1]))k='disc';else if(/[\u006F\u00D8]/.test(k[1]))k='circle';else if(/[\u006E\u25C6]/.test(k[1]))k='square';else k='disc';n='ul';}m.attributes={'cke:listtype':n,style:'list-style-type:'+k+';'};m.add(new CKEDITOR.htmlParser.text(l));return m;},isListBulletIndicator:function(k){var l=k.attributes&&k.attributes.style;if(/mso-list\s*:\s*Ignore/i.test(l))return true;},isContainingOnlySpaces:function(k){var l;return(l=k.onlyChild())&&/^(:?\s|&nbsp;)+$/.test(l.value);},resolveList:function(k){var l=k.attributes,m;if((m=k.removeAnyChildWithName('cke:listbullet'))&&m.length&&(m=m[0])){k.name='cke:li';if(l.style)l.style=CKEDITOR.plugins.pastefromword.filters.stylesFilter([['text-indent'],['line-height'],[/^margin(:?-left)?$/,null,function(p){var q=p.split(' ');
p=CKEDITOR.plugins.pastefromword.utils.convertToPx(q[3]||q[1]||q[0]);p=parseInt(p,10);if(!h&&i&&p>i)h=p-i;l['cke:margin']=i=p;}]])(l.style,k)||'';var n=m.attributes,o=n.style;k.addStyle(o);CKEDITOR.tools.extend(l,n);return true;}return false;},convertToPx:(function(){var k=CKEDITOR.dom.element.createFromHtml('<div style="position:absolute;left:-9999px;top:-9999px;margin:0px;padding:0px;border:0px;"></div>',CKEDITOR.document);CKEDITOR.document.getBody().append(k);return function(l){if(c.test(l)){k.setStyle('width',l);return k.$.clientWidth+'px';}return l;};})(),getStyleComponents:(function(){var k=CKEDITOR.dom.element.createFromHtml('<div style="position:absolute;left:-9999px;top:-9999px;"></div>',CKEDITOR.document);CKEDITOR.document.getBody().append(k);return function(l,m,n){k.setStyle(l,m);var o={},p=n.length;for(var q=0;q<p;q++)o[n[q]]=k.getStyle(n[q]);return o;};})(),listDtdParents:CKEDITOR.dtd.parentOf('ol')},filters:{flattenList:function(k){var l=k.attributes,m=k.parent,n,o=1;while(m){m.attributes&&m.attributes['cke:list']&&o++;m=m.parent;}switch(l.type){case 'a':n='lower-alpha';break;}var p=k.children,q;for(var r=0;r<p.length;r++){q=p[r];var s=q.attributes;if(q.name in CKEDITOR.dtd.$listItem){var t=q.children,u=t.length,v=t[u-1];if(v.name in CKEDITOR.dtd.$list){p.splice(r+1,0,v);v.parent=k;if(!--t.length)p.splice(r,1);}q.name='cke:li';s['cke:indent']=o;i=0;s['cke:listtype']=k.name;n&&q.addStyle('list-style-type',n,true);}}delete k.name;l['cke:list']=1;},assembleList:function(k){var l=k.children,m,n,o,p,q,r,s,t,u;for(var v=0;v<l.length;v++){m=l[v];if('cke:li'==m.name){m.name='li';n=m;o=n.attributes;p=n.attributes['cke:listtype'];q=parseInt(o['cke:indent'],10)||h&&Math.ceil(o['cke:margin']/h)||1;o.style&&(o.style=CKEDITOR.plugins.pastefromword.filters.stylesFilter([['list-style-type',p=='ol'?'decimal':'disc']])(o.style)||'');if(!s){s=new CKEDITOR.htmlParser.element(p);s.add(n);l[v]=s;}else{if(q>u){s=new CKEDITOR.htmlParser.element(p);s.add(n);r.add(s);}else if(q<u){var w=u-q,x;while(w--&&(x=s.parent))s=x.parent;s.add(n);}else s.add(n);l.splice(v--,1);}r=n;u=q;}else s=null;}h=0;},falsyFilter:function(k){return false;},stylesFilter:function(k,l){return function(m,n){var o=[];m.replace(/&quot;/g,'"').replace(/\s*([^ :;]+)\s*:\s*([^;]+)\s*(?=;|$)/g,function(q,r,s){r=r.toLowerCase();r=='font-family'&&(s=s.replace(/["']/g,''));var t,u,v,w;for(var x=0;x<k.length;x++){if(k[x]){t=k[x][0];u=k[x][1];v=k[x][2];w=k[x][3];if(r.match(t)&&(!u||s.match(u))){r=w||r;l&&(v=v||s);
if(typeof v=='function')v=v(s,n,r);if(v&&v.push)r=v[0],v=v[1];if(typeof v=='string')o.push([r,v]);return;}}}!l&&o.push([r,s]);});for(var p=0;p<o.length;p++)o[p]=o[p].join(':');return o.length?o.join(';')+';':false;};},elementMigrateFilter:function(k,l){return function(m){var n=l?new CKEDITOR.style(k,l)._.definition:k;m.name=n.element;CKEDITOR.tools.extend(m.attributes,CKEDITOR.tools.clone(n.attributes));m.addStyle(CKEDITOR.style.getStyleText(n));};},styleMigrateFilter:function(k,l){var m=this.elementMigrateFilter;return function(n,o){var p=new CKEDITOR.htmlParser.element(null),q={};q[l]=n;m(k,q)(p);p.children=o.children;o.children=[p];};},bogusAttrFilter:function(k,l){if(l.name.indexOf('cke:')==-1)return false;},applyStyleFilter:null},getRules:function(k){var l=CKEDITOR.dtd,m=CKEDITOR.tools.extend({},l.$block,l.$listItem,l.$tableContent),n=k.config,o=this.filters,p=o.falsyFilter,q=o.stylesFilter,r=o.elementMigrateFilter,s=CKEDITOR.tools.bind(this.filters.styleMigrateFilter,this.filters),t=this.utils.createListBulletMarker,u=o.flattenList,v=o.assembleList,w=this.utils.isListBulletIndicator,x=this.utils.isContainingOnlySpaces,y=this.utils.resolveList,z=this.utils.convertToPx,A=this.utils.getStyleComponents,B=this.utils.listDtdParents,C=n.pasteFromWordRemoveFontStyles!==false,D=n.pasteFromWordRemoveStyles!==false;return{elementNames:[[/meta|link|script/,'']],root:function(E){E.filterChildren();v(E);},elements:{'^':function(E){var F;if(CKEDITOR.env.gecko&&(F=o.applyStyleFilter))F(E);},$:function(E){var F=E.name||'',G=E.attributes;if(F in m&&G.style)G.style=q([[/^(:?width|height)$/,null,z]])(G.style)||'';if(F.match(/h\d/)){E.filterChildren();if(y(E))return;r(n['format_'+F])(E);}else if(F in l.$inline){E.filterChildren();if(x(E))delete E.name;}else if(F.indexOf(':')!=-1&&F.indexOf('cke')==-1){E.filterChildren();if(F=='v:imagedata'){var H=E.attributes['o:href'];if(H)E.attributes.src=H;E.name='img';return;}delete E.name;}if(F in B){E.filterChildren();v(E);}},style:function(E){if(CKEDITOR.env.gecko){var F=E.onlyChild().value.match(/\/\* Style Definitions \*\/([\s\S]*?)\/\*/),G=F&&F[1],H={};if(G){G.replace(/[\n\r]/g,'').replace(/(.+?)\{(.+?)\}/g,function(I,J,K){J=J.split(',');var L=J.length,M;for(var N=0;N<L;N++)CKEDITOR.tools.trim(J[N]).replace(/^(\w+)(\.[\w-]+)?$/g,function(O,P,Q){P=P||'*';Q=Q.substring(1,Q.length);if(Q.match(/MsoNormal/))return;if(!H[P])H[P]={};if(Q)H[P][Q]=K;else H[P]=K;});});o.applyStyleFilter=function(I){var J=H['*']?'*':I.name,K=I.attributes&&I.attributes['class'],L;
if(J in H){L=H[J];if(typeof L=='object')L=L[K];L&&I.addStyle(L,true);}};}}return false;},p:function(E){E.filterChildren();if(y(E))return;if(n.enterMode==CKEDITOR.ENTER_BR){delete E.name;E.add(new CKEDITOR.htmlParser.element('br'));}else r(n['format_'+(n.enterMode==CKEDITOR.ENTER_P?'p':'div')])(E);},div:function(E){var F=E.onlyChild();if(F&&F.name=='table'){var G=E.attributes;F.attributes=CKEDITOR.tools.extend(F.attributes,G);G.style&&F.addStyle(G.style);var H=new CKEDITOR.htmlParser.element('div');H.addStyle('clear','both');E.add(H);delete E.name;}},td:function(E){if(E.getAncestor('thead'))E.name='th';},ol:u,ul:u,dl:u,font:function(E){if(!CKEDITOR.env.gecko&&w(E.parent)){delete E.name;return;}E.filterChildren();var F=E.attributes,G=F.style,H=E.parent;if('font'==H.name){CKEDITOR.tools.extend(H.attributes,E.attributes);G&&H.addStyle(G);delete E.name;}else{G=G||'';if(F.color){F.color!='#000000'&&(G+='color:'+F.color+';');delete F.color;}if(F.face){G+='font-family:'+F.face+';';delete F.face;}if(F.size){G+='font-size:'+(F.size>3?'large':F.size<3?'small':'medium')+';';delete F.size;}E.name='span';E.addStyle(G);}},span:function(E){if(!CKEDITOR.env.gecko&&w(E.parent))return false;E.filterChildren();if(x(E)){delete E.name;return null;}if(!CKEDITOR.env.gecko&&w(E)){var F=E.firstChild(function(M){return M.value||M.name=='img';}),G=F&&(F.value||'l.'),H=G.match(/^([^\s]+?)([.)]?)$/);return t(H,G);}var I=E.children,J=E.attributes,K=J&&J.style,L=I&&I[0];if(K)J.style=q([['line-height'],[/^font-family$/,null,!C?s(n.font_style,'family'):null],[/^font-size$/,null,!C?s(n.fontSize_style,'size'):null],[/^color$/,null,!C?s(n.colorButton_foreStyle,'color'):null],[/^background-color$/,null,!C?s(n.colorButton_backStyle,'color'):null]])(K,E)||'';return null;},b:r(n.coreStyles_bold),i:r(n.coreStyles_italic),u:r(n.coreStyles_underline),s:r(n.coreStyles_strike),sup:r(n.coreStyles_superscript),sub:r(n.coreStyles_subscript),a:function(E){var F=E.attributes;if(F&&!F.href&&F.name)delete E.name;},'cke:listbullet':function(E){if(E.getAncestor(/h\d/)&&!n.pasteFromWordNumberedHeadingToList)delete E.name;}},attributeNames:[[/^onmouse(:?out|over)/,''],[/^onload$/,''],[/(?:v|o):\w+/,''],[/^lang/,'']],attributes:{style:q(D?[[/^margin$|^margin-(?!bottom|top)/,null,function(E,F,G){if(F.name in {p:1,div:1}){var H=n.contentsLangDirection=='ltr'?'margin-left':'margin-right';if(G=='margin')E=A(G,E,[H])[H];else if(G!=H)return null;if(E&&!d.test(E))return[H,E];}return null;}],[/^clear$/],[/^border.*|margin.*|vertical-align|float$/,null,function(E,F){if(F.name=='img')return E;
}],[/^width|height$/,null,function(E,F){if(F.name in {table:1,td:1,th:1,img:1})return E;}]]:[[/^mso-/],[/-color$/,null,function(E){if(E=='transparent')return false;if(CKEDITOR.env.gecko)return E.replace(/-moz-use-text-color/g,'transparent');}],[/^margin$/,d],['text-indent','0cm'],['page-break-before'],['tab-stops'],['display','none'],C?[/font-?/]:null],D),width:function(E,F){if(F.name in l.$tableContent)return false;},border:function(E,F){if(F.name in l.$tableContent)return false;},'class':p,bgcolor:p,valign:D?p:function(E,F){F.addStyle('vertical-align',E);return false;}},comment:!CKEDITOR.env.ie?function(E,F){var G=E.match(/<img.*?>/),H=E.match(/^\[if !supportLists\]([\s\S]*?)\[endif\]$/);if(H){var I=H[1]||G&&'l.',J=I&&I.match(/>([^\s]+?)([.)]?)</);return t(J,I);}if(CKEDITOR.env.gecko&&G){var K=CKEDITOR.htmlParser.fragment.fromHtml(G[0]).children[0],L=F.previous,M=L&&L.value.match(/<v:imagedata[^>]*o:href=['"](.*?)['"]/),N=M&&M[1];N&&(K.attributes.src=N);return K;}return false;}:p};}};var j=function(){this.dataFilter=new CKEDITOR.htmlParser.filter();};j.prototype={toHtml:function(k){var l=CKEDITOR.htmlParser.fragment.fromHtml(k,false),m=new CKEDITOR.htmlParser.basicWriter();l.writeHtml(m,this.dataFilter);return m.getHtml(true);}};CKEDITOR.cleanWord=function(k,l){if(CKEDITOR.env.gecko)k=k.replace(/(<!--\[if[^<]*?\])-->([\S\s]*?)<!--(\[endif\]-->)/gi,'$1$2$3');var m=new j(),n=m.dataFilter;n.addRules(CKEDITOR.plugins.pastefromword.getRules(l));l.fire('beforeCleanWord',{filter:n});try{k=m.toHtml(k,false);}catch(o){alert(l.lang.pastefromword.error);}k=k.replace(/cke:.*?".*?"/g,'');k=k.replace(/style=""/g,'');k=k.replace(/<span>/g,'');return k;};})();
