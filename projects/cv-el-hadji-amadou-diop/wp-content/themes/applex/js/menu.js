 /*<![CDATA[*/

 var mbA,mbT,mbTf,mbSf;
var mbR = [];

function mbSet(m) {
if (document.getElementById&&document.createElement) {
	var m=document.getElementById(m);
	mbR[mbR.length] = m;
	var i;

	e=m.getElementsByTagName('a');
	if (!mbTf) mbTf=new Function('mbHT();');
	if (!mbSf) mbSf=new Function('mbS(this);');
	for (i=0;i<e.length;i++) {
		e[i].onmouseout=e[i].onblur=mbTf;
		e[i].onmouseover=e[i].onfocus=mbSf;
	}

	m=m.getElementsByTagName('ul');
	for (i=0;i<m.length;i++) {
		mbH(mbL(m[i]));
	}
}}

function mbHA() {
	if (mbA) {
		while (mbA) mbH(mbA);
		mbHE('block');
	}
}

function mbHT() {
	if (!mbT) mbT=setTimeout('mbHA();', 0);
}

function mbTC() {
	if (mbT) {
		clearTimeout(mbT);
		mbT=null;
	}
}

function mbS(m) {
	mbTC();
	if (mbA) while (mbA&&m!=mbA&&mbP(m)!=mbA) mbH(mbA);
	else mbHE('none');

	if (mbM(m)) {
		mbSH(m,'block');
		mbA=m;
	}
}

function mbH(m) {
	if (m==mbA) mbA=mbP(m);
	mbSH(m,'none');
	mbT=null;
}

function mbL(m) {
	while (m && m.tagName != 'A') m = m.previousSibling;
	return m;
}

function mbM(l) {
	while (l && l.tagName != 'UL') l = l.nextSibling;
	return l;
}

function mbP(m) {
	var p = m.parentNode.parentNode;
	if (p.tagName == 'UL') {
		var i = 0;
		while (i <mbR.length) {
			if (mbR[i] == p) return null;
			i++;
		}
	} else {
		return null;
	}
	return mbL(p);
}

function mbSH(m,v) {
	m.className=v;
	mbM(m).style.display=v;
}

function mbHE(v) {
	mbHEV(v,document.getElementsByTagName('select'));
}

function mbHEV(v,e) {
	for (var i=0;i<e.length;i++) e[i].style.display=v;
}
/*]]>*/