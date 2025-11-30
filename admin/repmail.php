<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/customer.php');
    include_once ($filepath.'/../helpers/format.php');
 ?>

<?php
    $cs = new customer(); 
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }
    
    
    
  ?>

<?php include 'inc/header.php';?>


<div class="grid_7" style="display: block;
    margin-left: 20%; 
  ">
    <div class="box round first grid">
        <h2>Trả lời tin nhắn</h2>
        <div class="block">
            <form id="myForm">
                <table class="form">
                    <?php 
                     $get_customer = $cs-> show_mail($id);
                     if($get_customer){
                        $i = 0;
                        while ($result = $get_customer->fetch_assoc()) {
                            $i++; 
                        
                  ?>
                    <tr>
                        <td>
                            <label>Tên</label>
                        </td>
                        <td>
                            <input id="name" type="text" value="Siz Sneaker" placeholder="Enter Name"
                                style="width: 70%; ">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input id="email" type="text" value="<?php echo $result['email']; ?>"
                                placeholder="Enter Email" style="width: 70%; ">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Tiêu Đề</label>
                        </td>
                        <td>
                            <input id="subject" type="text" value="Cảm ơn bạn đã phản hổi với chúng tôi"
                                placeholder=" Enter Subject" style="width: 70%; ">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Nội dung</label>
                        </td>
                        <td>
                            <textarea id="body" rows="5" placeholder="Vui lòng nhập nội dung"
                                style="width: 90%; height:200px;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="button" onclick="sendEmail()" value="Send An Email">
                                <a href="inbox.php">Gửi</a></button>
                        </td>
                    </tr>
                    <?php 
							}
						}
						 ?>
                </table>
            </form>
        </div>
    </div>
</div>


<script src=" js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
function sendEmail() {
    var name = $("#name");
    var email = $("#email");
    var subject = $("#subject");
    var body = $("#body");

    if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(
            body)) {
        $.ajax({
            url: 'sendEmail.php',
            method: 'POST',
            dataType: 'json',
            data: {
                name: name.val(),
                email: email.val(),
                subject: subject.val(),
                body: body.val()
            },
            success: function(response) {
                $('#myForm')[0].reset();
                $('.sent-notification').text("Message Sent Successfully.");

            }
        });
    }
    alert("Mail của bạn đang được gửi đi!!");
}

function isNotEmpty(caller) {
    if (caller.val() == "") {
        caller.css('border', '1px solid red');
        return false;
    } else
        caller.css('border', '');

    return true;
}
</script>

<?php include 'inc/footer.php';?>