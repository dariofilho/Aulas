var a = 1; //a = 1, b = null, c = null
var	b = a++; //b = 1, a = 2
var c = ++b; //c = 2, b = 2, a = 2

//----------------------------

var a = 1; //a = 1, b = null, c = null

var b = a; //a = 1, b = 1, c = null
	a = a + 1; //a = 2, b = 1, c = null

	b = b + 1; //a = 2, b = 2, c = null
var c = b; //a = 2, b = 2, c = 2


//-----------------------------

var d = 4; //d = 4
var e = d--; //d = 3, e = 4
var f = e--; //d = 3, e = 3, f = 4
var g = --f; //d = 3, e = 3, f = 3, g = 3
var h = g--; //d = 3, e = 3, f = 3, g = 2, h = 3









