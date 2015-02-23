<div id="exitBtn"><a href="index" onclick="return confirm('ログアウトしてよろしいですか？')">ログアウト</a></div>
</div>
<div class="clr"></div>


<div class="content_box">
<div class="left_menu">
<ul>
<li><a href="member">管理者一覧</a></li>
<li><a href="list">会員一覧</a></li>
<li><a href="result">結果一覧</a></li>
<li class="active"><a href="result_pdf">結果PDF出力</a></li>
</ul>
</div>

<div class="right_contents">
<!--<ul class="bread">
	<li>結果一覧</li>
</ul>-->

<h2>結果一覧</h2> 



<div class="list_table">
<table class="tbl">
<tr>
<th width="20%">入力日</th>
<th width="30%">会員名</th>
<th width="20%">タイプ</th>
<th width="15%"></th>
</tr>
<tr>
<td>2014/10/03 10:03</td>
<td>会員名</td>
<td>エネルギー収支計算</td>
<td><p class="detail"><a href="member_edit02.html">詳細表示</a></p></td>
</tr>
<tr>
<td>2014/10/03 18:03</td>
<td>会員名会員名会員名○○○○○○</td>
<td>省エネ対策</td>
<td><p class="detail"><a href="member_edit02.html">詳細表示</a></p></td>
</tr>
<tr>
<td>2014/10/05 10:03</td>
<td>会員名</td>
<td>エネルギー収支計算</td>
<td><p class="detail"><a href="member_edit02.html">詳細表示</a></p></td>
</tr>
</table>
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

<div id="pagetop"><a href="#">▲ページトップへ</a></div>
<div class="clr"></div>
</div></div>


<div class="clr"></div>