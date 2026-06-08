<?php get_header(); ?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>







<style>

input.wpcf7-submit[type="submit"]{
  background: #dd0000;
    height: 80px;
    border-radius: 4px;
    font-size: 23px;
    font-weight: bold;
}
.btn-submit{text-align:center; margin-top:40px;}

.wpcf7 input{
  vertical-align: baseline;
}
.wpcf7 {
  margin-top:30px;
}
.wpcf7 dl {
  width: 100%;
  margin-bottom: 30px;
}
.wpcf7 dt {
  position: relative;
  margin-bottom: 15px;
  vertical-align: middle;
  box-sizing: border-box;
}
.wpcf7 dt .label {
  display: inline-block;
  padding: 1px 4px 2px;
  color: #fff;
  font-size: 12px;
  font-weight: normal;
  margin-right: 10px;
  border-radius: 2px;
}
.wpcf7 dt .hissu {
  background-color: #dd0000;
}
.wpcf7 dt .ninni {
  background-color: #ccc;
}
.wpcf7 dd {
  box-sizing: border-box;
}
.wpcf7 dd p{
  font-size: 14px;
}
.wpcf7 .wpcf7-text {
  width: 100%;
  box-sizing: border-box;
  padding: 10px;
  background-color: #f7f7f7;
  border: 1px solid #f7f7f7;
  transition: 0.3s ease-out;
  font-size:16px;
}
.wpcf7 .wpcf7-text:focus {
  background-color: #fff;
  border: 1px solid #fff;
  border-bottom: 1px solid #dddddd;
}
.wpcf7 .wpcf7-textarea {
  width: 100%;
  box-sizing: border-box;
  padding: 10px;
  background-color: #f7f7f7;
  border: 1px solid #f7f7f7;
  transition: 0.3s ease-out;
  height: 100px;
  font-size:16px;
}
.wpcf7 .wpcf7-textarea:focus {
  background-color: #fff;
  border: 1px solid #fff;
  border-bottom: 1px solid #dddddd;
}
.wpcf7 .wpcf7-submit {
  display: block;
  width: 300px;
  margin: 40px auto;
  background-color: #dd0000;
  border: none;
  text-align: center;
  font-size: 20px;
  color: #fff;
  border-radius: 4px;
  transition: 0.3s ease-out;
}

.wpcf7 .wpcf7-submit:hover {
  cursor: pointer;
  opacity: 0.6;
}

.privacy-box {
  height: 200px;
    overflow: scroll;
    padding: 10px 15px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    font-size: 12px;
  }
  .wpcf7 dt{
    background-color: #FFEBEB;
    padding: 10px;
  }
  .wpcf7 dd label{
    font-size:16px;
  }

@media screen and (min-width: 768px) {
  .wpcf7 dl {
    display: table;
    width: 100%;
    border-top: 1px solid #EFEFEF;
    margin-bottom: 0;
  }
  .wpcf7 dl:last-of-type {
    border-bottom: 1px solid #EFEFEF;
  }
  .wpcf7 dt {
    display: table-cell;
    width: 35%;
    padding: 20px;
		vertical-align: top;
  }
  .wpcf7 dt .label {
    position: absolute;
    right: 20px;
    margin-right: 0;
  }
  .wpcf7 dd {
    display: table-cell;
    width: 65%;
    padding: 10px 20px;
    vertical-align: middle;
  }
  .wpcf7 .wpcf7-text {
    padding: 10px;
  }
  .privacy-box {
    height: 100px;
    overflow: auto;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
  }
  input.wpcf7-submit[type="submit"]{
    width: 400px;
}
}

@media screen and (max-width: 500px){
  .static-catch .section-ja-title{
    margin-top:75px;
    font-size: 23px;
  }
}
.static-catch .section-ja-title{
  margin-bottom: 20px;
}


/* Chrome, Safari */
::-webkit-input-placeholder{color: #a9a9a9;}
 /* Firefox */
::-moz-placeholder{color: #a9a9a9;}
 /* Firefox 18以前 */
:-moz-placeholder{color: #a9a9a9;}
 /* IE */
:-ms-input-placeholder{color: #a9a9a9;}


/* セレクトボックス */
.select_box select {
  font-size:16px;
	width: 100%;
	cursor: pointer;
	text-indent: 0.01px;
	text-overflow: ellipsis;
	border: none;
	outline: none;
	background: transparent;
	background-image: none;
	box-shadow: none;
	-webkit-appearance: none;
	appearance: none;
}
.select_box select::-ms-expand {
    display: none;
}
.select_box select option{
  font-size:16px;
}
.select_box {
	position: relative;
	border: 1px solid #ccc;
	background: #ffffff;
}
.select_box::before {
	position: absolute;
	top: 0.8em;
	right: 0.9em;
	width: 0;
	height: 0;
	padding: 0;
	content: '';
	border-left: 6px solid transparent;
	border-right: 6px solid transparent;
	border-top: 6px solid #666666;
	pointer-events: none;
}
.select_box select {
  padding: 10px 15px;
	color: #666666;
}


/* カレンダー */
#datepicker{
  border:1px solid #ccc;
  margin-bottom:20px;

}




</style>




<script>
jQuery(function($) {
$("#datepicker").datepicker({
minDate: new Date(),
dateFormat: 'yy-mm-dd'
});
});
</script>





    <div id="page-top"></div>

    <div class="section-inner">
      <section class="static-catch">
        <h1 class="section-ja-title ta-c">時計修理予約フォーム</h1>
      </section>  

      <section class="form">
        <?php the_content(); ?>
      </section>

      <?php get_template_part( 'template-parts/common-tab' );?>

    </div>










<?php get_footer(); ?>
