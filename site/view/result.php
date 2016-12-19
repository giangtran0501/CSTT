<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Apple Tree Book</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/vendor/paginationjs/dist/pagination.css">

    <!-- Custom Fonts -->

</head>
<body>
<div id="header">
    <div class="section">
        <a href="index.php"><img src="public/img/logo.jpg" alt="Image"></a>
        <ul>
            <li>
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
    <div id="subscribenow">
        <a href="index.php">Gợi ý sách</a>
    </div>
    <span></span>
</div>
<div id="body">

    <div class="title_page" style="margin-left: 45%">
        Kết quả gợi ý 
    </div>
    <div class="modal">
        <?php if(count($listBooks) == 0) {?>
            <h2 style="margin-bottom: 150px; margin-left: 30%;">Không tìm thấy sách phù hợp</h2>
        <?php }else {?>
            <div id="book">
            <?php foreach($listBooks as $book) {?>
            <?php } ?>
            </div>
            <div id="pagination-container" style="text-align: center"></div>
        <?php } ?>
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
                    <a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus">Google&#43;</a>
                    <a href="http://www.freewebsitetemplates.com/misc/contact" target="_blank" class="mail">Mail</a>
                    <a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" class="facebook">Facebook</a>
                    <a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter">Twitter</a>
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
<script type="text/javascript" src="public/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="public/vendor/paginationjs/dist/pagination.js"></script>
<script type="text/javascript">
    var book = <?php echo json_encode($listBooks) ?>;
    $('#pagination-container').pagination({
        dataSource: book,
        pageSize: 3,
        callback: function(data, pagination){
            var html = listBook(data);
            $('#book').html(html);
        }
    });
    function listBook(data){
        var html = '';
        $.each(data, function(index, item){
            var url_img = "public/img/book/" + item.img +".png";
            html += "<div class = 'row'>"
                        +"<div class = 'left' style = 'width: 30%;'>"
                            +"<div class = 'picture_book'>"
                                +"<img src='" + url_img +"'>" 
                            +"</div>"
                        +"</div>"
                        +"<div class ='content' style='width: 70%;'>"
                            +"<div class='title'>" + item.title + "</div>"
                            +"<h3><span class='info'>Nhà xuất bản: </span>" + item.publisher + "</h3>"
                            +"<h3><span class='info'>Thể loại: </span>" + item.type + "</h3>"
                            +"<h3><span class='info'>Giá sách: </span>" + item.price + " VNĐ</h3>"
                            +"<h3><span class='info'>Giới thiệu: </span>" + item.intro + "</h3>"
                        +"</div>"
                    +"</div>";
        });
        return html;
    }
</script>
</body>
</html>
