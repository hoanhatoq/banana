<div id="exitBtn"><a href="../index.html" onclick="return confirm('ログアウトしてよろしいですか？')">ログアウト</a></div>
</div>
<div class="clr"></div>

<script type="text/javascript">  
var elem = "TR";  
window.onload = function() {  
  if(document.getElementsByTagName) {  
    var el = document.getElementsByTagName(elem);  
      for(var i=0; i<el.length; i++) {  
        if(el[i].childNodes[0].tagName != "TH"  
          && el[i].parentNode.parentNode.className.indexOf("tbl") != -1) {  
          if(i%2 == 1) {  
            el[i].className = "on";  
          } else {  
            el[i].className = "off";  
          }  
        }  
      }  
  }        
}  
</script> 

<div class="content_box">
<div class="left_menu">
<ul>
<li><a href="index.html">管理者一覧</a></li>
<li><a href="list.html">会員一覧</a></li>
<li class="active"><a href="../member/list.html">結果一覧</a></li>
<li><a href="../member/list.html">結果PDF出力</a></li>
</ul>
</div>

<div class="right_contents">
<!--<ul class="bread">
	<li>結果一覧</li>
	<li><a href="#">結果詳細</a></li>
</ul>-->

<h2>結果詳細</h2> 

<div class="pdf_create">
<ul>
<li class="createPdf"><a href="member_edit02.html">結果PDF出力</a></li>
</ul>
<div class="clr"></div>
</div>

<!--<div class="list_table">
<table class="tbl">
<tr>
<th width="20%">項目</th>
<th width="30%">会員名</th>
<th width="20%">タイプ</th>
<th width="15%"></th>
</tr>
<tr>
<td>2014/10/03 10:03</td>
<td>会員名</td>
<td>エネルギー収支計算</td>
<td><a href="member_edit02.html">詳細表示</a></td>
</tr>
</table>
</div>-->

<div class="list_table">
<table class="tbl">
<tr>
<th width="10%">項目</th>
<td>○○○○○○</td>
<td>○○○○○○</td>
</tr>
<tr>
<th width="10%">項目</th>
<td>○○○○○○</td>
<td>○○○○○○ %</td>
</tr>
<tr>
<th width="10%">項目</th>
<td>○○○○○○</td>
<td>○○○○○○ ℃</td>
</tr>
<tr>
<th width="10%">項目</th>
<td>○○○○○○</td>
<td>○○○○○○ %</td>
</tr>
<tr>
<th width="10%">項目</th>
<td>○○○○○○</td>
<td>○○○○○○ %</td>
</tr>
<tr>
<th width="10%">項目</th>
<td>○○○○○○</td>
<td>○○○○○○</td>
</tr>
<tr>
<th width="10%">項目</th>
<td>○○○○○○</td>
<td>○○○○○○</td>
</tr>
<tr>
<th width="10%">項目</th>
<td>○○○○○○</td>
<td>○○○○○○</td>
</tr>
</table>
</div>

<div class="clr"></div>



<div id="pagetop"><a href="#">▲ページトップへ</a></div>
<div class="clr"></div>
</div>
</div>

<div class="clr"></div>