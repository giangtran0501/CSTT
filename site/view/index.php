<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Apple Tree Book</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
<!-- 	<link rel="stylesheet" type="text/css" href="public/vendor/bootstrap/css/bootstrap.min.css"> -->
</head>
<body>
	<div id="header">
		<div class="section">
			<a href="index.php"><img src="public/img/logo.jpg" alt="Image Logo"></a>
			<ul>
				<li class="current">
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="?c=info&a=about">About</a>
				</li>
				<li>
					<a href="?c=manage&a=login">Specialist</a>
				</li>
			</ul>
		</div>
		<div id="figure">
			<div>
				<div>
					<span><a href="index.php">Gợi ý sách</a></span>
				
				</div>
			</div>
		</div>
		<span></span>
	</div>
	<div id="body">
		<div>
			<div>
				<div>
					<div id="content">
						<h2>Welcome</h2>
						<div>
							<p>
								Apple tree book là một trang web gợi ý tìm sách cho bé, phụ huynh đang băn khoăn không biết chọn sách như thế nào? Liệu có phù hợp với con mình không? Hãy tham gia<a href="">" Gợi ý sách"</a> của chúng tôi.
							</p>
							<h3> Những bổ ích từ việc đọc sách cho bé</h3>
							<p>
								<h4>1.Đọc sách giúp bé tăng tình yêu với việc học:</h4>
Từ rất nhỏ, đa số các bé đã rất thích nghe đọc sách, do đó việc cho bé quen dần với những câu chuyện trong sách sẽ khiến bé thích thú và xem nó như một người bạn thân thiết. Bé càng lớn, phụ huynh cần đọc nhiều câu chuyện liên quan đến sự học, quá trình học, tấm gương học tập… Điều đó sẽ tạo được cách suy nghĩ, thái độ tích cực cho bé trong việc học, đây không chỉ là cách dạy con ngoan hữu hiệu mà còn giúp bé tích lũy nhiều kiến thức trong cuộc sống.
							</p>
							<p>
								<h4>2.Đọc sách giúp bé tăng cảm xúc:</h4>
Sưu tầm thật nhiều sách về tình cảm gia đình, tình cảm bạn bè, bài học hay để đọc là bạn đang giúp tăng cảm xúc và làm giàu tình cảm cho con. Vì tất cả những cảm xúc như : thích, vui, buồn, ghét, thương, yêu… đều được bé cảm nhận rõ nét qua từng câu chuyện. 
							</p>
							<p>
								<h4>3.Đọc sách giúp tăng trí tụê cho bé:</h4>
Trong một nghiên cứu cho thấy, với trẻ sơ sinh nếu cha mẹ thường xuyên nói chuyện (trung bình từ 2.100 từ/một giờ) thì khi 3 tuổi, bé sẽ có chỉ số IQ cao hơn hơn những đứa trẻ mà cha mẹ chúng không có nhiều điều kiện trò chuyện cùng. Qua đó, ta thấy được việc đọc sách “không phân biệt độ tuổi” có ý nghĩa rất lớn đối với sự phát triển trí tuệ. 
							</p>
							<p>
								<h4>4.Đọc sách giúp bé nâng cao kỹ năng ngôn ngữ:</h4>
Nghe kể chuyện sẽ giúp xây dựng được vốn từ vựng, kích thích trí tưởng tượng và nâng cao khả năng giao tiếp cho bé. Các nghiên cứu chỉ ra rằng, kỹ năng ngôn ngữ và thậm chí là cả trí tuệ, đều có liên quan đến nhiều từ ngữ mà đứa trẻ được nghe mỗi ngày. Vì thế hãy kích thích điều đó bằng việc cho con nghe thật nhiều câu chuyện từ chính bạn.
							</p>
							<p>
								<h4>5.Đọc sách cho bé là cũng chính là cách dạy con ngoan:</h4>
							Khi bạn muốn dạy con điều gì, hãy kể một câu chuyện đầy ý nghĩa, hay đọc một cuốn sách mà bạn tâm đắc; và đừng quan tâm tới việc bé sẽ không hiểu, hay bé còn quá nhỏ để cảm nhận được những điều bạn muốn gửi gắm. </p>
						</div>
					</div>
					<div id="menu_content">
						<span id="message"></span>
						<form name="form_index" action="?c=suggest" method="post">
							<select id="age" name="age" class="soflow">
								<option value="0">Chọn độ tuổi</option>
								<?php foreach($age as $a) {?>
									<option value="<?php echo $a["evencode"] ?>"><?php echo $a["content"]; ?></option>
								<?php } ?>
							</select>
							<br/>
							<select id="sex" name="sex" class="soflow">
								<option value="0">Chọn giới tính</option>
								<?php foreach($sex as $s) {?>
									<option value="<?php echo $s["evencode"] ?>"><?php echo $s["content"]; ?></option>
								<?php } ?>
							</select>
							<br/>
							<select id="characters" name="characters" class="soflow">
								<option value="0">Chọn tính cách</option>
								<?php foreach ($characters as $c) { ?>
									<option value="<?php echo $c["evencode"]; ?>"><?php echo $c["content"]; ?></option>
								<?php } ?>
							</select>
							<br/>
							<select id="desire" name="desire" class="soflow">
								<option value="0">Chọn mong muốn</option>
								<?php foreach($desire as $d) {?>
									<option value="<?php echo $d["evencode"]; ?>"><?php echo $d["content"]; ?></option>
								<?php } ?>
							</select>
							<br/>
							<input type="submit" name="submit" class="submit" id="submit" value="Gợi ý" />
						</form>
					</div>
					<!-- <div id="sidebar">
						<h3>Những lời khuyên khi dạy bé đọc sách</h3>
						<ul>
							<li id="fruitsalad">
								<h2>Khi nào đọc sách cho bé!</h2>
								<p>
									<a href="http://belliblossom.com.vn/blog/khi-nao-nen-doc-sach-cho-be-nghe.html"> Nên bắt đầu đọc sách cho bé nghe từ lúc nào và chọn lọc những gì ...</a>
								</p>
							</li>
							<li id="bakeapples">
								<h2>Lợi ích của việc bố mẹ đọc sách cho bé </h2>
								<p>
									<a href="http://kaviokids.com.vn/vi/loi-ich-cua-viec-bo-me-doc-sach-cho-tre-nho">Có rất nhiều cha mẹ chọn việc đọc sách cho bé trước khi đi ngủ để bé ...</a>
								</p>
							</li>
						</ul>
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
		<div>
			<div>
				<div>
					<ul>
						<li>
							<img src="public/img/biking.png" alt="Image">
							<div>
								
								<p>
									 Để cho con một hòm vàng không bằng dạy cho con một quyển sách hay. (Vi Hiền Truyện)
								</p>
							</div>
						</li>
						<li>
							<img src="public/img/children.png" alt="Image">
							<div>
								
								<p>
									 Nhà bác học Anbert Einstein đã từng có câu nói nổi tiếng: 'Nếu muốn trẻ con thông minh, hãy đọc cho chúng nghe những câu chuyện cổ tích'. 
								</p>
							</div>
						</li>
					</ul>
				</div>
				<div>
					<div class="section">
						<span><img src="public/img/baby.png" alt="Image"></span>
						<h3></h3>
						<p>
							
						</p>
					</div>
					<div class="connect">
						<a href="#" target="_blank" class="googleplus">Google&#43;</a>
						<a href="#" target="_blank" class="mail">Mail</a>
						<a href="#" target="_blank" class="facebook">Facebook</a>
						<a href="#" target="_blank" class="twitter">Twitter</a>
					</div>
				</div>
			</div>
		</div>
		<div>
			<p class="footnote">
				&copy; 2016@BK SOICT
			</p>
		</div>
	</div>

	<script type="text/javascript">
		var submit = document.getElementById("submit");
		submit.onclick = function(){
			var age = document.getElementById("age");
			var agecode = age.options[age.selectedIndex].value;
			var sex = document.getElementById("sex");
			var sexcode = sex.options[sex.selectedIndex].value;
			var characters = document.getElementById("characters");
			var charactercode = characters.options[characters.selectedIndex].value;
			var desire = document.getElementById("desire");
			var desirecode = desire.options[desire.selectedIndex].value;
			if(agecode == 0 && sexcode == 0 && charactercode == 0 && desirecode == 0){
				var span = document.getElementById("message");
				span.innerHTML = "Bạn hãy chọn ít nhất một thông tin!!!";
				return false;
			}
			else{
				return true;
			}
		}
	</script>
</body>
</html>
