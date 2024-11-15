<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>登录</title>
</head>
<body>
<div class="container">
    <h2>登录</h2>
    <form method="POST">
        <label for="password">管理密码:</label><br><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="hidden" name="login" value="1">
        <input type="submit" value="登录">
    </form>
    <div class="button-container">
        <button type="button" onclick="showChangePasswordForm()">更改密码</button>
    </div>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <?php echo $passwordChangedMessage; ?>
    <?php echo $passwordChangeErrorMessage; ?>
</div>

<!-- 底部显示 -->
<div class="footer">
    <a href="https://github.com/taksssss/EPG-Server" style="color: #888; text-decoration: none;">
        https://github.com/taksssss/EPG-Server
    </a>
</div>

<!-- 修改密码模态框 -->
<div id="changePasswordModal" class="modal">
    <div class="passwd-modal-content">
        <span class="close-password">&times;</span>
        <h2>更改登录密码</h2>
        <form method="POST">
            <div class="form-group">
                <label for="old_password">原密码</label>
                <input type="password" id="old_password" name="old_password">
            </div>
            <div class="form-group">
                <label for="new_password">新密码</label>
                <input type="password" id="new_password" name="new_password">
            </div>
            <input type="hidden" name="change_password" value="1">
            <input type="submit" value="更改密码">
        </form>
    </div>
</div>
<script>
    function showChangePasswordForm() {
        var changePasswordModal = document.getElementById("changePasswordModal");
        var changePasswordSpan = document.getElementsByClassName("close-password")[0];

        changePasswordModal.style.display = "block";

        changePasswordSpan.onclick = function() {
            changePasswordModal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == changePasswordModal) {
                changePasswordModal.style.display = "none";
            }
        }
    }
    
    // css 缓存处理
    var currentDate = new Date().toISOString().split('T')[0];
    document.head.appendChild(Object.assign(document.createElement('link'), {rel: 'stylesheet', href: 'assets/css/login.css?date=' + currentDate}));
</script>
</body>
</html>