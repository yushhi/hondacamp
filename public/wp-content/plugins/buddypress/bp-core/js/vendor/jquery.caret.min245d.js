!function(e,o){"function"==typeof define&&define.amd?define(["jquery"],function(t){return e.returnExportsGlobal=o(t)}):"object"==typeof exports?module.exports=o(require("jquery")):o(jQuery)}(this,function(i){"use strict";var n,r,s,a,p,u,h,l;function t(t){this.$inputor=t,this.domInputor=this.$inputor[0]}function e(t){this.$inputor=t,this.domInputor=this.$inputor[0]}function o(t){this.$inputor=t}t.prototype.setPos=function(t){var p,l,c,f;return(f=h.getSelection())&&(c=0,l=!1,(p=function(t,e){for(var o,n,r=e.childNodes,i=[],s=0,a=r.length;s<a&&(o=r[s],!l);s++)if(3===o.nodeType){if(c+o.length>=t){l=!0,(n=u.createRange()).setStart(o,t-c),f.removeAllRanges(),f.addRange(n);break}i.push(c+=o.length)}else i.push(p(t,o));return i})(t,this.domInputor)),this.domInputor},t.prototype.getIEPosition=function(){return this.getPosition()},t.prototype.getPosition=function(){var t=this.getOffset(),e=this.$inputor.offset();return t.left-=e.left,t.top-=e.top,t},t.prototype.getOldIEPos=function(){var t=u.selection.createRange(),e=u.body.createTextRange();return e.moveToElementText(this.domInputor),e.setEndPoint("EndToEnd",t),e.text.length},t.prototype.getPos=function(){var t,e;return(e=this.range())?((t=e.cloneRange()).selectNodeContents(this.domInputor),t.setEnd(e.endContainer,e.endOffset),e=t.toString().length,t.detach(),e):u.selection?this.getOldIEPos():void 0},t.prototype.getOldIEOffset=function(){var t=u.selection.createRange().duplicate();return t.moveStart("character",-1),{height:(t=t.getBoundingClientRect()).bottom-t.top,left:t.left,top:t.top}},t.prototype.getOffset=function(t){var e,o,n,r;return h.getSelection&&(r=this.range())?(0<r.endOffset-1&&r.endContainer!==this.domInputor&&((e=r.cloneRange()).setStart(r.endContainer,r.endOffset-1),e.setEnd(r.endContainer,r.endOffset),o={height:(n=e.getBoundingClientRect()).height,left:n.left+n.width,top:n.top},e.detach()),o&&0!==(null!=o?o.height:void 0)||(e=r.cloneRange(),r=i(u.createTextNode("|")),e.insertNode(r[0]),e.selectNode(r[0]),o={height:(n=e.getBoundingClientRect()).height,left:n.left,top:n.top},r.remove(),e.detach())):u.selection&&(o=this.getOldIEOffset()),o&&(o.top+=i(h).scrollTop(),o.left+=i(h).scrollLeft()),o},t.prototype.range=function(){var t;if(h.getSelection)return 0<(t=h.getSelection()).rangeCount?t.getRangeAt(0):null},n=t,e.prototype.getIEPos=function(){var t,e,o=this.domInputor,n=u.selection.createRange(),r=0;return n&&n.parentElement()===o&&(t=o.value.replace(/\r\n/g,"\n").length,(e=o.createTextRange()).moveToBookmark(n.getBookmark()),(o=o.createTextRange()).collapse(!1),r=-1<e.compareEndPoints("StartToEnd",o)?t:-e.moveStart("character",-t)),r},e.prototype.getPos=function(){return u.selection?this.getIEPos():this.domInputor.selectionStart},e.prototype.setPos=function(t){var e,o=this.domInputor;return u.selection?((e=o.createTextRange()).move("character",t),e.select()):o.setSelectionRange&&o.setSelectionRange(t,t),o},e.prototype.getIEOffset=function(t){var e=this.domInputor.createTextRange();return t=t||this.getPos(),e.move("character",t),{left:e.boundingLeft,top:e.boundingTop,height:e.boundingHeight}},e.prototype.getOffset=function(t){var e,o=this.$inputor;return u.selection?((e=this.getIEOffset(t)).top+=i(h).scrollTop()+o.scrollTop(),e.left+=i(h).scrollLeft()+o.scrollLeft(),e):(e=o.offset(),t=this.getPosition(t),{left:e.left+t.left-o.scrollLeft(),top:e.top+t.top-o.scrollTop(),height:t.height})},e.prototype.getPosition=function(t){var e,o=this.$inputor,n=function(t){return t=t.replace(/<|>|`|"|&/g,"?").replace(/\r\n|\r|\n/g,"<br/>"),t=/firefox/i.test(navigator.userAgent)?t.replace(/\s/g,"&nbsp;"):t};return void 0===t&&(t=this.getPos()),e=o.val().slice(0,t),t=o.val().slice(t),e="<span style='position: relative; display: inline;'>"+n(e)+"</span>",e+="<span id='caret' style='position: relative; display: inline;'>|</span>",e+="<span style='position: relative; display: inline;'>"+n(t)+"</span>",new s(o).create(e).rect()},e.prototype.getIEPosition=function(t){var e=this.getIEOffset(t),t=this.$inputor.offset();return{left:e.left-t.left,top:e.top-t.top,height:e.height}},r=e,o.prototype.css_attr=["borderBottomWidth","borderLeftWidth","borderRightWidth","borderTopStyle","borderRightStyle","borderBottomStyle","borderLeftStyle","borderTopWidth","boxSizing","fontFamily","fontSize","fontWeight","height","letterSpacing","lineHeight","marginBottom","marginLeft","marginRight","marginTop","outlineWidth","overflow","overflowX","overflowY","paddingBottom","paddingLeft","paddingRight","paddingTop","textAlign","textOverflow","textTransform","whiteSpace","wordBreak","wordWrap"],o.prototype.mirrorCss=function(){var o=this,n={position:"absolute",left:-9999,top:0,zIndex:-2e4};return"TEXTAREA"===this.$inputor.prop("tagName")&&this.css_attr.push("width"),i.each(this.css_attr,function(t,e){return n[e]=o.$inputor.css(e)}),n},o.prototype.create=function(t){return this.$mirror=i("<div></div>"),this.$mirror.css(this.mirrorCss()),this.$mirror.html(t),this.$inputor.after(this.$mirror),this},o.prototype.rect=function(){var t=this.$mirror.find("#caret"),e=t.position(),t={left:e.left,top:e.top,height:t.height()};return this.$mirror.remove(),t},s=o,a={contentEditable:function(t){return!(!t[0].contentEditable||"true"!==t[0].contentEditable)}},p={pos:function(t){return t||0===t?this.setPos(t):this.getPos()},position:function(t){return u.selection?this.getIEPosition(t):this.getPosition(t)},offset:function(t){return this.getOffset(t)}},h=u=null,l=function(t){return u=(t=null!=t?t.iframe:void 0)?(h=t.contentWindow,t.contentDocument||h.document):(h=window,document)},i.fn.caret=function(t,e,o){return p[t]?(i.isPlainObject(e)?(l(e),e=void 0):l(o),o=new(a.contentEditable(this)?n:r)(this),p[t].apply(o,[e])):i.error("Method "+t+" does not exist on jQuery.caret")},i.fn.caret.EditableCaret=n,i.fn.caret.InputCaret=r,i.fn.caret.Utils=a,i.fn.caret.apis=p});