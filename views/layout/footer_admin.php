
<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2015</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->



<script src="<?=SERVER_NAME?>//template/js/jquery.js"></script>
<script src="<?=SERVER_NAME?>//template/js/bootstrap.min.js"></script>
<script src="<?=SERVER_NAME?>//template/js/jquery.scrollUp.min.js"></script>
<script src="<?=SERVER_NAME?>//template/js/price-range.js"></script>
<script src="<?=SERVER_NAME?>//template/js/jquery.prettyPhoto.js"></script>
<script src="<?=SERVER_NAME?>//template/js/main.js"></script>
<script>
    $(document).ready(function(){
        $(".add").click(function() {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/" + id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>
</body>
</html>